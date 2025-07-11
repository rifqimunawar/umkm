<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanLabarugiController extends Controller
{
  public function getPenjualanKotor($start_date, $end_date)
  {
    $result = DB::table('transaksis')
      ->whereNull('deleted_at')
      ->whereBetween('created_at', [$start_date, $end_date])
      ->sum('nominal_dibayar');

    return $result;
  }
  public function getReturPenjualan($start_date, $end_date)
  {
    $result = DB::table('retur_penjualans as a')
      ->join('detail_transaksis as b', 'a.item_id', '=', 'b.id')
      ->join('produks as c', 'b.produk_id', '=', 'c.id')
      ->whereNotNull('c.harga_beli_satuan')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->select(
        'a.item_id',
        'c.nama_produk',
        'a.retur_qty',
        'a.alasan',
        'c.harga_beli_satuan',
        DB::raw('(a.retur_qty * c.harga_beli_satuan) as total_retur')
      )
      ->get();

    return $result;
  }
  public function getHpp($start_date, $end_date)
  {
    $result = DB::table('produks')
      ->whereBetween('created_at', [$start_date, $end_date])
      ->pluck('harga_beli');

    return $result;
  }
  public function getOperasional($start_date, $end_date)
  {
    $query1 = DB::table('operasionals as a')
      ->whereNull('a.deleted_at')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->select(
        'a.nama_operasional as nama_pengeluaran',
        'a.nominal_operasional as nominal_pengeluaran'
      );

    $query2 = DB::table('pengeluaran_lains as b')
      ->whereNull('b.deleted_at')
      ->whereBetween('b.created_at', [$start_date, $end_date])
      ->select(
        'b.nama_pengeluaran_lain as nama_pengeluaran',
        'b.nominal_pengeluaran_lain as nominal_pengeluaran'
      );

    $result = $query1->unionAll($query2)->get();

    return $result;
  }



  public function index(Request $request)
  {
    Fungsi::hakAkses('/laporan/labarugi');
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();

    $data_nominal_penjualan = $this->getPenjualanKotor($start_date, $end_date);
    $data_retur_penjualan = $this->getReturPenjualan($start_date, $end_date);
    $data_nominal_retur_penjualan = $data_retur_penjualan->sum('total_retur');
    $data_hpp = $this->getHpp($start_date, $end_date);
    $data_nominal_hpp = $data_hpp->sum();
    $data_operasional = $this->getOperasional($start_date, $end_date);
    $data_nominal_operasional = $data_operasional->sum('nominal_pengeluaran');

    $title = 'Data Laporan Laba Rugi';

    return view('laporan::/laporan_labarugi/index', [
      'title' => $title,
      'data_nominal_penjualan' => $data_nominal_penjualan,
      'data_nominal_retur_penjualan' => $data_nominal_retur_penjualan,
      'data_nominal_hpp' => $data_nominal_hpp,
      'data_nominal_operasional' => $data_nominal_operasional,
      'start_date' => substr($start_date, 0, 10),
      'end_date' => substr($end_date, 0, 10),
    ]);
  }

}
