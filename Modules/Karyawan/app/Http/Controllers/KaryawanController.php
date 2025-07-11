<?php

namespace Modules\Karyawan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Jabatan\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Karyawan\Models\Karyawan;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/karyawan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Karyawan';
    $data = Karyawan::latest()->get();

    return view(
      'karyawan::karyawan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/karyawan');

    $title = "Tambah Karyawan";
    $data_jabatan = Jabatan::latest()->get();
    return view(
      'karyawan::karyawan/form',
      [
        'title' => $title,
        'data_jabatan' => $data_jabatan,
      ]
    );
  }
  public function edit($id)
  {
    $title = "Update Data Karyawan";
    Fungsi::hakAkses('/karyawan');
    $data = Karyawan::findOrFail($id);
    $data_jabatan = Jabatan::latest()->get();

    return view(
      'karyawan::karyawan/form',
      [
        'title' => $title,
        'data' => $data,
        'data_jabatan' => $data_jabatan,
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
      $dataUpate = Karyawan::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update karywan: ' . $data['nama'] . ' ' . $data['jabatan_id']);
    } else {
      $data['created_by'] = Auth::user()->username;
      Karyawan::create($data);
      Fungsi::logActivity('create karyawan: ' . $data['nama'] . ' ' . $data['jabatan_id']);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('karyawan.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/karyawan');

    $data = Karyawan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->jabatan()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki relasi');
    //   return redirect()->route('karyawan.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('karyawan.index');
  }
}
