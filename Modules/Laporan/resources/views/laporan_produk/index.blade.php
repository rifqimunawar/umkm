@extends('laporan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
  use Carbon\Carbon;
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
        <a href="{{ route('lap_produk.export') }}" class="btn btn-warning btn-sm">
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
          onclick="printPage('{{ route('lap_produk.print') }}')">
          <i class="fa fa-print" aria-hidden="true"></i> Print
        </a>
    </a>
    <a href="{{ route('lap_produk.pdf') }}" class="btn btn-warning btn-sm">
      <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
    </a>
  </div>
  </div> --}}

    <form method="GET" action="{{ route('lap_produk.index') }}"
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('lap_produk.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
          class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a>
        <div style="display: flex; align-items: center; gap: 5px;">
          <label class="form-label mb-0" for="start_date">&emsp;Per Hari
            {{ Fungsi::format_tgl(Carbon::today()) }}</label>
          {{-- <input type="date" id="start_date" class="form-control" name="start_date"
            value="{{ request('start_date', date('Y-m-d')) }}" style="width: 140px;">
          <input type="date" id="end_date" class="form-control" name="end_date"
            value="{{ request('end_date', date('Y-m-d')) }}" style="width: 140px;"> --}}
        </div>
        {{-- <button type="submit" class="btn btn-primary btn-sm" style="height: fit-content;">
          Search <i class="fa fa-search"></i></button> --}}
      </div>
      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('lap_produk.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}" class="btn btn-danger btn-sm">
          <i class="fa fa-print" style="font-size: 12px"></i> Print Demo --}}
        <a href="javascript:void(0)" class="btn btn-warning btn-sm"
          onclick="printPage('{{ route('lap_produk.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
          <i class="fa fa-print" aria-hidden="true"></i> Print
        </a>
        <a href="{{ route('lap_produk.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
          class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a>
      </div>
    </form>

    <div class="panel-body">
      <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th width="1%">#</th>
            <th class="text-nowrap">Waktu</th>
            <th class="text-nowrap">Nama Produk</th>
            <th class="text-nowrap">Satuan</th>
            <th class="text-nowrap">Kategori</th>
            <th class="text-nowrap">Keterangan</th>
            <th class="text-nowrap">Jumlah Sisa</th>
            <th class="text-nowrap">Harga Satuan</th>
          </tr>
        </thead>
        <tbody>
          @php
            $total_qty = 0;
            $total_harga = 0;
          @endphp

          @foreach ($data as $item)
            @php
              $qty = $item->jumlah_produk ?? 0;
              $harga = $item->harga_beli_satuan ?? 0;

              $total_qty += $qty;
              $total_harga += $harga;
            @endphp
            <tr class="odd gradeX">
              <td class="fw-bold">{{ $loop->iteration }}</td>
              <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '') }}</td>
              <td>{{ $item->nama_produk ?? '-' }}</td>
              <td>{{ $item->nama_satuan ?? '-' }}</td>
              <td>{{ $item->nama_kategori ?? '-' }}</td>
              <td>
                {{ $item->is_produksi == 1 ? 'Hasil Produksi' : 'Produk Jadi' }}
              </td>
              <td>{{ $qty }}</td>
              <td>{{ Fungsi::rupiah($harga) }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6" class="text-end">Total</th>
            <th>{{ $total_qty }}</th>
            <th>{{ Fungsi::rupiah($total_harga) }}</th>
          </tr>
        </tfoot>
      </table>


    </div>
  </div>
@endsection
