<?php

namespace Modules\Laporan\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanPenjualanExport implements FromCollection, WithHeadings
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
        'Produk' => $item->nama_produk,
        'Harga Satuan' => $item->harga_satuan_produk,
        'Qty' => $item->qty,
        'Total Harga' => $item->total_harga_produk,
        'Kasbon' => $item->nominal_kasbon,
        'Dibuat Oleh' => $item->created_by,
        'Kategori' => $item->nama_kategori,
        'Konsumen' => $item->nama_konsumen,
      ];
    });
  }

  public function headings() : array
  {
    return [
      'Tanggal',
      'Produk',
      'Harga Satuan',
      'Qty',
      'Total Harga',
      'Kasbon',
      'Dibuat Oleh',
      'Kategori',
      'Konsumen',
    ];
  }
}
