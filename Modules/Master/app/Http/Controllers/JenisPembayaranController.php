<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Master\Models\JenisPembayaran;

class JenisPembayaranController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/jenis_pembayaran');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Jenis Pembayaran';
    $data = JenisPembayaran::latest()->get();

    return view(
      'master::jenis_pembayaran/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/jenis_pembayaran');

    $title = "Tambah Jenis Pembayaran";
    return view(
      'master::jenis_pembayaran/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/jenis_pembayaran');
    $title = "Update Jenis Pembayaran";
    $data = JenisPembayaran::findOrFail($id);

    return view(
      'master::jenis_pembayaran/form',
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
      $newFileName = 'jenis_pembayran_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = JenisPembayaran::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update jenis pembayran: ' . $data['jenis_pembayaran'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      JenisPembayaran::create($data);
      Fungsi::logActivity('create jenis_pembayaran: ' . $data['jenis_pembayaran'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('master_jenis.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/jenis_pembayaran');

    $data = JenisPembayaran::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('master_jenis.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('master_jenis.index');
  }
}
