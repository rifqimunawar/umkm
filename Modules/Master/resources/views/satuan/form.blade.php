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
            <form action="{{ route('master_satuan.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-2">
                <label for="nama_satuan">Satuan</label>
                <input type="text" class="form-control" name="nama_satuan" id="nama_satuan" placeholder="Nama Satuan"
                  required value="{{ old('nama_satuan', $data->nama_satuan ?? '') }}">
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('master_satuan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
