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
            <form action="{{ route('hutang_pembelian.store') }}" method="post" class="row" enctype="multipart/form-data">
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
                      <td>Harga beli</td>
                      <td>:</td>
                      <td>{{ Fungsi::rupiah(old('harga_satuan', $data->total_harga_beli ?? 0)) }}</td>
                    </tr>
                    <tr>
                      <td>Dibayar</td>
                      <td>:</td>
                      <td>{{ Fungsi::rupiah(old('harga_satuan', $data->total_dibayar ?? 0)) }}</td>
                    </tr>
                    <tr>
                      <td>Sisa Hutang</td>
                      <td>:</td>
                      <td>{{ Fungsi::rupiah(old('harga_satuan', $data->total_hutang ?? 0)) }}</td>
                    </tr>
                    <tr>
                      <td>Jatuh Tempo</td>
                      <td>:</td>
                      <td>{{ Fungsi::format_tgl(old('harga_satuan', $data->jatuh_tempo ?? '-')) }}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">

                  <textarea autofocus name="nominal_dibayar" placeholder="Rp . . . " id="nominal_dibayar" required cols="30"
                    rows="5" class="form-control format-rupiah fs-4" data-hutang="{{ $data->total_hutang ?? 0 }}">{{ old('nominal_dibayar', $data->nominal_dibayar ?? '') }}</textarea>

                  <small id="error-message" class="text-danger d-none">Nominal tidak boleh melebihi sisa hutang</small>

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                </div>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <input type="hidden" name="id_barang" value="{{ $data->id_barang ?? '' }}">
                <input type="hidden" name="nama_barang" value="{{ $data->nama_barang ?? '' }}">
                <input type="hidden" name="total_harga_beli" value="{{ $data->total_harga_beli ?? '' }}">
                <input type="hidden" name="total_dibayar" value="{{ $data->total_dibayar ?? '' }}">
                <input type="hidden" name="total_hutang" value="{{ $data->total_hutang ?? '' }}">
                <input type="hidden" name="supplier_id" value="{{ $data->supplier_id ?? '' }}">
                <input type="hidden" name="jatuh_tempo" value="{{ $data->jatuh_tempo ?? '' }}">
                <input type="hidden" name="nama_supplier" value="{{ $data->nama_supplier ?? '' }}">
                <input type="hidden" name="sumber" value="{{ $data->sumber ?? '' }}">
                <input type="hidden" name="sumber_text" value="{{ $data->sumber_text ?? '' }}">
                <a href="{{ route('hutang_pembelian.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" id="btn-save" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const nominalInput = document.getElementById('nominal_dibayar');
      const errorMessage = document.getElementById('error-message');
      const btnSave = document.getElementById('btn-save');

      function getNumericValue(input) {
        return parseInt(input.replace(/[^0-9]/g, '')) || 0;
      }

      nominalInput.addEventListener('input', function() {
        const nominalDibayar = getNumericValue(this.value);
        const totalHutang = parseInt(this.dataset.hutang);

        if (nominalDibayar > totalHutang) {
          this.classList.add('is-invalid');
          errorMessage.classList.remove('d-none');
          btnSave.disabled = true;
        } else {
          this.classList.remove('is-invalid');
          errorMessage.classList.add('d-none');
          btnSave.disabled = false;
        }
      });
    });
  </script>
@endsection
