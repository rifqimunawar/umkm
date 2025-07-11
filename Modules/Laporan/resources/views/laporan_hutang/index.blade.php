@extends('laporan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <!-- BEGIN panel -->
  <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">
    <!-- BEGIN panel-heading -->
    <div class="panel-heading p-0">
      <!-- BEGIN nav-tabs -->
      <div class="tab-overflow">
        <ul class="nav nav-tabs nav-tabs-inverse">
          <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab" class="nav-link text-primary"><i
                class="fa fa-arrow-left"></i></a></li>
          <li class="nav-item"><a href="#nav-tab-1" data-bs-toggle="tab" class="nav-link active">Hutang</a></li>
          <li class="nav-item"><a href="#nav-tab-2" data-bs-toggle="tab" class="nav-link">Piutang</a></li>
          <li class="nav-item"><a href="#nav-tab-3" data-bs-toggle="tab" class="nav-link">Riwayat Hutang</a>
          </li>
          <li class="nav-item"><a href="#nav-tab-4" data-bs-toggle="tab" class="nav-link">Riwayat Piutang</a></li>
          <li class="nav-item next-button"><a href="javascript:;" data-click="next-tab" class="nav-link text-primary"><i
                class="fa fa-arrow-right"></i></a></li>
        </ul>
      </div>
      <!-- END nav-tabs -->
      <div class="panel-heading-btn me-2 ms-2 d-flex">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-secondary" data-toggle="panel-expand"><i
            class="fa fa-expand"></i></a>
      </div>
    </div>
    <!-- END panel-heading -->
    <!-- BEGIN tab-content -->
    <div class="panel-body tab-content">
      <div class="tab-pane fade active show" id="nav-tab-1">
        <h3 class="mt-10px">Data laporan hutang</h3>
        <form method="GET" action="{{ route('lap_hutang.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('lap_hutang.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
            {{-- <a href="{{ route('lap_hutang.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}" class="btn btn-danger btn-sm">
            <i class="fa fa-print" style="font-size: 12px"></i> Print Demo --}}
            <a href="javascript:void(0)" class="btn btn-warning btn-sm"
              onclick="printPage('{{ route('lap_hutang.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('lap_hutang.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
              class="btn btn-warning btn-sm">
              <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
            </a>
          </div>
        </form>
        <div class="panel-body">
          <table id="data-table-default" width="100%"
            class="table table-striped table-bordered align-middle text-nowrap">
            <thead>
              <tr>
                <th width="1%"></th>
                <th class="text-nowrap">Waktu</th>
                <th class="text-nowrap">Nama Barang</th>
                <th class="text-nowrap">Satuan</th>
                <th class="text-nowrap">Supplier</th>
                <th class="text-nowrap">Harga Satuan</th>
                <th class="text-nowrap">Qty</th>
                <th class="text-nowrap">Total Harga</th>
                <th class="text-nowrap">Dibayar</th>
                <th class="text-nowrap">Nominal Hutang</th>
                <th class="text-nowrap">Jatuh_tempo</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data_hutang as $item)
                @php
                  $total_qty += $item->qty ?? 0;
                  $total_harga += $item->nominal_hutang ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '') }}</td>
                  <td>{{ $item->nama_barang ?? '-' }}</td>
                  <td>{{ $item->nama_satuan ?? '-' }}</td>
                  <td>{{ $item->nama_supplier ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->harga_satuan ?? 0) }}</td>
                  <td>{{ $item->qty ?? 0 }}</td>
                  <td>{{ Fungsi::rupiah($item->total ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->total_dibayar ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_hutang ?? 0) }}</td>
                  <td>{{ Fungsi::format_tgl($item->jatuh_tempo ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="9" class="text-end">Total</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- END tab-pane -->
      <!-- BEGIN tab-pane -->
      <div class="tab-pane fade" id="nav-tab-2">
        <h3 class="mt-10px">Data laporan piutang</h3>
        <form method="GET" action="{{ route('lap_hutang.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('lap_piutang.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
            {{-- <a href="{{ route('lap_piutang.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}" class="btn btn-danger btn-sm">
          <i class="fa fa-print" style="font-size: 12px"></i> Print Demo --}}
            <a href="javascript:void(0)" class="btn btn-warning btn-sm"
              onclick="printPage('{{ route('lap_piutang.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('lap_piutang.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
              class="btn btn-warning btn-sm">
              <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
            </a>
          </div>
        </form>
        <div class="panel-body">
          <table id="data-table-default" width="100%"
            class="table table-striped table-bordered align-middle text-nowrap">
            <thead>
              <tr>
                <th width="1%"></th>
                <th class="text-nowrap">Waktu</th>
                <th class="text-nowrap">Nama Konsumen</th>
                <th class="text-nowrap">Telp</th>
                <th class="text-nowrap">Nominal Belanja</th>
                <th class="text-nowrap">Dibayar</th>
                <th class="text-nowrap">Nominal Piutang</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data_piutang as $item)
                @php
                  $total_harga += $item->nominal_kasbon ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '') }}</td>
                  <td>{{ $item->nama_konsumen ?? '-' }}</td>
                  <td>{{ $item->kontak_konsumen ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_belanja ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_dibayar ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_kasbon ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="6" class="text-end">Total</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- END tab-pane -->
      <!-- BEGIN tab-pane -->
      <div class="tab-pane fade" id="nav-tab-3">
        <h3 class="mt-10px">Riwayat Pembayaran Hutang</h3>
        <form method="GET" action="{{ route('lap_hutang.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('lap_riwHutang.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
            {{-- <a href="{{ route('laporan_penjualan.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}" class="btn btn-danger btn-sm">
          <i class="fa fa-print" style="font-size: 12px"></i> Print Demo --}}
            <a href="javascript:void(0)" class="btn btn-warning btn-sm"
              onclick="printPage('{{ route('lap_riwHutang.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('lap_riwHutang.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
              class="btn btn-warning btn-sm">
              <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
            </a>
          </div>
        </form>
        <div class="panel-body">
          <table id="data-table-default" width="100%"
            class="table table-striped table-bordered align-middle text-nowrap">
            <thead>
              <tr>
                <th width="1%"></th>
                <th class="text-nowrap">Waktu</th>
                <th class="text-nowrap">Nama Barang</th>
                <th class="text-nowrap">Supplier</th>
                <th class="text-nowrap">Total Belanja</th>
                <th class="text-nowrap">Dibayar</th>
                <th class="text-nowrap">Pembayaran</th>
                <th class="text-nowrap">Sisa Hutang</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data_rw_hutang as $item)
                @php
                  $total_qty += $item->qty ?? 0;
                  $total_harga += $item->total_harga_produk ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl($item->created_at ?? '') }}</td>
                  <td>{{ $item->nama_barang ?? '-' }}</td>
                  <td>{{ $item->nama_supplier ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->total_harga_beli ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->total_dibayar ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->total_hutang ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_dibayar ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            {{-- <tfoot>
              <tr>
                <th colspan="9" class="text-end">Total</th>
                <th>{{ $total_qty }}</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
              </tr>
            </tfoot> --}}
          </table>
        </div>
      </div>
      <!-- END tab-pane -->
      <!-- BEGIN tab-pane -->
      <div class="tab-pane fade" id="nav-tab-4">
        <h3 class="mt-10px">Riwayat Pembayaran Piutang</h3>
        <form method="GET" action="{{ route('lap_hutang.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('lap_riwPiutang.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
            {{-- <a href="{{ route('laporan_penjualan.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}" class="btn btn-danger btn-sm">
          <i class="fa fa-print" style="font-size: 12px"></i> Print Demo --}}
            <a href="javascript:void(0)" class="btn btn-warning btn-sm"
              onclick="printPage('{{ route('lap_riwPiutang.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('lap_riwPiutang.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
              class="btn btn-warning btn-sm">
              <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
            </a>
          </div>
        </form>
        <div class="panel-body">
          <table id="data-table-default" width="100%"
            class="table table-striped table-bordered align-middle text-nowrap">
            <thead>
              <tr>
                <th width="1%"></th>
                <th class="text-nowrap">Waktu</th>
                <th class="text-nowrap">Konsumen</th>
                <th class="text-nowrap">Total Belanja</th>
                <th class="text-nowrap">Total Dibayar</th>
                <th class="text-nowrap">Pembayaran Hutang</th>
                <th class="text-nowrap">Sisa Hutang</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data_rw_piutang as $item)
                @php
                  $total_qty += $item->qty ?? 0;
                  $total_harga += $item->total_harga_produk ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl($item->created_at ?? '') }}</td>
                  <td>{{ $item->nama_konsumen ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_belanja ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_dibayar ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_pembayaran_kasbon ?? 0) }}</td>
                  <td>{{ Fungsi::rupiah($item->nominal_kasbon ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            {{-- <tfoot>
              <tr>
                <th colspan="9" class="text-end">Total</th>
                <th>{{ $total_qty }}</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
              </tr>
            </tfoot> --}}
          </table>
        </div>
      </div>
      <!-- END tab-pane -->

    </div>
    <!-- END tab-content -->
  </div>
  <!-- END panel -->
@endsection
