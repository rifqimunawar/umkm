@extends('managementstok::layouts.master')
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
            <form action="{{ route('kategori.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-2">
                <label for="nama_kategori">Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                  placeholder="Nama Kategori" required value="{{ old('nama_kategori', $data->nama_kategori ?? '') }}">
              </div>

              <div class="form-group mb-2">
                <label for="icon">Icon</label>
                <a target="_blank" href="https://fontawesome.com/search?ic=free">Referensi icon</a>
                <input type="text" class="form-control" name="icon" id="icon"
                  placeholder='ex : <i class="fa-regular fa-cash-register"></i>' required
                  value="{{ old('icon', $data->icon ?? '') }}">
              </div>

              <div class="form-group mb-2">
                <label for="desc">Descriptions</label>
                <textarea name="desc" class="form-control" placeholder="Deskripsi" id="desc" cols="30" rows="10">{{ old('desc', $data->desc ?? '') }}</textarea>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
