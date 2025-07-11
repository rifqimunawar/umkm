<?php

namespace Modules\Pembelian\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Bahan\Models\Bahan;
use Illuminate\Support\Facades\DB;
use Modules\Pembelian\Models\Asset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Penjualan\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Pembelian\Models\RiwayatPembayaranHutang;

class PembayaranHutangPembelianController extends Controller
{

  public function dataHutang()
  {
    $today = now()->toDateString();
    $yesterday = now()->subDay()->toDateString();

    $queryTodayYesterdayAssets = DB::table('assets as a')
      ->leftJoin('suppliers as s', 'a.supplier_id', '=', 's.id')
      ->select(
        'a.id as id_barang',
        'a.nama_asset as nama_barang',
        'a.total_harga_beli as total_harga_beli',
        'a.total_dibayar as total_dibayar',
        'a.total_hutang as total_hutang',
        'a.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('1 as sumber'),
        DB::raw('"assets" as sumber_text')
      )
      ->where('a.total_hutang', '>', 0)
      ->whereNull('a.deleted_at')
      ->whereIn('a.jatuh_tempo', [$today, $yesterday])
      ->orderBy('a.jatuh_tempo', 'asc');

    $queryFutureAssets = DB::table('assets as a')
      ->leftJoin('suppliers as s', 'a.supplier_id', '=', 's.id')
      ->select(
        'a.id as id_barang',
        'a.nama_asset as nama_barang',
        'a.total_harga_beli as total_harga_beli',
        'a.total_dibayar as total_dibayar',
        'a.total_hutang as total_hutang',
        'a.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('1 as sumber'),
        DB::raw('"assets" as sumber_text')
      )
      ->where('a.total_hutang', '>', 0)
      ->whereNull('a.deleted_at')
      ->where('a.jatuh_tempo', '>', $today)
      ->orderBy('a.jatuh_tempo', 'asc');

    $queryTodayYesterdayBahans = DB::table('bahans as b')
      ->leftJoin('suppliers as s', 'b.supplier_id', '=', 's.id')
      ->select(
        'b.id as id_barang',
        'b.nama_bahan as nama_barang',
        'b.total_harga_bahan as total_harga_beli',
        'b.total_dibayar as total_dibayar',
        'b.total_hutang as total_hutang',
        'b.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('2 as sumber'),
        DB::raw('"bahans" as sumber_text')
      )
      ->where('b.total_hutang', '>', 0)
      ->whereNull('b.deleted_at')
      ->whereIn('b.jatuh_tempo', [$today, $yesterday])
      ->orderBy('b.jatuh_tempo', 'asc');

    $queryFutureBahans = DB::table('bahans as b')
      ->leftJoin('suppliers as s', 'b.supplier_id', '=', 's.id')
      ->select(
        'b.id as id_barang',
        'b.nama_bahan as nama_barang',
        'b.total_harga_bahan as total_harga_beli',
        'b.total_dibayar as total_dibayar',
        'b.total_hutang as total_hutang',
        'b.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('2 as sumber'),
        DB::raw('"bahans" as sumber_text')
      )
      ->where('b.total_hutang', '>', 0)
      ->whereNull('b.deleted_at')
      ->where('b.jatuh_tempo', '>', $today)
      ->orderBy('b.jatuh_tempo', 'asc');

    $queryTodayYesterdayProduks = DB::table('produks as p')
      ->leftJoin('suppliers as s', 'p.supplier_id', '=', 's.id')
      ->select(
        'p.id as id_barang',
        'p.nama_produk as nama_barang',
        'p.harga_beli as total_harga_beli',
        'p.total_dibayar as total_dibayar',
        'p.total_hutang as total_hutang',
        'p.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('3 as sumber'),
        DB::raw('"produks" as sumber_text')
      )
      ->where('p.total_hutang', '>', 0)
      ->whereNull('p.deleted_at')
      ->whereIn('p.jatuh_tempo', [$today, $yesterday])
      ->orderBy('p.jatuh_tempo', 'asc');

    $queryFutureProduks = DB::table('produks as p')
      ->leftJoin('suppliers as s', 'p.supplier_id', '=', 's.id')
      ->select(
        'p.id as id_barang',
        'p.nama_produk as nama_barang',
        'p.harga_beli as total_harga_beli',
        'p.total_dibayar as total_dibayar',
        'p.total_hutang as total_hutang',
        'p.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('3 as sumber'),
        DB::raw('"produks" as sumber_text')
      )
      ->where('p.total_hutang', '>', 0)
      ->whereNull('p.deleted_at')
      ->where('p.jatuh_tempo', '>', $today)
      ->orderBy('p.jatuh_tempo', 'asc');

    $result = $queryTodayYesterdayAssets
      ->unionAll($queryFutureAssets)
      ->unionAll($queryTodayYesterdayBahans)
      ->unionAll($queryFutureBahans)
      ->unionAll($queryTodayYesterdayProduks)
      ->unionAll($queryFutureProduks)
      ->get();

    return $result;
  }


  public function dataHutangById($id_barang)
  {
    $today = now()->toDateString();
    $yesterday = now()->subDay()->toDateString();

    $queryTodayYesterdayAssets = DB::table('assets as a')
      ->leftJoin('suppliers as s', 'a.supplier_id', '=', 's.id')
      ->select(
        'a.id as id_barang',
        'a.nama_asset as nama_barang',
        'a.total_harga_beli as total_harga_beli',
        'a.total_dibayar as total_dibayar',
        'a.total_hutang as total_hutang',
        'a.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('1 as sumber'),
        DB::raw('"assets" as sumber_text')
      )
      ->where('a.total_hutang', '>', 0)
      ->where('a.id', $id_barang)
      ->whereNull('a.deleted_at')
      ->whereIn('a.jatuh_tempo', [$today, $yesterday]);

    $queryFutureAssets = DB::table('assets as a')
      ->leftJoin('suppliers as s', 'a.supplier_id', '=', 's.id')
      ->select(
        'a.id as id_barang',
        'a.nama_asset as nama_barang',
        'a.total_harga_beli as total_harga_beli',
        'a.total_dibayar as total_dibayar',
        'a.total_hutang as total_hutang',
        'a.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('1 as sumber'),
        DB::raw('"assets" as sumber_text')
      )
      ->where('a.total_hutang', '>', 0)
      ->where('a.id', $id_barang)
      ->whereNull('a.deleted_at')
      ->where('a.jatuh_tempo', '>', $today);

    $queryTodayYesterdayBahans = DB::table('bahans as b')
      ->leftJoin('suppliers as s', 'b.supplier_id', '=', 's.id')
      ->select(
        'b.id as id_barang',
        'b.nama_bahan as nama_barang',
        'b.total_harga_bahan as total_harga_beli',
        'b.total_dibayar as total_dibayar',
        'b.total_hutang as total_hutang',
        'b.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('2 as sumber'),
        DB::raw('"bahans" as sumber_text')
      )
      ->where('b.total_hutang', '>', 0)
      ->where('b.id', $id_barang)
      ->whereNull('b.deleted_at')
      ->whereIn('b.jatuh_tempo', [$today, $yesterday]);

    $queryFutureBahans = DB::table('bahans as b')
      ->leftJoin('suppliers as s', 'b.supplier_id', '=', 's.id')
      ->select(
        'b.id as id_barang',
        'b.nama_bahan as nama_barang',
        'b.total_harga_bahan as total_harga_beli',
        'b.total_dibayar as total_dibayar',
        'b.total_hutang as total_hutang',
        'b.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('2 as sumber'),
        DB::raw('"bahans" as sumber_text')
      )
      ->where('b.total_hutang', '>', 0)
      ->where('b.id', $id_barang)
      ->whereNull('b.deleted_at')
      ->where('b.jatuh_tempo', '>', $today);

    $queryTodayYesterdayProduks = DB::table('produks as p')
      ->leftJoin('suppliers as s', 'p.supplier_id', '=', 's.id')
      ->select(
        'p.id as id_barang',
        'p.nama_produk as nama_barang',
        'p.harga_beli as total_harga_beli',
        'p.total_dibayar as total_dibayar',
        'p.total_hutang as total_hutang',
        'p.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('3 as sumber'),
        DB::raw('"produks" as sumber_text')
      )
      ->where('p.total_hutang', '>', 0)
      ->where('p.id', $id_barang)
      ->whereNull('p.deleted_at')
      ->whereIn('p.jatuh_tempo', [$today, $yesterday]);

    $queryFutureProduks = DB::table('produks as p')
      ->leftJoin('suppliers as s', 'p.supplier_id', '=', 's.id')
      ->select(
        'p.id as id_barang',
        'p.nama_produk as nama_barang',
        'p.harga_beli as total_harga_beli',
        'p.total_dibayar as total_dibayar',
        'p.total_hutang as total_hutang',
        'p.jatuh_tempo as jatuh_tempo',
        's.nama_supplier',
        DB::raw('3 as sumber'),
        DB::raw('"produks" as sumber_text')
      )
      ->where('p.total_hutang', '>', 0)
      ->where('p.id', $id_barang)
      ->whereNull('p.deleted_at')
      ->where('p.jatuh_tempo', '>', $today);

    $result = $queryTodayYesterdayAssets
      ->unionAll($queryFutureAssets)
      ->unionAll($queryTodayYesterdayBahans)
      ->unionAll($queryFutureBahans)
      ->unionAll($queryTodayYesterdayProduks)
      ->unionAll($queryFutureProduks)
      ->first();

    return $result;
  }







  public function index()
  {
    Fungsi::hakAkses('/pembelian/hutang');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Hutang';
    $data = $this->dataHutang();

    // dd($data);
    return view(
      'pembelian::hutang/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function edit($id_barang)
  {
    Fungsi::hakAkses('/pembelian/hutang');
    $title = "Update Hutang";
    $data = $this->dataHutangById($id_barang);

    // dd($data);
    return view(
      'pembelian::hutang/form',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function store(Request $request)
  {
    $request->validate([
      'nama_barang' => 'required|string',
      'nominal_dibayar' => 'required|numeric',
      'id_barang' => 'required',
      'sumber' => 'required|in:1,2,3',
      'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->all();

    $data['total_dibayar'] = $request->total_dibayar + $request->nominal_dibayar;

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    $username = Auth::user()->username;
    $isUpdate = !empty($request->id);

    $riwayat = $isUpdate ? RiwayatPembayaranHutang::findOrFail($request->id) : new RiwayatPembayaranHutang();

    if ($isUpdate) {
      $selisih = $request->nominal_dibayar - $riwayat->nominal_dibayar;
      $data['updated_by'] = $username;
      $riwayat->update($data);
      Fungsi::logActivity('Update pembelian RiwayatPembayaranHutang: ' . $data['nama_barang']);
    } else {
      $data['created_by'] = $username;
      $riwayat = RiwayatPembayaranHutang::create($data);
      $selisih = $request->nominal_dibayar;
      Fungsi::logActivity('Create pembelian RiwayatPembayaranHutang: ' . $data['nama_barang']);
    }


    $model = null;
    $id = $request->id_barang;

    switch ($request->sumber) {
      case 1:
        $model = Asset::where('id', $id)->first();
        break;
      case 2:
        $model = Bahan::where('id', $id)->first();
        break;
      case 3:
        $model = Produk::where('id', $id)->first();
        break;
      default:
        return back()->withErrors(['sumber' => 'Sumber hutang tidak valid.']);
    }

    if (!$model) {
      return back()->withErrors(['id_barang' => 'Data hutang tidak ditemukan untuk ID yang diberikan.']);
    }

    // Logging dan update hutang
    Fungsi::logActivity('Sebelum update hutang: ' . $model->total_hutang);
    Fungsi::logActivity('Nominal dikurang: ' . $selisih);

    $model->total_hutang -= $selisih;
    $model->total_dibayar += $selisih;
    $model->updated_by = Auth::user()->username;
    $model->save();

    Fungsi::logActivity('Setelah update hutang: ' . $model->total_hutang);


    Alert::success('Success', 'Data berhasil ' . ($isUpdate ? 'diupdate' : 'disimpan'));
    return redirect()->route('hutang_pembelian.index');
  }


}
