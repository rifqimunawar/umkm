<?php

namespace Modules\Periode\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Periode\Models\Periode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodeController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/periode');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Periode';
    $data = Periode::latest()->get();

    return view(
      'periode::/periode/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/periode');

    $title = "Tambah periode";
    return view(
      'periode::periode/create',
      [
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
      $dataUpate = Periode::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update periode: ' . $data['bulan'] . ' ' . $data['tahun']);
    } else {
      $data['created_by'] = Auth::user()->username;
      Periode::create($data);
      Fungsi::logActivity('create periode: ' . $data['bulan'] . ' ' . $data['tahun']);
    }
    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('periode.index');
  }

  public function edit($id)
  {
    $title = "Update Data Periode";
    Fungsi::hakAkses('/periode');
    $data = Periode::findOrFail($id);

    return view(
      'periode::periode.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/periode');

    $data = Periode::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->karyawan()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki relasi');
    //   return redirect()->route('umum.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('periode.index');
  }

}
