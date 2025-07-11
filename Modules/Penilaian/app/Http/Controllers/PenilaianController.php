<?php

namespace Modules\Penilaian\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Periode\Models\Periode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Karyawan\Models\Karyawan;
use Modules\Kriteria\Models\Kriteria;
use Modules\Penilaian\Models\Penilaian;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Penilaian\Models\PenilaianDetail;

class PenilaianController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/penilaian');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Penilaian';
    $data = Penilaian::getDataPenilaian();
    $data_karyawan = Karyawan::latest()->get();
    $data_periode = Periode::latest()->get();

    return view(
      'penilaian::/penilaian/index',
      [
        'title' => $title,
        'data' => $data,
        'data_karyawan' => $data_karyawan,
        'data_periode' => $data_periode,
      ]
    );
  }
  public function create($id, $periode_id)
  {
    Fungsi::hakAkses('/penilaian');

    $title = "Tambah Penilaian";
    $data_karyawan = Karyawan::findOrfail($id);
    $data_periode = Periode::latest()->get();
    $data_kriteria = Kriteria::byKaryawanId($id);

    // dd($data_kriteria);
    return view(
      'penilaian::penilaian/form',
      [
        'title' => $title,
        'data_karyawan' => $data_karyawan,
        'data_periode' => $data_periode,
        'data_kriteria' => $data_kriteria,
        'periode_id' => $periode_id,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/penilaian');

    $title = "Update Data Penilaian";

    $data = Penilaian::findOrFail($id);
    $data_karyawan = Karyawan::findOrFail($data->karyawan_id);
    $data_periode = Periode::latest()->get();
    $data_kriteria = Kriteria::byKaryawanId($data->karyawan_id);
    $periode_id = $data->periode_id;

    // Ambil nilai sebelumnya untuk setiap kriteria
    $nilai_lama = PenilaianDetail::where('penilaian_id', $data->id)
      ->pluck('nilai', 'kriteria_id')
      ->toArray();

    return view('penilaian::penilaian/form', [
      'title' => $title,
      'data' => $data,
      'data_karyawan' => $data_karyawan,
      'data_periode' => $data_periode,
      'data_kriteria' => $data_kriteria,
      'periode_id' => $periode_id,
      'nilai_lama' => $nilai_lama,
    ]);
  }

  public function store(Request $request)
  {
    if (!empty($request->id)) {
      $dataUpdate = Penilaian::findOrFail($request->id);
      $data = [
        'karyawan_id' => $request->karyawan_id,
        'periode_id' => $request->periode_id,
        'updated_by' => Auth::user()->username,
      ];
      $dataUpdate->update($data);

      PenilaianDetail::where('penilaian_id', $dataUpdate->id)->delete();
      foreach ($request->nilai as $kriteria_id => $nilai) {
        PenilaianDetail::create([
          'penilaian_id' => $dataUpdate->id,
          'kriteria_id' => $kriteria_id,
          'nilai' => $nilai,
        ]);
      }

      Fungsi::logActivity('update penilaian karyawan: ' . $data['karyawan_id']);
    } else {
      $data = [
        'karyawan_id' => $request->karyawan_id,
        'periode_id' => $request->periode_id,
        'created_by' => Auth::user()->username,
        'updated_by' => Auth::user()->username,
      ];
      $penilaian = Penilaian::create($data);

      foreach ($request->nilai as $kriteria_id => $nilai) {
        PenilaianDetail::create([
          'penilaian_id' => $penilaian->id,
          'kriteria_id' => $kriteria_id,
          'nilai' => $nilai,
        ]);
      }

      Fungsi::logActivity('create penilaian karyawan: ' . $data['karyawan_id']);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('penilaian.index');
  }



  public function destroy($id)
  {
    Fungsi::hakAkses('/penilaian');

    $data = Penilaian::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->jabatan()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki relasi');
    //   return redirect()->route('penilaian.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('penilaian.index');
  }
}
