<?php

namespace Modules\ManagementStok\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\ManagementStok\Models\Kategori;

class KategoriController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/stok/kategori');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Kategori Produk';
    $data = Kategori::latest()->get();

    return view(
      'managementstok::/kategori/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/stok/kategori');

    $title = "Tambah Kategori Produk";
    return view(
      'managementstok::kategori/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/stok/kategori');
    $title = "Update Kategori Produk";
    $data = Kategori::findOrFail($id);

    return view(
      'managementstok::kategori/form',
      [
        'title' => $title,
        'data' => $data,
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
      $dataUpate = Kategori::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update kategori: ' . $data['nama_kategori'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Kategori::create($data);
      Fungsi::logActivity('create kategori: ' . $data['nama_kategori'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('kategori.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/stok/kategori');

    $data = Kategori::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    if ($data->produks()->count() > 0) {
      Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
      return redirect()->route('kategori.index');
    }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('kategori.index');
  }
}
