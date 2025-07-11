<?php

namespace Modules\Laporan\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanStokProdukExport implements FromCollection, WithHeadings
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
        'Nama Produk' => $item->nama_produk,
        'Kategori' => $item->nama_kategori,
        'Hasil Produksi' => $item->is_produksi_text,
        'Satuan Produk' => $item->nama_satuan,
        'Jumlah Sisa' => $item->jumlah_bahan,
        'Modal Satuan' => $item->harga_bahan,
      ];
    });
  }

  public function headings() : array
  {
    return [
      'Tanggal',
      'Nama Produk',
      'Hasil Produksi',
      'Satuan Produk',
      'Jumlah Sisa',
      'Modal Satuan',
    ];
  }
}
