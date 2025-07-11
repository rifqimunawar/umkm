<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Laporan\Exports\LaporanStokProdukExport;

class LaporanStokProdukController extends Controller
{
  public function getDataLaporan($start_date, $end_date)
  {
    $result = DB::table('produks as a')
      ->leftJoin('satuans as b', 'a.satuan_id', '=', 'b.id')
      ->leftJoin('kategoris as c', 'a.kategori_id', '=', 'c.id')
      ->whereNull('a.deleted_at')
      ->whereBetween('a.created_at', [$start_date, $end_date])
      ->select(
        'a.*',
        'b.nama_satuan',
        'c.nama_kategori',
      )
      ->orderBy('a.jumlah_produk', 'asc')
      ->get();

    return $result;
  }

  public function index(Request $request)
  {
    Fungsi::hakAkses('/laporan/produk');
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporan($start_date, $end_date);
    $title = 'Data Laporan Sisa Stok Produk';

    return view('laporan::/laporan_produk/index', [
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
    return Excel::download(new LaporanStokProdukExport($data), 'laporan_produk.xlsx');
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

    $title = "Laporan Sisa Stok Produk ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);
    return view(
      'laporan::laporan_produk/pdf',
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

    $title = "Laporan Sisa Stok Produk ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);

    $html = view('laporan::laporan_produk.pdf', [
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
