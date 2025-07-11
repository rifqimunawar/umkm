<?php

namespace Modules\Laporan\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanPengeluaranExport implements FromCollection, WithHeadings
{
  protected $data;

  public function __construct(Collection $data)
  {
    $this->data = $data;
  }

  public function collection()
  {
    // Transformasi data untuk ditampilkan di Excel
    return $this->data->map(function ($item) {
      return [
        'Tanggal' => $item->created_at,
        'Pengeluaran' => $item->nama_pengeluaran,
        'Jenis Transaksi' => $item->jenis_pembayaran,
        'Nominal' => $item->nominal,
        'PIC' => $item->created_by,
      ];
    });
  }

  public function headings() : array
  {
    return [
      'Tanggal',
      'Pengeluaran',
      'Jenis Transaksi',
      'Nominal',
      'PIC',
    ];
  }
}
