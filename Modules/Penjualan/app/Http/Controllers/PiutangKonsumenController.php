<?php

namespace Modules\Penjualan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Kasir\Models\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Penjualan\Models\RiwayatPembayaranPiutang;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Penjualan\Models\RiwayatPembayaranPiutangKonsumen;

class PiutangKonsumenController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/penjualan/piutang');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Piutang Konsumen';
    $data = Transaksi::with('konsumen')->where('nominal_kasbon', '>', 0)->latest()->get();

    // dd($data);
    return view(
      'penjualan::piutang/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/penjualan/piutang');
    $title = "Update Satuan";
    $data = Transaksi::with(['detailTransaksi', 'konsumen'])->findOrFail($id);

    // dd($data);
    return view(
      'penjualan::piutang/form',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function store(Request $request)
  {

    // dd($request);
    $request->validate([
      // 'transaksi_id' => 'required|transaksi_id',
      'konsumen_id' => 'required|exists:konsumens,id',
      'nama_konsumen' => 'required|string',
      'nominal_belanja' => 'required|numeric|min:0',
      'nominal_dibayar' => 'required|numeric|min:0',
      'nominal_kasbon' => 'required|numeric|min:0',
      'nominal_dibayar_sekarang' => 'required|numeric|min:0',
      // 'nominal_sisa_kasbon' => 'required|numeric|min:0',
      'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $nominal_kasbon_lama = (float) $request->nominal_kasbon;
    $nominal_dibayar_lama = (float) $request->nominal_dibayar;
    $nominal_dibayar_sekarang = (float) $request->nominal_dibayar_sekarang;

    $data['nominal_kasbon'] = $nominal_kasbon_lama - $nominal_dibayar_sekarang;
    $data['nominal_dibayar'] = $nominal_dibayar_lama + $nominal_dibayar_sekarang;
    $nominal_sisa_kasbon = $data['nominal_kasbon'];


    $data_riwayat_pembayaran = [
      'transaksi_id' => $request->transaksi_id,
      'konsumen_id' => $request->konsumen_id,
      'nama_konsumen' => $request->nama_konsumen,
      'nominal_belanja' => (float) $request->nominal_belanja,
      'nominal_dibayar' => $data['nominal_dibayar'], // total setelah update
      'nominal_kasbon' => $data['nominal_kasbon'],   // sisa kasbon
      'nominal_pembayaran_kasbon' => $nominal_dibayar_sekarang,
      'nominal_sisa_kasbon' => $nominal_sisa_kasbon, // sama seperti nominal_kasbon
      'created_by' => Auth::user()->username,
    ];


    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    $dataUpate = Transaksi::findOrFail($request->transaksi_id);
    $data['updated_by'] = Auth::user()->username;
    $data['updated_at'] = Carbon::now();
    $dataUpate->update($data);

    Fungsi::logActivity('update pembayaran kasbon: ' . $data_riwayat_pembayaran['nama_konsumen']);

    RiwayatPembayaranPiutang::create($data_riwayat_pembayaran);

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('penjualan_piutang.index');
  }

}
