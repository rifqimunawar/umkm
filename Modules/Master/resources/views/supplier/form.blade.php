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
            <form action="{{ route('master_supplier.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-3">
                <label for="nama_supplier">Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                  placeholder="Nama Supplier" required value="{{ old('nama_supplier', $data->nama_supplier ?? '') }}">
              </div>

              <div class="form-group mb-3">
                <label for="telp_supplier">Telp</label>
                <input type="number" class="form-control" name="telp_supplier" id="telp_supplier" placeholder="+62...."
                  required value="{{ old('telp_supplier', $data->telp_supplier ?? '') }}">
              </div>

              <div class="form-group mb-3">
                <label for="alamat_supplier">Alamat</label>
                <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" required rows="10">{{ old('alamat_supplier', $data->alamat_supplier ?? '') }}</textarea>
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('master_supplier.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
