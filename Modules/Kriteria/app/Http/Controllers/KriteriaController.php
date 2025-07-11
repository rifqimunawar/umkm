<?php

namespace Modules\Kriteria\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Jabatan\Models\Jabatan;
use Modules\Kriteria\Models\Kriteria;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/kriteria');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Kriteria';
    $data = Kriteria::latest()->get();

    return view(
      'kriteria::/kriteria/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/kriteria');

    $title = "Tambah Kriteria";
    $data_jabatan = Jabatan::latest()->get();
    return view(
      'kriteria::kriteria/form',
      [
        'title' => $title,
        'data_jabatan' => $data_jabatan,
      ]
    );
  }
  public function edit($id)
  {
    $title = "Update Data Kriteria";
    Fungsi::hakAkses('/kriteria');
    $data = Kriteria::findOrFail($id);
    $data_jabatan = Jabatan::latest()->get();

    return view(
      'kriteria::kriteria/form',
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
      $dataUpate = Kriteria::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update kriteria: ' . $data['kriteria'] . ' ' . $data['jabatan_id']);
    } else {
      $data['created_by'] = Auth::user()->username;
      Kriteria::create($data);
      Fungsi::logActivity('create kriteria: ' . $data['kriteria'] . ' ' . $data['jabatan_id']);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('kriteria.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/kriteria');

    $data = Kriteria::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->jabatan()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki relasi');
    //   return redirect()->route('kriteria.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('kriteria.index');
  }
}
