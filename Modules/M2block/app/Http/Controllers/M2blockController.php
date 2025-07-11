<?php

namespace Modules\M2block\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\M2block\Models\M2block;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class M2blockController extends Controller
{
  public function index()
  {
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Satuan';
    $raw = M2block::latest()->get(); // ini untuk ditampilkan ke view
    $nomor = M2block::pluck('nomor_m2block'); // ini untuk forecast

    $response = Http::post('http://127.0.0.1:5001/m2block', [
      'data' => $nomor->toArray()
    ]);

    if (!$response->successful()) {
      dd('Flask Error:', $response->body());
    }

    $json = $response->json();

    if (!is_array($json)) {
      dd('Invalid JSON response:', $json);
    }

    $next = $json['next'] ?? null;
    $next1 = $json['next1'] ?? null;
    $next2 = $json['next2'] ?? null;

    return view(
      'm2block::m2block/index',
      [
        'title' => $title,
        'data' => $raw,
        'next' => $next,
        'next1' => $next1,
        'next2' => $next2,
      ]
    );
  }
  public function create()
  {
    $title = "Tambah Satuan";
    return view(
      'm2block::m2block/form',
      [
        'title' => $title,
      ]
    );
  }
  public function edit($id)
  {
    $title = "Update Satuan";
    $data = M2block::findOrFail($id);

    return view(
      'm2block::m2block/form',
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
      $dataUpate = M2block::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update m2block: ' . $data['nomor_m2block'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      M2block::create($data);
      Fungsi::logActivity('create m2block: ' . $data['nomor_m2block'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('m2block.index');
  }
}
