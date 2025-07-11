<?php

namespace Modules\Laporan\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Helpers\Fungsi;
use App\Helpers\GetSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Ronda\Models\RondaAbsen;
use Modules\Penilaian\Models\Penilaian;
use Modules\Pembayaran\Models\Pembayaran;
use Modules\Laporan\Exports\LaporanExport;
use Modules\Laporan\Exports\PembayaranExport;

class LaporanController extends Controller
{
  public function getDataLaporan()
  {
    return DB::table('penilaians as a')
      ->join('karyawans as b', 'a.karyawan_id', '=', 'b.id')
      ->join('periodes as c', 'a.periode_id', '=', 'c.id')
      ->join('jabatans as d', 'b.jabatan_id', '=', 'd.id')
      ->join('penilaian_details as e', 'e.penilaian_id', '=', 'a.id')
      ->join('kriterias as f', 'e.kriteria_id', '=', 'f.id')
      ->whereNull('a.deleted_at')
      ->select(
        'a.karyawan_id',
        'b.nama',
        'b.nip',
        'd.jabatan',
        'a.periode_id',
        'c.bulan',
        'c.tahun',
        DB::raw('SUM(e.nilai) AS total_nilai'),
        DB::raw('ROUND(AVG(e.nilai), 2) AS avg_nilai')
      )
      ->groupBy(
        'a.karyawan_id',
        'a.periode_id',
        'b.nama',
        'b.nip',
        'd.jabatan',
        'c.bulan',
        'c.tahun'
      )
      ->orderByDesc('c.tahun')
      ->orderByDesc('c.bulan')
      ->get();
  }
  public function index()
  {
    Fungsi::hakAkses('/laporan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $data = $this->getDataLaporan();
    $title = 'Data Laporan';

    // dd($data);
    return view('laporan::/laporan/index', [
      'title' => $title,
      'data' => $data,
    ]);
  }
  public function export()
  {
    $data = $this->getDataLaporan();
    //return Excel::download(new LaporanExport($data), 'laporan.xlsx');
  }
  public function print()
  {
    $title = "Laporan Penilaian";
    $data = $this->getDataLaporan();
    return view(
      'laporan::laporan/pdf',
      [
        'title' => $title,
        'data' => $data,
      ]
    );

  }
  public function pdf()
  {

    $title = "Laporan Penilaian Karyawan";
    $data = $data = $this->getDataLaporan();

    $html = view('laporan::laporan.pdf', [
      'title' => $title,
      'data' => $data,
    ])->render();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $fileName = str_replace(' ', '_', $title) . '.pdf';
    $mpdf->Output($fileName, 'D');
    $mpdf->Output();
  }
}
