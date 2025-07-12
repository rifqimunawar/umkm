<?php

namespace Modules\Dashboard\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Jabatan\Models\Jabatan;
use App\Http\Controllers\Controller;
use Carbon\CarbonConverterInterface;
use Illuminate\Support\Facades\Http;
use Modules\Karyawan\Models\Karyawan;
use Modules\Kasir\Models\DetailTransaksi;
use Modules\Kasir\Models\Transaksi;
use Modules\Kegiatan\Models\Kegiatan;
use Modules\Penjualan\Models\Produk;
use Modules\Sinkronisasi\Models\Sinkronisasi;

class DashboardController extends Controller
{

  public function index()
  {
    Fungsi::logActivity('Open Dashboard');

    $data_transaksi_hari_ini = Transaksi::whereBetween('created_at', [
      Carbon::today()->startOfDay(),
      Carbon::today()->endOfDay()
    ])->get();
    $data_produk_terjual_hari_ini = DetailTransaksi::whereBetween('created_at', [
      Carbon::today()->startOfDay(),
      Carbon::today()->endOfDay()
    ]);

    $data_menipis = Produk::with('satuan')
      ->where('jumlah_produk', '>', 0)
      ->orderBy('jumlah_produk', 'asc')
      ->get();



    // dd($data_menipis);
    return view('dashboard::index', [
      'data_transaksi_hari_ini' => $data_transaksi_hari_ini,
      'data_produk_terjual_hari_ini' => $data_produk_terjual_hari_ini,
      'data_menipis' => $data_menipis,
    ]);
  }

  public function getDataHarianProduksi()
  {
    $limitDate = Carbon::now()->subMonths(12)->startOfDay();

    $data_harian = DB::table('detail_transaksis as a')
      ->selectRaw('date(a.created_at) as tanggal, b.is_produksi, SUM(a.total_harga_produk) as total_harga_harian')
      ->join('produks as b', 'a.produk_id', '=', 'b.id')
      ->where('b.is_produksi', 1)
      ->where('a.created_at', '>=', $limitDate)
      ->groupBy('tanggal', 'b.is_produksi')
      ->orderBy('tanggal', 'asc')
      ->get()
      ->map(function ($item) {
        $item->tanggal = strtoupper(Carbon::parse($item->tanggal)->format('d M y'));
        return $item;
      });

    return response()->json($data_harian);
  }

  public function getDataHarianProduk()
  {
    $limitDate = Carbon::now()->subMonths(12)->startOfDay();

    $data_harian = DB::table('detail_transaksis as a')
      ->selectRaw('date(a.created_at) as tanggal, b.is_produksi, SUM(a.total_harga_produk) as total_harga_harian')
      ->join('produks as b', 'a.produk_id', '=', 'b.id')
      ->whereNull('b.is_produksi')
      ->where('a.created_at', '>=', $limitDate)
      ->groupBy('tanggal', 'b.is_produksi')
      ->orderBy('tanggal', 'asc')
      ->get()
      ->map(function ($item) {
        $item->tanggal = strtoupper(Carbon::parse($item->tanggal)->format('d M y'));
        return $item;
      });

    return response()->json($data_harian);
  }





}
