<?php

namespace Modules\Laporan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Laporan\Exports\LaporanPengeluaranExport;

class LaporanPengeluaranController extends Controller
{
  public function getDataLaporan($start_date, $end_date)
  {
    $operasionals = DB::table('operasionals as a')
      ->select([
        'a.id as id',
        'a.nama_operasional as nama_pengeluaran',
        'a.nominal_operasional as nominal',
        'a.jenis_pembayaran_id as jenis_pembayaran_id',
        'b.jenis_pembayaran as jenis_pembayaran',
        'a.desc as desc',
        'a.created_at as created_at',
        'a.created_by as created_by',
      ])
      ->join('jenis_pembayarans as b', 'a.jenis_pembayaran_id', '=', 'b.id')
      ->whereBetween('a.created_at', [$start_date, $end_date]);

    $pengeluaranLain = DB::table('pengeluaran_lains as c')
      ->select([
        'c.id as id',
        'c.nama_pengeluaran_lain as nama_pengeluaran',
        'c.nominal_pengeluaran_lain as nominal',
        'c.jenis_pembayaran_id as jenis_pembayaran_id',
        'b.jenis_pembayaran as jenis_pembayaran',
        'c.desc as desc',
        'c.created_at as created_at',
        'c.created_by as created_by',
      ])
      ->join('jenis_pembayarans as b', 'c.jenis_pembayaran_id', '=', 'b.id')
      ->whereBetween('c.created_at', [$start_date, $end_date]);

    $query = DB::table(DB::raw("({$operasionals->unionAll($pengeluaranLain)->toSql()}) as pengeluaran"))
      ->mergeBindings($operasionals)
      ->orderByDesc('created_at')
      ->get();

    return $query;
  }

  public function index(Request $request)
  {
    Fungsi::hakAkses('/laporan/pengeluaran');
    $start_date = $request->query('start_date')
      ? Carbon::parse($request->query('start_date'))->startOfDay()->toDateTimeString()
      : Carbon::now()->startOfDay()->toDateTimeString();
    $end_date = $request->query('end_date')
      ? Carbon::parse($request->query('end_date'))->endOfDay()->toDateTimeString()
      : Carbon::now()->endOfDay()->toDateTimeString();
    $data = $this->getDataLaporan($start_date, $end_date);
    $title = 'Data Laporan Pengeluaran';

    return view('laporan::/laporan_pengeluaran/index', [
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
    return Excel::download(new LaporanPengeluaranExport($data), 'laporan_pengeluaran.xlsx');
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

    $title = "Laporan Pengeluaran ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);
    return view(
      'laporan::laporan_pengeluaran/pdf',
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

    $title = "Laporan Pengeluaran ";
    $titleSm = 'Periode : ' . Fungsi::format_tgl($start_date) . ' s/d ' . Fungsi::format_tgl($end_date);

    $html = view('laporan::laporan_pengeluaran.pdf', [
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
