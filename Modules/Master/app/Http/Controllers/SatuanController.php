<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Satuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SatuanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/satuan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Satuan';
    $data = Satuan::latest()->get();

    return view(
      'master::satuan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/satuan');

    $title = "Tambah Satuan";
    return view(
      'master::satuan/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/satuan');
    $title = "Update Satuan";
    $data = Satuan::findOrFail($id);

    return view(
      'master::satuan/form',
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
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = Satuan::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update satuan: ' . $data['nama_satuan'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Satuan::create($data);
      Fungsi::logActivity('create satuan: ' . $data['nama_satuan'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('master_satuan.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/satuan');

    $data = Satuan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('master_satuan.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('master_satuan.index');
  }
}
