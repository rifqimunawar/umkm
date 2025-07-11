@extends('pembelian::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('pembelian_retur.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-md-6">
                  <table style="font-size: 18px">
                    <tr>
                      <td>Nama Barang &emsp;&emsp;&emsp;</td>
                      <td>:&emsp;&emsp;</td>
                      <td>{{ old('nama_barang', $data->nama_barang ?? '') }}</td>
                    </tr>
                    <tr>
                      <td>Supplier</td>
                      <td>:</td>
                      <td>{{ old('nama_supplier', $data->nama_supplier ?? '-') }}</td>
                    </tr>
                    <tr>
                      <td>Harga Satuan</td>
                      <td>:</td>
                      <td>{{ Fungsi::rupiah(old('harga_satuan', $data->harga_satuan ?? 0)) }}</td>
                    </tr>
                    <tr>
                      <td>Kuantitas</td>
                      <td>:</td>
                      <td>{{ old('quantity', $data->quantity ?? 0) }}</td>
                    </tr>
                    <tr>
                      <td>Satuan</td>
                      <td>:</td>
                      <td>{{ $data_satuan->nama_satuan ?? '-' }}</td>
                    </tr>
                    <tr>
                      <td>Harga Total</td>
                      <td>:</td>
                      <td>{{ Fungsi::rupiah(old('total_harga', $data->total_harga ?? 0)) }}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">

                  <div class="form-group mb-2">
                    <label for="qty_retur">Jumlah di retur</label>
                    <input type="number" class="form-control" name="qty_retur" id="qty_retur"
                      value="{{ old('qty_retur', $data->qty_retur ?? 1) }}">
                  </div>
                  <div class="form-group mb-2">
                    <label for="alasan">Alasan Retur</label>
                    <textarea name="alasan" placeholder="Penyebab Retur" id="alasan" required cols="30" rows="5"
                      class="form-control">{{ old('alasan', $data->alasan ?? '') }}</textarea>
                  </div>
                </div>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <input type="hidden" name="nama_barang" value="{{ $data->nama_barang ?? '' }}">
                <input type="hidden" name="harga_satuan" value="{{ $data->harga_satuan ?? '' }}">
                <input type="hidden" name="quantity" value="{{ $data->quantity ?? '' }}" id="quantity">
                <input type="hidden" name="total_harga" value="{{ $data->total_harga ?? '' }}">
                <input type="hidden" name="waktu_pembelian" value="{{ $data->time ?? '' }}">
                <input type="hidden" name="supplier_id" value="{{ $data->supplier_id ?? '' }}">
                <input type="hidden" name="satuan_id" value="{{ $data->satuan_id ?? '' }}">
                <input type="hidden" name="nama_supplier" value="{{ $data->nama_supplier ?? '' }}">
                <input type="hidden" name="id_barang" value="{{ $data->id_barang ?? '' }}">
                <input type="hidden" name="sumber" value="{{ $data->sumber ?? '' }}">
                <input type="hidden" name="sumber_text" value="{{ $data->sumber_text ?? '' }}">
                <a href="{{ route('pembelian_retur.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      function limitQtyRetur() {
        const qtyReturInput = document.getElementById('qty_retur');
        const quantityInput = document.getElementById('quantity');

        const qtyRetur = parseInt(qtyReturInput.value) || 0;
        const quantity = parseInt(quantityInput.value) || 0;

        if (qtyRetur > quantity) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Jumlah melebihi stok yang tersedia!',
            timer: 6500,
            showConfirmButton: false
          });
          qtyReturInput.value = quantity;
        } else if (qtyRetur < 1) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Jumlah tidak boleh kurang dari 1!',
            timer: 6500,
            showConfirmButton: false
          });
          qtyReturInput.value = 1;
        }

      }

      const qtyReturInput = document.getElementById('qty_retur');
      if (qtyReturInput) {
        qtyReturInput.addEventListener('input', limitQtyRetur);
      }

    });
  </script>
@endsection
