<!DOCTYPE html>
<html lang="en">
@php
  use App\Helpers\Fungsi;
  use app\Helpers\GetSettings;
@endphp

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 5%;
      padding: 0;
    }

    h3 {
      text-align: center;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    table,
    th,
    td {
      border: 1px solid #000;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <div style="text-align:center;">
    <h3>{{ $title }}</h3>
    <h5>{{ $titleSm }}</h5>
  </div>

  <!-- ISI KONTEN -->
  <table>
    <thead>
      <tr>
        <th width="1%">#</th>
        <th class="text-nowrap">Waktu</th>
        <th class="text-nowrap">Nama Produk</th>
        <th class="text-nowrap">Satuan</th>
        <th class="text-nowrap">Kategori</th>
        <th class="text-nowrap">Keterangan</th>
        <th class="text-nowrap">Jumlah Sisa</th>
        <th class="text-nowrap">Harga Satuan</th>
      </tr>
    </thead>
    <tbody>
      @php
        $total_qty = 0;
        $total_harga = 0;
      @endphp

      @foreach ($data as $item)
        @php
          $qty = $item->jumlah_produk ?? 0;
          $harga = $item->harga_beli_satuan ?? 0;

          $total_qty += $qty;
          $total_harga += $harga;
        @endphp
        <tr class="odd gradeX">
          <td class="fw-bold">{{ $loop->iteration }}</td>
          <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '') }}</td>
          <td>{{ $item->nama_produk ?? '-' }}</td>
          <td>{{ $item->nama_satuan ?? '-' }}</td>
          <td>{{ $item->nama_kategori ?? '-' }}</td>
          <td>
            {{ $item->is_produksi == 1 ? 'Hasil Produksi' : 'Produk Jadi' }}
          </td>
          <td>{{ $qty }}</td>
          <td>{{ Fungsi::rupiah($harga) }}</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="6" class="text-end">Total</th>
        <th>{{ $total_qty }}</th>
        <th>{{ Fungsi::rupiah($total_harga) }}</th>
      </tr>
    </tfoot>
  </table>
</body>

</html>
