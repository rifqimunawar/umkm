<?php

namespace Modules\Laporan\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanStokBahanExport implements FromCollection, WithHeadings
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
        'Nama Bahan' => $item->nama_bahan,
        'Jumlah Sisa' => $item->jumlah_bahan,
        'Harga Satuan' => $item->harga_bahan,
        'Supplier' => $item->nama_supplier,
      ];
    });
  }

  public function headings() : array
  {
    return [
      'Tanggal',
      'Nama Bahan',
      'Jumlah Sisa',
      'Harga Satuan',
      'Supplier',
    ];
  }
}
