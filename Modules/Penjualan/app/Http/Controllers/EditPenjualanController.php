<?php

namespace Modules\Penjualan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Kasir\Models\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Konsumen\Models\Konsumen;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Kasir\Models\DetailTransaksi;

class EditPenjualanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/penjualan/edit');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Penjualan';
    $data = Transaksi::latest()->get();

    return view(
      'penjualan::edit/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function edit($id)
  {
    Fungsi::hakAkses('/penjualan/edit');
    $title = "Update Transaksi";
    $data = Transaksi::findOrFail($id);
    $id_transaksi = $id;

    return view(
      'penjualan::edit/form',
      [
        'title' => $title,
        'data' => $data,
        'id_transaksi' => $id_transaksi,
      ]
    );
  }

  public function getDataTransaksi($id_transaksi)
  {
    $data = Transaksi::with(['detailTransaksi', 'konsumen'])->findOrFail($id_transaksi);
    return response()->json($data);
  }
  public function getDataKonsumen()
  {
    $data_konsumen = Konsumen::latest()->get();
    return response()->json($data_konsumen);
  }

  public function storeRetur(Request $request)
  {
    try {
      // Validasi dasar
      $request->validate([
        'transaksi_id' => 'required|uuid',
        'item_id' => 'required|uuid',
        'retur_qty' => 'required|integer|min:1',
        'alasan' => 'required|string'
      ]);

      // Ambil transaksi
      $data_transaksi = Transaksi::where('id', $request->transaksi_id)->firstOrFail();

      // Ambil detail transaksi
      $data_detail_trans = DetailTransaksi::where('id', $request->item_id)
        ->where('transaksi_id', $request->transaksi_id)
        ->firstOrFail();

      $retur_qty = $request->retur_qty;
      $harga_satuan = $data_detail_trans->harga_satuan_produk;

      // Validasi qty retur tidak melebihi yg tersedia
      if ($retur_qty > $data_detail_trans->qty) {
        return response()->json([
          'success' => false,
          'message' => 'Qty retur melebihi jumlah yang dibeli.'
        ], 400);
      }

      // Hitung nominal retur
      $nominal_retur = $retur_qty * $harga_satuan;

      // Update transaksi
      $data_transaksi->nominal_belanja -= $nominal_retur;
      $data_transaksi->updated_by = Auth::user()->username ?? 'retur_api';
      $data_transaksi->save();

      // Update detail transaksi
      $data_detail_trans->qty -= $retur_qty;
      $data_detail_trans->total_harga_produk = $data_detail_trans->qty * $harga_satuan;
      $data_detail_trans->updated_by = Auth::user()->username ?? 'retur_api';
      $data_detail_trans->save();

      // Simpan log retur (opsional)
      DB::table('retur_penjualans')->insert([
        'id' => (string) \Illuminate\Support\Str::uuid(),
        'transaksi_id' => $request->transaksi_id,
        'item_id' => $request->item_id,
        'retur_qty' => $retur_qty,
        'alasan' => $request->alasan,
        'created_by' => Auth::user()->username ?? 'retur_api',
        'created_at' => now(),
      ]);

      // Log aktivitas (jika ada fungsi log)
      Fungsi::logActivity('Retur produk: ' . $request->item_id . ' - ' . $request->alasan);

      return response()->json([
        'success' => true,
        'message' => 'Retur berhasil disimpan.'
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
      ], 500);
    }
  }


  public function store(Request $request)
  {
    $data = $request->all();
    $data = [
      'konsumen_id' => $request->nama_konsumen ?? NULL,
      'nominal_belanja' => $request->nominal_belanja ?? NULL,
      'nominal_dibayar' => $request->nominal_dibayar ?? NULL,
      'nominal_kasbon' => $request->nominal_kasbon ?? NULL,
    ];

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $dataUpate = Transaksi::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $dataUpate->update($data);
      Fungsi::logActivity('update satuan: ' . $data['nominal_belanja'] . ' ');
    } else {
      $data['created_by'] = Auth::user()->username;
      Transaksi::create($data);
      Fungsi::logActivity('create satuan: ' . $data['nominal_belanja'] . ' ');
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('penjualan_edit.index');
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/penjualan/edit');

    $data = Transaksi::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->produks()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki produk');
    //   return redirect()->route('penjualan_edit.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('penjualan_edit.index');
  }
}
