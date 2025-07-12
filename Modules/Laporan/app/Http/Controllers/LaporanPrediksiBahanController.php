<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LaporanPrediksiBahanController extends Controller
{
  public function getDataHistoriBahan()
  {
    return DB::table('detail_transaksis as dt')
      ->join('produks as p', 'dt.produk_id', '=', 'p.id')
      ->join('bahan_produks as bp', 'dt.produk_id', '=', 'bp.produk_id')
      ->join('bahans as b', 'bp.bahan_id', '=', 'b.id')
      ->where('p.is_produksi', 1)
      ->whereNotNull('bp.jumlah_bahan_digunakan_unk_1_produk')
      ->orderBy('dt.created_at', 'desc')
      ->select(
        'dt.created_at',
        'dt.nama_produk',
        'dt.produk_id',
        'p.is_produksi',
        'b.nama_bahan',
        'bp.jumlah_bahan_digunakan_unk_1_produk'
      )
      ->get();

  }
  public function index()
  {
    $base_url = rtrim(env('APP_URL'), '/') . ':5001';

    $data = $this->getDataHistoriBahan();
    $response = Http::post($base_url . '/prediksi_bahan_baku', $data->toArray());


    $hasil = $response->json();
    $rows = [];

    foreach ($hasil as $nama_bahan => $items) {
      foreach ($items as $item) {
        $tanggal_raw = $item['tanggal'];
        $rows[] = [
          'tanggal_raw' => $tanggal_raw,
          'nama_bahan' => $nama_bahan,
          'kebutuhan' => round($item['kebutuhan'], 2)
        ];
      }
    }

    usort($rows, function ($a, $b) {
      return strtotime($a['tanggal_raw']) <=> strtotime($b['tanggal_raw']);
    });

    return view('laporan::/prediksi_bahan/index', [
      'title' => "Prediksi Kebutuhan Bahan 7 Hari Kedepan",
      'data' => $rows,
    ]);
  }

}
