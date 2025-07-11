@extends('karyawan::layouts.master')
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
            <form action="{{ route('karyawan.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-2">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Kriteria Penilaian"
                  required value="{{ old('nama', $data->nama ?? '') }}">
              </div>

              <div class="form-group mb-2">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Nomor Induk Pegawai"
                  required value="{{ old('nip', $data->nip ?? '') }}">
              </div>

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

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('karyawan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
