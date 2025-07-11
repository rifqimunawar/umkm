<?php

namespace Modules\Pengeluaran\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\JenisPembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Pengeluaran\Models\Operasional;

class OperasionalController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pengeluaran/operasional');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Pengeluaran Operasional';
    $data = Operasional::with('jenisPembayaran')->latest()->get();

    return view(
      'pengeluaran::operasional/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/pengeluaran/operasional');

    $data_jenis = JenisPembayaran::latest()->get();
    $title = "Tambah Pengeluaran Operasional";
    return view(
      'pengeluaran::operasional/form',
      [
        'title' => $title,
        'data_jenis' => $data_jenis,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/pengeluaran/operasional');
    $title = "Update Pengeluaran Operasional";
    $data = Operasional::findOrFail($id);
    $data_jenis = JenisPembayaran::latest()->get();

    return view(
      'pengeluaran::operasional/form',
      [
        'title' => $title,
        'data' => $data,
        'data_jenis' => $data_jenis,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'jenis_pembayran_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = Operasional::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update operasional: ' . $data['nama_operasional'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Operasional::create($data);
      Fungsi::logActivity('create operasional: ' . $data['nama_operasional'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('operasional.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/pengeluaran/operasional');

    $data = Operasional::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('operasional.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('operasional.index');
  }
}
