@extends('master::layouts.master')
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
            <form action="{{ route('master_jenis.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-2">
                <label for="jenis_pembayaran">Jenis Pembayaran</label>
                <input type="text" class="form-control" name="jenis_pembayaran" id="jenis_pembayaran"
                  placeholder="Nama Jenis Pembayaran" required
                  value="{{ old('jenis_pembayaran', $data->jenis_pembayaran ?? '') }}">
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('master_jenis.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
