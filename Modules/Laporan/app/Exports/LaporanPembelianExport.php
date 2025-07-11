<?php

namespace Modules\Laporan\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanPembelianExport implements FromCollection, WithHeadings
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
        'Nama Pembelian' => $item->nama_pembelian,
        'Nominal' => $item->harga_satuan,
        'Kuantitas' => $item->qty,
        'Total Nominal' => $item->total_harga_beli,
        'PIC' => $item->created_by,
      ];
    });
  }

  public function headings() : array
  {
    return [
      'Tanggal',
      'Nama Pembelian',
      'Jenis Transaksi',
      'Nominal',
      'Kuantitas',
      'Total Nominal',
      'PIC',
    ];
  }
}
