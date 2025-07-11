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
            <form action="{{ route('penilaian.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-4">
                <label for="nama">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama" readonly placeholder="Kriteria Penilaian"
                  required value="{{ old('nama', $data_karyawan->nama ?? '') }}">
              </div>

              @foreach ($data_kriteria as $index => $item)
                <div class="form-group mb-3">
                  <label class="form-label">{{ $item->kriteria ?? '' }}</label><br>
                  <small>{{ $item->desc ?? '' }}</small>
                </div>

                <div class="form-group mb-4">
                  <label>
                    Nilai: <span id="nilai-{{ $index }}">
                      {{ old('nilai.' . $item->kriteria_id, $nilai_lama[$item->kriteria_id] ?? 1) }}
                    </span>
                  </label>

                  <div class="range-wrapper" style="margin-bottom: 10px;">
                    <input type="range" class="form-range" min="1" max="10"
                      value="{{ old('nilai.' . $item->kriteria_id, $nilai_lama[$item->kriteria_id] ?? 1) }}"
                      name="nilai[{{ $item->kriteria_id ?? 0 }}]" id="range-{{ $index }}"
                      oninput="updateRangeFill(this, 'nilai-{{ $index }}')"
                      style="width: 100%; height: 8px; border-radius: 5px; background: linear-gradient(to right, #28a745 10%, #ccc 10%); appearance: none; outline: none;">

                    <div style="display: flex; justify-content: space-between; font-size: 0.8rem;">
                      @for ($i = 1; $i <= 10; $i++)
                        <span>{{ $i }}</span>
                      @endfor
                    </div>
                  </div>
                </div>
              @endforeach



              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <input type="hidden" name="karyawan_id" value="{{ $data_karyawan->id ?? '' }}">
                <input type="hidden" name="periode_id" value="{{ $periode_id ?? '' }}">
                <a href="{{ route('penilaian.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function updateRangeFill(range, labelId) {
      const min = range.min;
      const max = range.max;
      const val = range.value;
      const percentage = ((val - min) / (max - min)) * 100;

      range.style.background =
        `linear-gradient(to right, #28a745 0%, #28a745 ${percentage}%, #ccc ${percentage}%, #ccc 100%)`;

      document.getElementById(labelId).innerText = val;
    }

    // Set initial background fill on page load
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll('input[type="range"]').forEach(function(el) {
        const index = el.id.split('-')[1];
        updateRangeFill(el, 'nilai-' + index);
      });
    });
  </script>
@endsection
