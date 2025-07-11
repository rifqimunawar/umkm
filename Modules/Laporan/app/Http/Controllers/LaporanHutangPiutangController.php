<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanHutangPiutangController extends Controller
{

  public function getDataLaporanHutang($start_date, $end_date)
  {
    $query1 = DB::table('assets as a')
      ->leftJoin('suppliers as s', 'a.supplier_id', '=', 's.id')
      ->leftJoin('satuans as k', 'a.satuan_id', '=', 'k.id')
      ->select([
        'a.nama_asset as nama_barang',
        'a.harga_beli_satuan as harga_satuan',
        'a.satuan_id',
        'a.qty as qty',
        'a.total_harga_beli as total',
        'a.total_dibayar',
        'a.is_hutang',
        'a.total_hutang as nominal_hutang',
        'a.jatuh_tempo',
        'a.supplier_id',
        's.nama_supplier',
        'k.nama_satuan',
      ])
      ->where('a.total_hutang', '>', 0)
      ->whereNull('a.deleted_at');

    $query2 = DB::table('bahans as b')
      ->leftJoin('suppliers as s', 'b.supplier_id', '=', 's.id')
      ->leftJoin('satuans as k', 'b.satuan_id', '=', 'k.id')
      ->select([
        'b.nama_bahan as nama_barang',
        'b.harga_bahan as harga_satuan',
        'b.satuan_id',
        'b.jumlah_bahan as qty',
        'b.total_harga_bahan as total',
        'b.total_dibayar',
        'b.is_hutang',
        'b.total_hutang as nominal_hutang',
        'b.jatuh_tempo',
        'b.supplier_id',
        's.nama_supplier',
        'k.nama_satuan',
      ])
      ->where('b.total_hutang', '>', 0)
      ->whereNull('b.deleted_at');

    $query3 = DB::table('produks as c')
      ->leftJoin('suppliers as s', 'c.supplier_id', '=', 's.id')
      ->leftJoin('satuans as k', 'c.satuan_id', '=', 'k.id')
      ->select([
        'c.nama_produk as nama_barang',
        'c.harga_beli_satuan as harga_satuan',
        'c.satuan_id',
        'c.jumlah_produk as qty',
        'c.harga_beli as total',
        'c.total_dibayar',
        'c.is_hutang',
        'c.total_hutang as nominal_hutang',
        'c.jatuh_tempo',
        'c.supplier_id',
        's.nama_supplier',
        'k.nama_satuan',
      ])
      ->where('c.total_hutang', '>', 0)
      ->whereNull('c.is_produksi')
      ->whereNull('c.deleted_at');

    $result = $query1
      ->unionAll($query2)
      ->unionAll($query3)
      ->get();

    return $result;
  }

  public function getDataLaporanPiutang($start_date, $end_date)
  {
    $result = DB::table('transaksis as a')
      ->leftJoin('konsumens as b', 'a.konsumen_id', '=', 'b.id')
      ->select('a.*', 'b.nama_konsumen', 'b.kontak_konsumen')
      ->where('a.nominal_kasbon', '>', 0)
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->orderByDesc('a.created_at')
      ->get();
    return $result;
  }
  public function getDataLaporanRiwayatHutang($start_date, $end_date)
  {
    $result = DB::table('riwayat_pembayaran_hutangs as a')
      ->select('a.*')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->orderByDesc('a.created_at')
      ->get();
    return $result;
  }
  public function getDataLaporanRiwayatPiutang($start_date, $end_date)
  {
    $result = DB::table('riwayat_pembayaran_piutangs as a')
      ->select('a.*')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->orderByDesc('a.created_at')
      ->get();
    return $result;
  }

  // ====================================================
  public function index(Request $request)
  {
    Fungsi::hakAkses('/laporan/hutang');

    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();

    $data_hutang = $this->getDataLaporanHutang($start_date, $end_date);
    $data_piutang = $this->getDataLaporanPiutang($start_date, $end_date);
    $data_rw_hutang = $this->getDataLaporanRiwayatHutang($start_date, $end_date);
    $data_rw_piutang = $this->getDataLaporanRiwayatPiutang($start_date, $end_date);
    $title = 'Laporan Hutang Piutang';

    // dd($data_piutang);
    return view('laporan::/laporan_hutang/index', [
      'title' => $title,
      'data_hutang' => $data_hutang,
      'data_piutang' => $data_piutang,
      'data_rw_hutang' => $data_rw_hutang,
      'data_rw_piutang' => $data_rw_piutang,
      'start_date' => substr($start_date, 0, 10),
      'end_date' => substr($end_date, 0, 10),
    ]);
  }
}
