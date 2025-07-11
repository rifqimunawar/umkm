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
  <div style="display: flex; justify-content: space-between; align-items: flex-start;">
    <div style="flex: 1;">
      <div style="display: flex; align-items: center;">
        <img src="{{ GetSettings::getLogo() }}" alt="Logo" style="height: 60px; margin-right: 10px;">
        <div>
          <h3 style="margin: 0;">{{ GetSettings::getNamaWeb() }}</h3>
        </div>
      </div>
    </div>
    <div style="text-align: right;">
      <p style="margin: 0;"><strong>No. Transaksi:</strong> {{ $data->no_transaksi ?? '-' }}</p>
    </div>
  </div>
  <div style="margin-top: 10px; font-size: 14px;">
    <p style="margin: 2px 0;">{{ GetSettings::getAlamat() }}</p>
    <p style="margin: 2px 0;">Telepon: {{ GetSettings::getTelp() }} | Email: {{ GetSettings::getEmail() }} </p>
  </div>


  <!-- ISI KONTEN -->
  <div>
    <table>
      <thead>
        <tr>
          <th width="1%"></th>
          <th>Waktu</th>
          <th>Nama Produk</th>
          <th>Harga Satuan</th>
          <th>Kuantitas</th>
          <th>Harga Total</th>
        </tr>
      </thead>
      <tbody>
        @php
          $total_qty = 0;
          $total_harga = 0;
        @endphp
        @foreach ($data->detailTransaksi as $item)
          @php
            $total_qty += $item->qty ?? 0;
            $total_harga += $item->total_harga_produk ?? 0;
          @endphp
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ Fungsi::format_tgl($item->created_at) }}</td>
            <td>{{ $item->nama_produk ?? '-' }}</td>
            <td>{{ Fungsi::rupiah($item->harga_satuan_produk ?? 0) }}</td>
            <td>{{ $item->qty ?? 0 }}</td>
            <td>{{ Fungsi::rupiah($item->total_harga_produk ?? 0) }}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4" style="text-align: center">Total</th>
          <th>{{ $total_qty }}</th>
          <th>{{ Fungsi::rupiah($total_harga) }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <div>
    @if ($data->is_kasbon == 1)
      <div style="margin-top: 1rem;">
        <h5>Detail Kasbon</h5>
        <table style="width: 100%; border: none; font-size: 14px;">
          <tr>
            <td style="width: 150px; border: none;">Nama Konsumen</td>
            <td style="border: none;">: {{ $data->konsumen->nama_konsumen ?? '-' }}</td>
          </tr>
          <tr>
            <td style="border: none;">Kontak Konsumen</td>
            <td style="border: none;">: {{ $data->konsumen->kontak_konsumen ?? '-' }}</td>
          </tr>
          <tr>
            <td style="border: none;">Total Belanja</td>
            <td style="border: none;">: {{ Fungsi::rupiah($data->nominal_belanja ?? 0) }}</td>
          </tr>
          <tr>
            <td style="border: none;">Total Dibayar</td>
            <td style="border: none;">: {{ Fungsi::rupiah($data->nominal_dibayar ?? 0) }}</td>
          </tr>
          <tr>
            <td style="border: none;">Nominal Kasbon</td>
            <td style="border: none;">: {{ Fungsi::rupiah($data->nominal_kasbon ?? 0) }}</td>
          </tr>
        </table>
      </div>
    @endif

  </div>
  <div style="margin-top: 5%;">
    <table style="border-collapse: collapse; border: none;" cellpadding="5">
      <tbody>
        <tr>
          <td style="width: 70%; border: none;">&emsp;</td>
          <td style="text-align: center; border: none;">Bandung, {{ $tanggal }}</td>
        </tr>
        <tr>
          <td style="border: none;">&emsp;</td>
          <td style="height: 80px; border: none;">&emsp;</td>
        </tr>
        <tr>
          <td style="border: none;">&emsp;</td>
          <td style="text-align: center; border: none;">
            <span
              style="display: inline-block; width: 150px; border-top: 1px solid #000;">{{ Auth::user()->username }}</span><br>
            Kasir
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</body>

</html>
