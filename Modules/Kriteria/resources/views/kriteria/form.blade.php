@extends('kriteria::layouts.master')
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
            <form action="{{ route('kriteria.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf
              <div class="form-group mb-2">
                <label for="jabatan_id">Jabatan</label>
                <select class="form-select" required name="jabatan_id" id="jabatan_id">
                  <option value="">- pilih -</option>
                  @foreach ($data_jabatan as $item)
                    <option value="{{ $item->id }}"
                      {{ old('jabatan_id', $data->jabatan_id ?? '') == $item->id ? 'selected' : '' }}>
                      {{ $item->jabatan }}
                    </option>
                  @endforeach
                </select>
              </div>


              <div class="form-group mb-2">
                <label for="kriteria">Kriteria</label>
                <input type="text" class="form-control" name="kriteria" id="kriteria" placeholder="Kriteria Penilaian"
                  required value="{{ old('kriteria', $data->kriteria ?? '') }}">
              </div>

              <div class="form-group mb-2">
                <label for="desc">Descriptions</label>
                <textarea name="desc" class="form-control" placeholder="Deskripsi" id="desc" cols="30" rows="10">{{ old('desc', $data->desc ?? '') }}</textarea>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('kriteria.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
