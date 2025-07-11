<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Master\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/supplier');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Supplier';
    $data = Supplier::latest()->get();

    return view(
      'master::supplier/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/supplier');

    $title = "Tambah Supplier";
    return view(
      'master::supplier/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/master/supplier');
    $title = "Update Supplier";
    $data = Supplier::findOrFail($id);

    return view(
      'master::supplier/form',
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
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = Supplier::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update supplier: ' . $data['nama_supplier'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Supplier::create($data);
      Fungsi::logActivity('create supplier: ' . $data['nama_supplier'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('master_supplier.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/supplier');

    $data = Supplier::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('master_supplier.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('master_supplier.index');
  }
}
