<?php

namespace Modules\Penjualan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Bahan\Models\Bahan;
use Modules\Master\Models\Satuan;
use Modules\Master\Models\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Penjualan\Models\Produk;
use Modules\Bahan\Models\BahanProduk;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\ManagementStok\Models\Kategori;
use Modules\Pembelian\Models\KomponenProduksi;
use Modules\Pembelian\Models\RiwayatPembelian;

class ProdukController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pembelian/produk');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Produk';
    $data = Produk::where('jumlah_produk', '>', 0)->latest()->get();

    return view(
      'pembelian::/produk/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/pembelian/produk');

    $title = "Tambah Produk";
    $data_kategori = Kategori::latest()->get();
    $data_satuan = Satuan::latest()->get();
    $produk_temp_id = Str::uuid()->toString();

    return view(
      'pembelian::produk/form',
      [
        'title' => $title,
        'data_kategori' => $data_kategori,
        'produk_temp_id' => $produk_temp_id,
        'data_satuan' => $data_satuan,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/pembelian/produk');
    $title = "Update Produk";
    $data = Produk::findOrFail($id);
    $data_kategori = Kategori::latest()->get();
    $data_satuan = Satuan::latest()->get();
    $produk_temp_id = $data->id;

    return view(
      'pembelian::produk/form',
      [
        'title' => $title,
        'data' => $data,
        'data_kategori' => $data_kategori,
        'produk_temp_id' => $produk_temp_id,
        'data_satuan' => $data_satuan,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    $request->validate([
      'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $data['margin_nominal'] = $data['harga_jual'] - $data['harga_beli'];

    if ($data['harga_beli'] > 0) {
      $margin = (($data['harga_jual'] - $data['harga_beli']) / $data['harga_beli']) * 100;
      $data['margin_presentase'] = round($margin, 2);
    } else {
      $data['margin_presentase'] = 0;
    }

    // $data['harga_jual_satuan'] = $data['harga_jual'] / $data['jumlah_produk'];
    // $data['harga_beli_satuan'] = $data['harga_beli'] / $data['jumlah_produk'];

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'produk_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }


    if (!empty($request->id)) {
      // UPDATE PRODUK
      $produk = Produk::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $produk->update($data);

      Fungsi::logActivity('update produk: ' . $data['nama_produk'] . ' ' . $data['harga_jual'] . ' ' . $data['harga_beli']);

      // CEK dan UPDATE/CREATE DATA RIWAYAT
      if (empty($produk->is_produksi)) {
        $data_riwayat = [
          'nama_pembelian' => $request->nama_produk,
          'harga_satuan' => $request->harga_beli_satuan,
          'qty' => $request->jumlah_produk,
          'total_harga_beli' => $request->harga_beli,
          'updated_by' => Auth::user()->username,
        ];

        $existing = RiwayatPembelian::where('assetIdprodukIdbahanId', $produk->id)->first();
        if (!$existing) {
          $data_riwayat['created_by'] = Auth::user()->username;
        }

        RiwayatPembelian::updateOrCreate(
          ['assetIdprodukIdbahanId' => $produk->id],
          $data_riwayat
        );
      }

    } else {
      // CREATE PRODUK
      $data['id'] = $data['produk_temp_id'];
      unset($data['produk_temp_id']);
      $data['created_by'] = Auth::user()->username;
      $produk = Produk::create($data);

      Fungsi::logActivity('create produk: ' . $data['nama_produk'] . ' ' . $data['harga_jual'] . ' ' . $data['harga_beli']);

      // CREATE RIWAYAT
      if (empty($produk->is_produksi)) {
        $data_riwayat = [
          'nama_pembelian' => $request->nama_produk,
          'harga_satuan' => $request->harga_beli_satuan,
          'qty' => $request->jumlah_produk,
          'total_harga_beli' => $request->harga_beli,
          'created_by' => Auth::user()->username,
        ];

        RiwayatPembelian::updateOrCreate(
          ['assetIdprodukIdbahanId' => $produk->id],
          $data_riwayat
        );
      }

      // PROSES BAHAN PRODUK
      $bahanProdukList = BahanProduk::where('produk_temp_id', $produk->id)->get();
      foreach ($bahanProdukList as $bahanProduk) {
        $bahanProduk->produk_id = $produk->id;

        if ($request->jumlah_produk > 0) {
          $bahanProduk->jumlah_bahan_digunakan_unk_1_produk = $bahanProduk->jumlah_bahan_digunakan / $request->jumlah_produk;
        } else {
          $bahanProduk->jumlah_bahan_digunakan_unk_1_produk = 0;
        }

        $bahanProduk->save();

        $bahan = Bahan::find($bahanProduk->bahan_id);
        if ($bahan) {
          $bahan->jumlah_bahan -= $bahanProduk->jumlah_bahan_digunakan;
          $bahan->save();
        }
      }

      // PROSES KOMPONEN PRODUK
      $komponenProdukList = KomponenProduksi::where('produk_temp_id', $produk->id)->get();
      foreach ($komponenProdukList as $komponenProduk) {
        $komponenProduk->produk_id = $produk->id;
        $komponenProduk->save();
      }
    }



    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('produk.index');
  }

  public function destroy($id)
  {
    Fungsi::hakAkses('/pembelian/produk');

    $data = Produk::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->jabatan()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki relasi');
    //   return redirect()->route('kategori.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('produk.index');
  }


  public function get_produk_by_kode($kode)
  {
    $data = Produk::withTrashed()
      ->where('kode', $kode)
      ->latest()
      ->first();
    return response()->json($data);
  }
  public function get_ajx_bahan()
  {
    $data = Bahan::where('jumlah_bahan', '>', 0)->latest()->get();
    return response()->json($data);
  }
  public function post_ajx_bahan_produk(Request $request)
  {
    $data = $request->all();

    // Validasi input
    $request->validate([
      'bahan_id' => 'required|exists:bahans,id',
      'jumlah_bahan_digunakan' => 'required|numeric|min:1',
      'produk_temp_id' => 'required|string',
    ]);

    $bahan = Bahan::findOrFail($data['bahan_id']);

    // Validasi ketersediaan bahan
    if ($data['jumlah_bahan_digunakan'] > $bahan->jumlah_bahan) {
      return response()->json([
        'success' => false,
        'message' => 'Jumlah bahan melebihi stok tersedia: ' . $bahan->jumlah_bahan,
      ], 422);
    }

    if (!empty($request->id)) {
      $dataUpdate = BahanProduk::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpdate->update($data);

      Fungsi::logActivity(
        'Update bahan produk: Bahan ID ' . $data['bahan_id'] . ', Jumlah: ' . $data['jumlah_bahan_digunakan']
      );
    } else {
      $data['created_by'] = Auth::user()->username;
      BahanProduk::create($data);

      Fungsi::logActivity(
        'Create bahan produk: Bahan ID ' . $data['bahan_id'] . ', Jumlah: ' . $data['jumlah_bahan_digunakan']
      );
    }

    return response()->json([
      'success' => true,
      'message' => 'Data bahan produk berhasil disimpan.',
    ]);
  }
  public function get_ajx_bahan_produk($produk_temp_id)
  {
    $data = BahanProduk::where('produk_temp_id', $produk_temp_id)
      ->with('bahan') // jika relasi ke tabel bahan
      ->get()
      ->map(function ($item) {
        return [
          'id' => $item->id,
          'jumlah_bahan_digunakan' => $item->jumlah_bahan_digunakan,
          'bahan_nama' => $item->bahan->nama_bahan ?? '-', // relasi bahan
          'harga_bahan' => $item->bahan->harga_bahan ?? '0', // relasi bahan
        ];
      });

    return response()->json($data);
  }
  public function del_ajx_bahan_produk($id)
  {
    Fungsi::hakAkses('/pembelian/produk');

    $data = BahanProduk::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    $data->delete();

    return response()->json([
      'success' => true,
      'message' => 'Data berhasil dihapus',
      'data' => $data,
    ]);
  }

  public function get_ajx_komponen()
  {
    $data = Komponen::latest()->get();
    return response()->json($data);
  }

  public function get_ajx_komponen_produk($produk_temp_id)
  {
    $data = KomponenProduksi::where('produk_temp_id', $produk_temp_id)
      ->with('komponen')
      ->get()
      ->map(function ($item) {
        return [
          'id' => $item->id,
          'nominal_komponen' => $item->nominal_komponen,
          'nama_komponen' => $item->komponen->nama_komponen ?? '-',
        ];
      });

    return response()->json($data);
  }

  public function post_ajx_komponen_produk(Request $request)
  {
    $data = $request->all();

    // Validasi input
    $request->validate([
      'komponen_id' => 'required|exists:komponens,id',
      'nominal_komponen' => 'required',
      'produk_temp_id' => 'required|string',
    ]);
    $nominal = $data['nominal_komponen'];
    $nominal = str_replace(['Rp', '.', ' '], '', $nominal);
    $data['nominal_komponen'] = $nominal;

    if (!empty($request->id)) {
      $dataUpdate = KomponenProduksi::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpdate->update($data);

      Fungsi::logActivity(
        'Update komponen produksi: Bahan ID ' . $data['nominal_komponen'] . ' '
      );
    } else {
      $data['created_by'] = Auth::user()->username;
      KomponenProduksi::create($data);

      Fungsi::logActivity(
        'Create komponen produksi: Bahan ID ' . $data['nominal_komponen'] . ' '
      );
    }

    return response()->json([
      'success' => true,
      'message' => 'Data komponen produksi berhasil disimpan.',
    ]);
  }
  public function del_ajx_komponen_produk($id)
  {
    Fungsi::hakAkses('/pembelian/produk');

    $data = KomponenProduksi::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    $data->delete();

    return response()->json([
      'success' => true,
      'message' => 'Data berhasil dihapus',
      'data' => $data,
    ]);
  }
}
