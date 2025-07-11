<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Laporan\Exports\LaporanPenjualanExport;

class LaporanPenjualanController extends Controller
{
  public function getDataLaporan($start_date, $end_date)
  {
    return DB::table('detail_transaksis as a')
      ->select([
        'a.created_at',
        'a.nama_produk',
        'a.harga_satuan_produk',
        'a.qty',
        'a.total_harga_produk',
        't.nominal_kasbon',
        'a.created_by',
        'c.nama_kategori',
        'd.nama_konsumen',
      ])
      ->leftJoin('produks as b', 'a.produk_id', '=', 'b.id')
      ->leftJoin('kategoris as c', 'b.kategori_id', '=', 'c.id')
      ->leftJoin('transaksis as t', 'a.transaksi_id', '=', 't.id')
      ->leftJoin('konsumens as d', 't.konsumen_id', '=', 'd.id')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->orderByDesc('a.created_at')
      ->get();

  }
  public function getDataLaporanProdukJadi($start_date, $end_date)
  {
    return DB::table('detail_transaksis as a')
      ->select([
        'a.created_at',
        'a.nama_produk',
        'a.harga_satuan_produk',
        'a.qty',
        'a.total_harga_produk',
        't.nominal_kasbon',
        'a.created_by',
        'c.nama_kategori',
        'd.nama_konsumen',
      ])
      ->leftJoin('produks as b', 'a.produk_id', '=', 'b.id')
      ->leftJoin('kategoris as c', 'b.kategori_id', '=', 'c.id')
      ->leftJoin('transaksis as t', 'a.transaksi_id', '=', 't.id')
      ->leftJoin('konsumens as d', 't.konsumen_id', '=', 'd.id')
      ->whereNull('b.is_produksi')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->orderByDesc('a.created_at')
      ->get();
  }
  public function getDataLaporanHasilProduksi($start_date, $end_date)
  {
    return DB::table('detail_transaksis as a')
      ->select([
        'a.created_at',
        'a.nama_produk',
        'a.harga_satuan_produk',
        'a.qty',
        'a.total_harga_produk',
        't.nominal_kasbon',
        'a.created_by',
        'c.nama_kategori',
        'd.nama_konsumen',
      ])
      ->leftJoin('produks as b', 'a.produk_id', '=', 'b.id')
      ->leftJoin('kategoris as c', 'b.kategori_id', '=', 'c.id')
      ->leftJoin('transaksis as t', 'a.transaksi_id', '=', 't.id')
      ->leftJoin('konsumens as d', 't.konsumen_id', '=', 'd.id')
      ->where('is_produksi', 1)
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->orderByDesc('a.created_at')
      ->get();
  }
  public function index(Request $request)
  {
    Fungsi::hakAkses('/laporan/penjualan');

    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();

    $data = $this->getDataLaporan($start_date, $end_date);
    $data_produk_jadi = $this->getDataLaporanProdukJadi($start_date, $end_date);
    $data_hasil_produksi = $this->getDataLaporanHasilProduksi($start_date, $end_date);
    $title = 'Data Laporan Penjualan';

    return view('laporan::/laporan_penjualan/index', [
      'title' => $title,
      'data' => $data,
      'data_produk_jadi' => $data_produk_jadi,
      'data_hasil_produksi' => $data_hasil_produksi,
      'start_date' => substr($start_date, 0, 10),
      'end_date' => substr($end_date, 0, 10),
    ]);
  }
  public function export(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporan($start_date, $end_date);
    return Excel::download(new LaporanPenjualanExport($data), 'laporan_penjualan.xlsx');
  }
  public function print(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporan($start_date, $end_date);

    $title = "Laporan Penjualan ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);
    return view(
      'laporan::laporan_penjualan/pdf',
      [
        'title' => $title,
        'titleSm' => $titleSm,
        'data' => $data,
      ]
    );

  }
  public function pdf(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporan($start_date, $end_date);

    $title = "Laporan Penjualan ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);

    $html = view('laporan::laporan_penjualan.pdf', [
      'title' => $title,
      'titleSm' => $titleSm,
      'data' => $data,
    ])->render();

    // Buat PDF landscape
    $mpdf = new \Mpdf\Mpdf([
      'orientation' => 'L'
    ]);
    $mpdf->WriteHTML($html);
    $fileName = str_replace(' ', '_', $title . '_' . $titleSm) . '.pdf';
    $mpdf->Output($fileName, 'D');
  }
  public function exportProdukJadi(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporanProdukJadi($start_date, $end_date);
    return Excel::download(new LaporanPenjualanExport($data), 'laporan_penjualan_produk_jadi.xlsx');
  }
  public function printProdukJadi(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporanProdukJadi($start_date, $end_date);

    $title = "Laporan Penjualan Produk Jadi ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);
    return view(
      'laporan::laporan_penjualan/pdf',
      [
        'title' => $title,
        'titleSm' => $titleSm,
        'data' => $data,
      ]
    );

  }
  public function pdfProdukJadi(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporanProdukJadi($start_date, $end_date);

    $title = "Laporan Penjualan Produk Jadi ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);

    $html = view('laporan::laporan_penjualan.pdf', [
      'title' => $title,
      'titleSm' => $titleSm,
      'data' => $data,
    ])->render();

    // Buat PDF landscape
    $mpdf = new \Mpdf\Mpdf([
      'orientation' => 'L'
    ]);
    $mpdf->WriteHTML($html);
    $fileName = str_replace(' ', '_', $title . '_' . $titleSm) . '.pdf';
    $mpdf->Output($fileName, 'D');
  }
  public function exportHasilProduksi(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporanHasilProduksi($start_date, $end_date);
    return Excel::download(new LaporanPenjualanExport($data), 'laporan_penjualan_hasil_produksi.xlsx');
  }
  public function printHasilProduksi(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();

    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporanHasilProduksi($start_date, $end_date);

    $title = "Laporan Penjualan Hasil Produksi ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);
    return view(
      'laporan::laporan_penjualan/pdf',
      [
        'title' => $title,
        'titleSm' => $titleSm,
        'data' => $data,
      ]
    );

  }
  public function pdfHasilProduksi(Request $request)
  {
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporanProdukJadi($start_date, $end_date);

    $title = "Laporan Penjualan Hasil Produksi ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);

    $html = view('laporan::laporan_penjualan.pdf', [
      'title' => $title,
      'titleSm' => $titleSm,
      'data' => $data,
    ])->render();

    // Buat PDF landscape
    $mpdf = new \Mpdf\Mpdf([
      'orientation' => 'L'
    ]);
    $mpdf->WriteHTML($html);
    $fileName = str_replace(' ', '_', $title . '_' . $titleSm) . '.pdf';
    $mpdf->Output($fileName, 'D');
  }
}
