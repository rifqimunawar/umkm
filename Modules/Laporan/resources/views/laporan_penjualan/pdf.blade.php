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
        <th width="1%"></th>
        <th>Waktu</th>
        <th>Nama Produk</th>
        <th>Kategori Produk</th>
        <th>Admin Penerima</th>
        <th>Konsumen</th>
        <th>Harga Satuan</th>
        <th>Quantity</th>
        <th>Total Harga</th>

      </tr>
    </thead>
    <tbody>
      @php
        $total_qty = 0;
        $total_harga = 0;
      @endphp

      @foreach ($data as $item)
        @php
          $total_qty += $item->qty ?? 0;
          $total_harga += $item->total_harga_produk ?? 0;
        @endphp
        <tr>
          <td width="1%">{{ $loop->iteration }}</td>
          <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '-') }}</td>
          <td>{{ $item->nama_produk ?? '-' }}</td>
          <td>{{ $item->nama_kategori ?? '-' }}</td>
          <td>{{ $item->created_by ?? '-' }}</td>
          <td>{{ $item->nama_konsumen ?? '-' }}</td>
          <td>{{ Fungsi::rupiah($item->harga_satuan_produk ?? 0) }}</td>
          <td>{{ $item->qty ?? 0 }}</td>
          <td>{{ Fungsi::rupiah($item->total_harga_produk ?? 0) }}</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="7" class="text-end">Total</th>
        <th>{{ $total_qty }}</th>
        <th>{{ Fungsi::rupiah($total_harga) }}</th>
      </tr>
    </tfoot>
  </table>
</body>

</html>
