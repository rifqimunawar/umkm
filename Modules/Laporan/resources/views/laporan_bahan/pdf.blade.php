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
        <th class="text-nowrap">Nama Bahan</th>
        <th class="text-nowrap">Supplier</th>
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
          $total_qty += $item->jumlah_bahan ?? 0;
          $total_harga += $item->harga_bahan ?? 0;
        @endphp
        <tr class="odd gradeX">
          <td class="fw-bold">{{ $loop->iteration }}</td>
          <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '') }}</td>
          <td>{{ $item->nama_bahan ?? '-' }}</td>
          <td>{{ $item->nama_supplier ?? '-' }}</td>
          <td>{{ $item->jumlah_bahan ?? 0 }}</td>
          <td>{{ Fungsi::rupiah($item->harga_bahan ?? 0) }}</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4" class="text-end">Total</th>
        <th>{{ $total_qty }}</th>
        <th>{{ Fungsi::rupiah($total_harga) }}</th>
      </tr>
    </tfoot>
  </table>
</body>

</html>
