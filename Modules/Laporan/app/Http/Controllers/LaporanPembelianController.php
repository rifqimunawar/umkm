<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Laporan\Exports\LaporanPembelianExport;

class LaporanPembelianController extends Controller
{
  public function getDataLaporan($start_date, $end_date)
  {
    $result = DB::table('riwayat_pembelians')
      ->whereNull('deleted_at')
      ->whereBetween('created_at', [$start_date, $end_date])
      ->get();

    return $result;
  }
  public function index(Request $request)
  {
    Fungsi::hakAkses('/laporan/pembelian');
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporan($start_date, $end_date);
    $title = 'Data Laporan Pembelian';

    return view('laporan::/laporan_pembelian/index', [
      'title' => $title,
      'data' => $data,
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
    return Excel::download(new LaporanPembelianExport($data), 'laporan_pembelian.xlsx');
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

    $title = "Laporan Pembelian ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);
    return view(
      'laporan::laporan_pembelian/pdf',
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

    $title = "Laporan Pembelian ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);

    $html = view('laporan::laporan_pembelian.pdf', [
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
