<?php

namespace Modules\Jabatan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Jabatan\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/jabatan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Jabatan';
    $data = Jabatan::latest()->get();

    return view(
      'jabatan::/jabatan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/jabatan');

    $title = "Tambah Jabatan";
    return view(
      'jabatan::jabatan/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    $title = "Update Data Jabatan";
    Fungsi::hakAkses('/jabatan');
    $data = Jabatan::findOrFail($id);

    return view(
      'jabatan::jabatan.form',
      [
        'data' => $data,
        'title' => $title,
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
      $dataUpate = Jabatan::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update jabatan: ' . $data['jabatan'] . ' ' . $data['tupoksi']);
    } else {
      $data['created_by'] = Auth::user()->username;
      Jabatan::create($data);
      Fungsi::logActivity('create jabatan: ' . $data['jabatan'] . ' ' . $data['tupoksi']);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('jabatan.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/jabatan');

    $data = Jabatan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    if ($data->karyawan()->count() > 0) {
      Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki relasi');
      return redirect()->route('jabatan.index');
    }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('jabatan.index');
  }
}
