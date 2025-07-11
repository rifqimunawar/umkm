<?php

namespace Modules\Pengeluaran\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Master\Models\JenisPembayaran;
use Modules\Pengeluaran\Models\PengeluaranLain;

class PengeluaranLainController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pengeluaran/lain');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Pengeluaran Lain';
    $data = PengeluaranLain::with('jenisPembayaran')->latest()->get();

    return view(
      'pengeluaran::lain/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/pengeluaran/lain');

    $data_jenis = JenisPembayaran::latest()->get();
    $title = "Tambah Pengeluaran Lain";
    return view(
      'pengeluaran::lain/form',
      [
        'title' => $title,
        'data_jenis' => $data_jenis,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/pengeluaran/lain');
    $title = "Update Pengeluaran Lain";
    $data = PengeluaranLain::findOrFail($id);
    $data_jenis = JenisPembayaran::latest()->get();

    return view(
      'pengeluaran::lain/form',
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
      $dataUpate = PengeluaranLain::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update pengeluaran lain: ' . $data['nama_pengeluaran_lain'] . ' : ' . $data['nominal_pengeluaran_lain']);
    } else {
      $data['created_by'] = Auth::user()->username;
      PengeluaranLain::create($data);
      Fungsi::logActivity('create pengeluaran lain: ' . $data['nama_pengeluaran_lain'] . ' : ' . $data['nominal_pengeluaran_lain']);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('pengeluaran_lain.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/pengeluaran/lain');

    $data = PengeluaranLain::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('pengeluaran_lain.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('pengeluaran_lain.index');
  }
}
