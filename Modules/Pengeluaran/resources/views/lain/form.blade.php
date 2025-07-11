@extends('pengeluaran::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('pengeluaran_lain.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-2">
                <label for="nama_pengeluaran_lain">Pengeluaran</label>
                <input type="text" class="form-control" name="nama_pengeluaran_lain" id="nama_pengeluaran_lain"
                  placeholder="" required value="{{ old('nama_pengeluaran_lain', $data->nama_pengeluaran_lain ?? '') }}">
              </div>
              <div class="form-group mb-2">
                <label for="nominal_pengeluaran_lain">Nominal</label>
                <div class="input-group">
                  <input type="text" class="form-control format-rupiah" name="nominal_pengeluaran_lain"
                    id="nominal_pengeluaran_lain" placeholder="Rp...." required
                    value="{{ old('nominal_pengeluaran_lain', $data->nominal_pengeluaran_lain ?? '') }}">
                  <select class="form-control" name="jenis_pembayaran_id" id="jenis_pembayaran_id" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach ($data_jenis as $item)
                      <option value="{{ $item->id }}"
                        {{ old('jenis_pembayaran_id', $data->jenis_pembayaran_id ?? '') == $item->id ? 'selected' : '' }}>
                        {{ $item->jenis_pembayaran }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group mb-2">
                <label for="desc">Deskripsi</label>
                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control" placeholder="">{{ old('desc', $data->desc ?? '') }}</textarea>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('pengeluaran_lain.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
