<?php

namespace Modules\Dashboard\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Jabatan\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Modules\Karyawan\Models\Karyawan;
use Modules\Kasir\Models\DetailTransaksi;
use Modules\Kasir\Models\Transaksi;
use Modules\Kegiatan\Models\Kegiatan;
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

    // dd($data_transaksi_hari_ini);
    return view('dashboard::index', [
      'data_transaksi_hari_ini' => $data_transaksi_hari_ini,
      'data_produk_terjual_hari_ini' => $data_produk_terjual_hari_ini,
    ]);
  }

}
