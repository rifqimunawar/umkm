<?php

namespace Modules\Pembelian\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Bahan\Models\Bahan;
use Modules\Master\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Modules\Pembelian\Models\Asset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Penjualan\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Pembelian\Models\ReturPembelian;

class ReturPembelianController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pembelian/retur');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Retur Pembelian';
    $data = ReturPembelian::latest()->get();

    return view(
      'pembelian::/retur/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function getDataPembelian()
  {
    $data = ReturPembelian::dataPembelian();
    return response()->json($data);
  }

  public function create($id_barang)
  {
    $data = ReturPembelian::getDataPembelianById($id_barang);
    $data_satuan = Satuan::find($data->satuan_id);
    // return response()->json($data);
    // dd($data_satuan);
    $title = "Tambah Retur Pembelian";
    return view(
      'pembelian::retur/form',
      [
        'title' => $title,
        'data' => $data,
        'data_satuan' => $data_satuan,
      ]
    );
  }

  public function edit($id)
  {
    Fungsi::hakAkses('/pembelian/retur');
    $title = "Update Pembelian Asset";
    $data = ReturPembelian::findOrFail($id);

    $data_satuan = Satuan::find($data->satuan_id);

    return view(
      'pembelian::retur/form',
      [
        'title' => $title,
        'data' => $data,
        'data_satuan' => $data_satuan,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    // return $data;
    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = ReturPembelian::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update retur pembelian: ' . $data['nama_barang'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      ReturPembelian::create($data);
      Fungsi::logActivity('create retur pembelian: ' . $data['nama_barang'] . ' ');
    }


    $qty_retur = (int) $request->qty_retur;
    if ($request->sumber == 1) {
      $returData = Bahan::findOrFail($request->id_barang);
      $returData->jumlah_bahan -= $qty_retur;
      $returData->updated_by = Auth::user()->username;
      $returData->updated_at = Carbon::now();
      $returData->save();
    } elseif ($request->sumber == 2) {
      $returData = Asset::findOrFail($request->id_barang);
      $returData->qty -= $qty_retur;
      $returData->updated_by = Auth::user()->username;
      $returData->updated_at = Carbon::now();
      $returData->save();
    } elseif ($request->sumber == 3) {
      $returData = Produk::findOrFail($request->id_barang);
      $returData->jumlah_bahan -= $qty_retur;
      $returData->jumlah_produk -= $qty_retur;
      $returData->updated_by = Auth::user()->username;
      $returData->updated_at = Carbon::now();
      $returData->save();
    }



    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('pembelian_retur.index');
  }

}
