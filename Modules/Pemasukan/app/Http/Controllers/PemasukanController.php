<?php

namespace Modules\Pemasukan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Pemasukan\Models\Pemasukan;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Master\Models\JenisPembayaran;

class PemasukanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/pemasukan/pemasukan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Pemasukan';
    $data = Pemasukan::with('jenisPembayaran')->latest()->get();

    return view(
      'pemasukan::pemasukan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/pemasukan/pemasukan');

    $data_jenis = JenisPembayaran::latest()->get();
    $title = "Tambah Pemasukan";
    return view(
      'pemasukan::pemasukan/form',
      [
        'title' => $title,
        'data_jenis' => $data_jenis,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/jenis_pembayaran');
    $title = "Update Jenis Pembayaran";
    $data = Pemasukan::findOrFail($id);
    $data_jenis = JenisPembayaran::latest()->get();


    return view(
      'master::jenis_pembayaran/form',
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
      $dataUpate = Pemasukan::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update nama pemasukan: ' . $data['nama_pemasukan'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Pemasukan::create($data);
      Fungsi::logActivity('create nama pemasukan: ' . $data['nama_pemasukan'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('pemasukan.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/pemasukan/pemasukan');

    $data = Pemasukan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('pemasukan.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('pemasukan.index');
  }
}
