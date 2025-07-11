<?php

namespace Modules\Kasir\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Kasir\Models\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Penjualan\Models\Produk;
use Modules\Konsumen\Models\Konsumen;
use Modules\Kasir\Models\DetailTransaksi;
use Modules\ManagementStok\Models\Kategori;

class KasirController extends Controller
{
  public function index()
  {
    $startOfDay = Carbon::today();
    $endOfDay = Carbon::today()->endOfDay();

    $data_order_hari_ini = Transaksi::with('konsumen')->whereBetween('created_at', [$startOfDay, $endOfDay])->latest()->get();

    return view('kasir::index', [
      'data_order_hari_ini' => $data_order_hari_ini
    ]);
  }

  public function get_ajx_kategori()
  {
    $data = Kategori::latest()->get();
    return response()->json($data);
  }
  public function get_ajx_produk()
  {
    $data = Produk::where('jumlah_produk', '>', 0)
      ->with('kategori')
      ->latest()
      ->get();

    $data->transform(function ($item) {
      if ($item->img) {
        $item->img = '/img/' . $item->img;
      }
      return $item;
    });

    return response()->json($data);
  }

  public function getProdukByKategori($id)
  {
    $produk = Produk::where('jumlah_produk', '>', 0)->with('kategori')->where('kategori_id', $id)->latest()->get();
    $produk->transform(function ($item) {
      if ($item->img) {
        $item->img = '/img/' . $item->img;
      }
      return $item;
    });
    return response()->json($produk);
  }

  public function searchProduk(Request $request)
  {
    $keyword = $request->query('q');

    $produk = Produk::search($keyword)->get()->filter(function ($item) {
      return $item->jumlah_produk > 0;
    });

    $produk->transform(function ($item) {
      if ($item->img) {
        $item->img = '/img/' . $item->img;
      }
      return $item;
    });

    return response()->json($produk->values());
  }

  public function konsumenStore(Request $request)
  {
    $data = $request->all();

    if (!empty($request->id)) {
      $dataUpate = Konsumen::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update Konsumen: ' . $data['nama_konsumen'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Konsumen::create($data);
      Fungsi::logActivity('create Konsumen: ' . $data['nama_konsumen'] . ' ');
    }
    return response()->json([
      'success' => true,
      'message' => 'Konsumen berhasil disimpan!',
    ]);
  }

  public function getDataKonsumen()
  {
    $data = Konsumen::latest()->get();
    return response()->json($data);
  }

  public function transaksiStore(Request $request)
  {
    $transaksiId = Str::uuid()->toString();

    $newNo = Transaksi::generateNoTransaksi();

    // Simpan transaksi utama
    $transaksi = Transaksi::create([
      'id' => $transaksiId,
      'no_transaksi' => $newNo,
      'konsumen_id' => $request->id_konsumen,
      'nominal_belanja' => $request->total_belanja,
      'nominal_dibayar' => $request->dibayar,
      'nominal_kembalian' => $request->kembalian,
      'nominal_kasbon' => $request->kasbon,
      'is_kasbon' => $request->is_kasbon,
      'created_by' => Auth::user()->username,
    ]);



    Fungsi::logActivity('Create Transaksi: ID ' . $request->total_belanja);

    // Simpan detail transaksi
    foreach ($request->cart as $item) {
      DetailTransaksi::create([
        'id' => Str::uuid()->toString(),
        'transaksi_id' => $transaksiId,
        'produk_id' => $item['produkId'],
        'nama_produk' => $item['namaProduk'],
        'nama_kategori_produk' => $item['kategoriProduk'] ?? null,
        'harga_satuan_produk' => $item['hargaSatuan'],
        'qty' => $item['qty'],
        'total_harga_produk' => $item['qty'] * $item['hargaSatuan'],
        'created_by' => Auth::user()->username,
      ]);

      Fungsi::logActivity('Create DetailTransaksi: Produk ID ' . $item['namaProduk']);

      // kurangi stok produk
      $produk = Produk::findOrFail($item['produkId']);
      $produk->jumlah_produk = $produk->jumlah_produk - $item['qty'];
      $produk->save();
    }


    return response()->json([
      'success' => true,
      'message' => 'Transaksi berhasil disimpan!',
    ]);
  }


  public function nota($id)
  {

    $title = "Nota Penjualan";
    $titleSm = 'Dicetak: ' . Fungsi::format_tgl_jam_menit(Carbon::now());
    $data = Transaksi::with('detailTransaksi', 'konsumen')->findOrFail($id);
    $tanggal = Fungsi::format_tgl(Carbon::now());
    // dd($data);

    return view('kasir::pdf', [
      'title' => $title,
      'titleSm' => $titleSm,
      'data' => $data,
      'tanggal' => $tanggal
    ]);
  }

}
