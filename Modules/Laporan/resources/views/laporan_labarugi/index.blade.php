@extends('laporan::layouts.master')
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

    {{-- <div
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('lap_labarugi.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a>
        <div style="display: flex; align-items: center; gap: 5px;">
          <label class="form-label mb-0" for="start_date">Periode</label>
          <input type="date" id="start_date" class="form-control" name="start_date" value="{{ date('Y-m-d') }}"
            style="width: 140px;">
          <input type="date" id="end_date" class="form-control" name="end_date" value="{{ date('Y-m-d') }}"
            style="width: 140px;">
        </div>
      </div>
      <div style="display: flex; gap: 10px;">
        <a href="javascript:void(0)" class="btn btn-warning btn-sm"
          onclick="printPage('{{ route('lap_labarugi.print') }}')">
          <i class="fa fa-print" aria-hidden="true"></i> Print
        </a>
    </a>
    <a href="{{ route('lap_labarugi.pdf') }}" class="btn btn-warning btn-sm">
      <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
    </a>
  </div>
  </div> --}}

    <form method="GET" action="{{ route('lap_labarugi.index') }}"
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('lap_labarugi.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
          class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a>
        <div style="display: flex; align-items: center; gap: 5px;">
          <label class="form-label mb-0" for="start_date">&emsp;Periode</label>
          <input type="date" id="start_date" class="form-control" name="start_date"
            value="{{ request('start_date', date('Y-m-d')) }}" style="width: 140px;">
          <input type="date" id="end_date" class="form-control" name="end_date"
            value="{{ request('end_date', date('Y-m-d')) }}" style="width: 140px;">
        </div>
        <button type="submit" class="btn btn-primary btn-sm" style="height: fit-content;">
          Search <i class="fa fa-search"></i></button>
      </div>
      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('lap_labarugi.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}" class="btn btn-danger btn-sm">
          <i class="fa fa-print" style="font-size: 12px"></i> Print Demo --}}
        <a href="javascript:void(0)" class="btn btn-warning btn-sm"
          onclick="printPage('{{ route('lap_labarugi.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
          <i class="fa fa-print" aria-hidden="true"></i> Print
        </a>
        <a href="{{ route('lap_labarugi.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
          class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a>
      </div>
    </form>

    <div class="panel-body">
      <table width="100%" class="table table-bordered table-striped align-middle text-nowrap">
        <thead>
          <tr>
            <th colspan="2" class="text-center">{{ $title ?? 'Laporan Laba Rugi' }}</th>
          </tr>
          <tr>
            <th>Komponen</th>
            <th class="text-end">Jumlah (Rp)</th>
          </tr>
        </thead>
        <tbody>
          @php
            $penjualan_kotor = $data_nominal_penjualan ?? 0;
            $retur_penjualan = $data_nominal_retur_penjualan ?? 0;
            $penjualan_bersih = $penjualan_kotor - $retur_penjualan;

            $hpp = $data_nominal_hpp ?? 0;
            $laba_kotor = $penjualan_bersih - $hpp;

            $beban_operasional = $data_nominal_operasional ?? 0;
            $laba_bersih = $laba_kotor - $beban_operasional;
          @endphp

          <tr>
            <td><strong>Penjualan Kotor</strong></td>
            <td class="text-end">{{ Fungsi::rupiah($penjualan_kotor) }}</td>
          </tr>
          <tr>
            <td>(-) Retur Penjualan</td>
            <td class="text-end">{{ Fungsi::rupiah($retur_penjualan) }}</td>
          </tr>
          <tr>
            <td><strong>Penjualan Bersih</strong></td>
            <td class="text-end">{{ Fungsi::rupiah($penjualan_bersih) }}</td>
          </tr>
          <tr>
            <td>(-) Harga Pokok Penjualan (HPP)</td>
            <td class="text-end">{{ Fungsi::rupiah($hpp) }}</td>
          </tr>
          <tr>
            <td><strong>Laba Kotor</strong></td>
            <td class="text-end">{{ Fungsi::rupiah($laba_kotor) }}</td>
          </tr>
          <tr>
            <td>(-) Beban Operasional</td>
            <td class="text-end">{{ Fungsi::rupiah($beban_operasional) }}</td>
          </tr>
          <tr class="table-success fw-bold">
            <td><strong>Laba Bersih</strong></td>
            <td class="text-end">{{ Fungsi::rupiah($laba_bersih) }} ✅</td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
@endsection
