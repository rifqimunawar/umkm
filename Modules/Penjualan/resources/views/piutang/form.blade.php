@extends('penjualan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('penjualan_piutang.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                  <div class="form-group mb-2">
                    <label for="nama_konsumen">Nama Konsumen</label>
                    <input type="text" class="form-control" readonly name="nama_konsumen" id="nama_konsumen"
                      value="{{ old('nama_konsumen', $data->konsumen->nama_konsumen ?? '') }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_belanja">Nominal Belanja</label>
                    <input type="text" class="form-control format-rupiah" readonly name="nominal_belanja"
                      id="nominal_belanja" value="{{ old('nominal_belanja', $data->nominal_belanja ?? 0) }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_dibayar">Nominal Dibayar</label>
                    <input type="text" class="form-control format-rupiah" readonly name="nominal_dibayar"
                      id="nominal_dibayar" value="{{ old('nominal_dibayar', $data->nominal_dibayar ?? 0) }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_kasbon">Nominal Piutang</label>
                    <input type="text" class="form-control format-rupiah" readonly name="nominal_kasbon"
                      id="nominal_kasbon" value="{{ old('nominal_kasbon', $data->nominal_kasbon ?? 0) }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_dibayar_sekarang">Nominal Dibayar Sekarang</label>
                    <input type="text" autofocus class="form-control format-rupiah" name="nominal_dibayar_sekarang"
                      id="nominal_dibayar_sekarang" required>
                    <small id="error-msg" class="text-danger d-none">Nominal tidak boleh melebihi piutang</small>
                  </div>

                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                  <label for="" class="label-control mb-3 fs-3">Riwayat Belanja:
                    {{ Fungsi::format_tgl($data->create_at) }}</label>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle text-nowrap">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th>Produk</th>
                          <th>Harga Satuan</th>
                          <th>Qty</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data->detailTransaksi as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->harga_satuan_produk }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->total_harga_produk }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <!-- Tombol -->
              <div class="d-flex justify-content-center gap-2 mt-4">
                <input type="hidden" name="transaksi_id" value="{{ $data->id ?? '' }}">
                <input type="hidden" name="konsumen_id" value="{{ $data->konsumen_id ?? '' }}">
                <a href="{{ route('penjualan_piutang.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const inputPiutang = document.getElementById('nominal_kasbon');
      const inputDibayar = document.getElementById('nominal_dibayar_sekarang');
      const errorMsg = document.getElementById('error-msg');

      function parseRupiah(rupiah) {
        return parseInt(rupiah.replace(/[^\d]/g, '')) || 0;
      }

      inputDibayar.addEventListener('input', function() {
        const piutang = parseRupiah(inputPiutang.value);
        const dibayar = parseRupiah(inputDibayar.value);

        if (dibayar > piutang) {
          errorMsg.classList.remove('d-none');
          inputDibayar.classList.add('is-invalid');
        } else {
          errorMsg.classList.add('d-none');
          inputDibayar.classList.remove('is-invalid');
        }
      });
    });
  </script>
@endsection
