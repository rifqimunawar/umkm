@extends('penilaian::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
    <!-- BEGIN panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">{{ $title }}</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
            class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
            class="fa fa-redo"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
            class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
            class="fa fa-times"></i></a>
      </div>
    </div>
    <div
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">

      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square" aria-hidden="true"
          style="font-size: 12px"></i>
      </button>
      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('penilaian.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a> --}}

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        {{-- <a href="{{ route('penilaian.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a> --}}

      </div>
    </div>
    <div class="panel-body">
      <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th width="1%"></th>
            <th class="text-nowrap">Karyawan</th>
            <th class="text-nowrap">Periode</th>
            <th class="text-nowrap">Penilai</th>
            <th class="text-nowrap"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr class="odd gradeX">
              <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
              <td>{{ $item->nama ?? '-' }}</td>
              <td>{{ $item->bulan ?? '-' }} {{ $item->tahun ?? '-' }}</td>
              <td>{{ $item->updated_by ?? '-' }}</td>
              <td class="d-flex justify-content-center align-items-center text-center">
                <a href="{{ route('penilaian.edit', $item->id) }}">
                  <i class="fa fa-pencil-square" style="font-size: 14px; margin-right:5px"></i>
                </a>
                <a href="{{ route('penilaian.destroy', $item->id) }}" data-confirm-delete="true">
                  <i class="fa fa-trash mx-2" style="font-size: 14px"></i>
                </a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Karyawan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="form-group mb-1">
            <label for="karyawan_id">Karyawan</label>
            <select class="form-select" required name="karyawan_id" id="karyawan_id">
              <option value="">- pilih -</option>
              @foreach ($data_karyawan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="modal-body">
          <div class="form-group mb-2">
            <label for="periode_id">Periode</label>
            <select class="form-select" required name="periode_id" id="periode_id">
              <option value="">- pilih -</option>
              @foreach ($data_periode as $item)
                <option value="{{ $item->id }}">{{ $item->bulan }} - {{ $item->tahun }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="redirectToPenilaian()">Lanjut</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function redirectToPenilaian() {
      const selectedId = document.getElementById('karyawan_id').value;
      const selectedPeriodeId = document.getElementById('periode_id').value;
      if (!selectedId) {
        alert('Pilih karyawan dan priode terlebih dahulu.');
        return;
      }

      // Gunakan URL manual atau base dari route
      const baseUrl = "{{ url('/penilaian/create') }}";
      window.location.href = `${baseUrl}/${selectedId}/${selectedPeriodeId}`;
    }
  </script>
@endsection
