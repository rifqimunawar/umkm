@extends('periode::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form {{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('periode.store') }}" method="post" class="row">
              @csrf

              <div class="form-group mb-2">
                <label for="bulan">Bulan</label>
                <select name="bulan" id="bulan" class="form-select" required>
                  <option value="">- pilih -</option>
                  @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                    <option value="{{ $bulan }}" {{ old('bulan') == $bulan ? 'selected' : '' }}>
                      {{ $bulan }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group mb-2">
                <label for="tahun">Tahun</label>
                <input type="number" class="form-control" required name="tahun" id="tahun" placeholder="Tahun"
                  value="{{ old('tahun') }}" />
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <a href="{{ route('periode.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
              </div>
            </form>

          </div>


        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }

  function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    let formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
    }).format(value);
    input.value = formatted.replace('Rp', 'Rp');
  }
</script>
