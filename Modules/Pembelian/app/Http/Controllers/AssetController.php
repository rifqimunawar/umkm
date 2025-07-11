<?php

namespace Modules\Pembelian\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Satuan;
use Modules\Master\Models\Supplier;
use Modules\Pembelian\Models\Asset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Pembelian\Models\RiwayatPembelian;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pembelian/asset');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Asset';
    $data = Asset::latest()->get();

    return view(
      'pembelian::asset_pembelian/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/pembelian/asset');

    $data_supplier = Supplier::latest()->get();
    $data_satuan = Satuan::latest()->get();

    $title = "Tambah Asset";
    return view(
      'pembelian::asset_pembelian/form',
      [
        'title' => $title,
        'data_supplier' => $data_supplier,
        'data_satuan' => $data_satuan,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/pembelian/asset');
    $title = "Update Pembelian Asset";
    $data = Asset::findOrFail($id);

    $data_supplier = Supplier::latest()->get();
    $data_satuan = Satuan::latest()->get();

    return view(
      'pembelian::asset_pembelian/form',
      [
        'title' => $title,
        'data' => $data,
        'data_supplier' => $data_supplier,
        'data_satuan' => $data_satuan,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      // UPDATE DATA ASSET
      $dataUpdate = Asset::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpdate->update($data);
      Fungsi::logActivity('update pembelian asset: ' . $data['nama_asset']);

      // CEK dan UPDATE/CREATE DATA RIWAYAT
      $data_riwayat = [
        'nama_pembelian' => $request->nama_asset,
        'harga_satuan' => $request->harga_beli_satuan,
        'qty' => $request->qty,
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
      // CREATE DATA BARU
      $data['created_by'] = Auth::user()->username;
      $newPembelian = Asset::create($data);
      Fungsi::logActivity('create pembelian asset: ' . $data['nama_asset']);

      // INSERT RIWAYAT
      $data_riwayat = [
        'nama_pembelian' => $request->nama_asset,
        'harga_satuan' => $request->harga_beli_satuan,
        'qty' => $request->qty,
        'total_harga_beli' => $request->total_harga_beli,
        'assetIdprodukIdbahanId' => $newPembelian->id,
        'created_by' => Auth::user()->username,
      ];
      RiwayatPembelian::create($data_riwayat);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('pembelian_asset.index');
  }

  public function destroy($id)
  {
    Fungsi::hakAkses('/pembelian/asset');

    $data = Asset::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('pembelian_asset.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('pembelian_asset.index');
  }
}
