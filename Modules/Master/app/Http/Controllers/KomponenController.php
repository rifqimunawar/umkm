<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KomponenController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/komponen');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Komponen Produksi';
    $data = Komponen::latest()->get();

    return view(
      'master::komponen/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/komponen');

    $title = "Tambah Komponen Produksi";
    return view(
      'master::komponen/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/komponen');
    $title = "Update Komponen Produksi";
    $data = Komponen::findOrFail($id);

    return view(
      'master::komponen/form',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'komponen_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = Komponen::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update kompoen produksi: ' . $data['nama_komponen'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Komponen::create($data);
      Fungsi::logActivity('create kompoenn porduksi: ' . $data['nama_komponen'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('master_komponen.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/jenis_pembayaran');

    $data = Komponen::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('master_komponen.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('master_komponen.index');
  }
}
