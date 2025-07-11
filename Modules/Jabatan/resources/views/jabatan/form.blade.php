@extends('jabatan::layouts.master')
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
            <form action="{{ route('jabatan.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf
              <div class="form-group mb-2">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" required name="jabatan" id="jabatan" placeholder="Jabatan"
                  value="{{ old('jabatan', $data->jabatan ?? '') }}" />
              </div>

              <div class="form-group mb-2">
                <label for="tupoksi">Tugas Pokok dan Fungsi</label>
                <textarea class="form-control" name="tupoksi" id="tupoksi" rows="5" placeholder="Tugas Pokok dan Fungsi">{{ old('tupoksi', $data->tupoksi ?? '') }}</textarea>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('jabatan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
