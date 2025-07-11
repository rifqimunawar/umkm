<?php

namespace Modules\Laporan\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection, WithHeadings
{

  public function collection()
  {
    $data = DB::table('penilaians as a')
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

    // Transformasi data untuk ditampilkan di Excel
    return $data->map(function ($item, $key) {
      return [
        'no_urut' => $key + 1,
        'karyawan' => $item->nama,
        'nip' => $item->nip,
        'jabatan' => $item->jabatan,
        'nilai' => $item->avg_nilai,
        'periode' => $item->bulan . ' ' . $item->tahun,
      ];
    });
  }

  public function headings() : array
  {
    return [
      'No',
      'Karyawan',
      'NIP',
      'Jabatan',
      'Nilai',
      'Periode',
    ];
  }
}
