<?php

namespace Modules\Bahan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Bahan\Models\Bahan;
use Modules\Master\Models\Satuan;
use Modules\Master\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Pembelian\Models\RiwayatPembelian;

class BahanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/bahan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Bahan Produk';
    $data = Bahan::where('jumlah_bahan', '>', 0)->latest()->get();

    return view(
      'bahan::bahan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/bahan');

    $data_satuan = Satuan::latest()->get();
    $data_supplier = Supplier::latest()->get();

    $title = "Tambah Bahan Produk";
    return view(
      'bahan::bahan/form',
      [
        'title' => $title,
        'data_satuan' => $data_satuan,
        'data_supplier' => $data_supplier,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/bahan');
    $title = "Update Bahan Produk";
    $data = Bahan::findOrFail($id);
    $data_satuan = Satuan::latest()->get();
    $data_supplier = Supplier::latest()->get();

    return view(
      'bahan::bahan/form',
      [
        'title' => $title,
        'data' => $data,
        'data_satuan' => $data_satuan,
        'data_supplier' => $data_supplier,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    $request->validate([
      'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = Bahan::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update bahan: ' . $data['nama_bahan'] . ' ');

      // CEK dan UPDATE/CREATE DATA RIWAYAT
      $data_riwayat = [
        'nama_pembelian' => $request->nama_bahan,
        'harga_satuan' => $request->harga_bahan,
        'qty' => $request->jumlah_bahan,
        'total_harga_beli' => $request->total_harga_beli,
        'assetIdprodukIdbahanId' => $request->id,
        'updated_by' => Auth::user()->username,
      ];
      $riwayat = RiwayatPembelian::where('assetIdprodukIdbahanId', $request->id)->first();
      if ($riwayat) {
        $riwayat->update($data_riwayat);
      } else {
        $data_riwayat['created_by'] = Auth::user()->username;
        RiwayatPembelian::create($data_riwayat);
      }

    } else {
      $data['created_by'] = Auth::user()->username;
      $newPembelian = Bahan::create($data);
      Fungsi::logActivity('create bahan: ' . $data['nama_bahan'] . ' ');

      // INSERT RIWAYAT
      $data_riwayat = [
        'nama_pembelian' => $request->nama_bahan,
        'harga_satuan' => $request->harga_bahan,
        'qty' => $request->jumlah_bahan,
        'total_harga_beli' => $request->total_harga_bahan,
        'assetIdprodukIdbahanId' => $newPembelian->id,
        'created_by' => Auth::user()->username,
      ];
      RiwayatPembelian::create($data_riwayat);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('bahan.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/bahan');

    $data = Bahan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('bahan.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('bahan.index');
  }
}
