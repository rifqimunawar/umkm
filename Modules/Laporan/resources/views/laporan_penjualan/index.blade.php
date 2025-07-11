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
          <li class="nav-item"><a href="#nav-tab-1" data-bs-toggle="tab" class="nav-link active">Semua Penjualan</a></li>
          <li class="nav-item"><a href="#nav-tab-2" data-bs-toggle="tab" class="nav-link">Penjualan Produk Jadi</a></li>
          <li class="nav-item"><a href="#nav-tab-3" data-bs-toggle="tab" class="nav-link">Penjualan Hasil Produksi</a>
          </li>
          {{-- <li class="nav-item"><a href="#nav-tab-4" data-bs-toggle="tab" class="nav-link">Nav Tab 4</a></li> --}}
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
        <h3 class="mt-10px">Laporan Semua Penjualan</h3>
        <form method="GET" action="{{ route('laporan_penjualan.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('laporan_penjualan.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
              onclick="printPage('{{ route('laporan_penjualan.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('laporan_penjualan.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
                <th class="text-nowrap">Nama Produk</th>
                <th class="text-nowrap">Kategori Produk</th>
                <th class="text-nowrap">Admin Penerima</th>
                <th class="text-nowrap">Konsumen</th>
                <th class="text-nowrap">Harga Satuan</th>
                <th class="text-nowrap">Quantity</th>
                <th class="text-nowrap">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data as $item)
                @php
                  $total_qty += $item->qty ?? 0;
                  $total_harga += $item->total_harga_produk ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '-') }}</td>
                  <td>{{ $item->nama_produk ?? '-' }}</td>
                  <td>{{ $item->nama_kategori ?? '-' }}</td>
                  <td>{{ $item->created_by ?? '-' }}</td>
                  <td>{{ $item->nama_konsumen ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->harga_satuan_produk ?? 0) }}</td>
                  <td>{{ $item->qty ?? 0 }}</td>
                  <td>{{ Fungsi::rupiah($item->total_harga_produk ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="7" class="text-end">Total</th>
                <th>{{ $total_qty }}</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- END tab-pane -->
      <!-- BEGIN tab-pane -->
      <div class="tab-pane fade" id="nav-tab-2">
        <h3 class="mt-10px">Penjualan Produk Jadi</h3>
        <form method="GET" action="{{ route('laporan_penjualan.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('laporan_penjualan_produk_jadi.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
              onclick="printPage('{{ route('laporan_penjualan_produk_jadi.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('laporan_penjualan_produk_jadi.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
                <th class="text-nowrap">Nama Produk</th>
                <th class="text-nowrap">Kategori Produk</th>
                <th class="text-nowrap">Admin Penerima</th>
                <th class="text-nowrap">Konsumen</th>
                <th class="text-nowrap">Harga Satuan</th>
                <th class="text-nowrap">Quantity</th>
                <th class="text-nowrap">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data_produk_jadi as $item)
                @php
                  $total_qty += $item->qty ?? 0;
                  $total_harga += $item->total_harga_produk ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '-') }}</td>
                  <td>{{ $item->nama_produk ?? '-' }}</td>
                  <td>{{ $item->nama_kategori ?? '-' }}</td>
                  <td>{{ $item->created_by ?? '-' }}</td>
                  <td>{{ $item->nama_konsumen ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->harga_satuan_produk ?? 0) }}</td>
                  <td>{{ $item->qty ?? 0 }}</td>
                  <td>{{ Fungsi::rupiah($item->total_harga_produk ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="7" class="text-end">Total</th>
                <th>{{ $total_qty }}</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- END tab-pane -->
      <!-- BEGIN tab-pane -->
      <div class="tab-pane fade" id="nav-tab-3">
        <h3 class="mt-10px">Penjualan Hasil Produksi</h3>
        <form method="GET" action="{{ route('laporan_penjualan.index') }}"
          style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
          <div style="display: flex; align-items: center; gap: 10px;">
            <a href="{{ route('laporan_penjualan_hasil_produksi.export', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
              onclick="printPage('{{ route('laporan_penjualan_hasil_produksi.print', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}')">
              <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>
            <a href="{{ route('laporan_penjualan_hasil_produksi.pdf', ['start_date' => request('start_date', date('Y-m-d')), 'end_date' => request('end_date', date('Y-m-d'))]) }}"
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
                <th class="text-nowrap">Nama Produk</th>
                <th class="text-nowrap">Kategori Produk</th>
                <th class="text-nowrap">Admin Penerima</th>
                <th class="text-nowrap">Konsumen</th>
                <th class="text-nowrap">Harga Satuan</th>
                <th class="text-nowrap">Quantity</th>
                <th class="text-nowrap">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total_qty = 0;
                $total_harga = 0;
              @endphp
              @foreach ($data_hasil_produksi as $item)
                @php
                  $total_qty += $item->qty ?? 0;
                  $total_harga += $item->total_harga_produk ?? 0;
                @endphp
                <tr class="odd gradeX">
                  <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                  <td>{{ Fungsi::format_tgl_jam_menit($item->created_at ?? '-') }}</td>
                  <td>{{ $item->nama_produk ?? '-' }}</td>
                  <td>{{ $item->nama_kategori ?? '-' }}</td>
                  <td>{{ $item->created_by ?? '-' }}</td>
                  <td>{{ $item->nama_konsumen ?? '-' }}</td>
                  <td>{{ Fungsi::rupiah($item->harga_satuan_produk ?? 0) }}</td>
                  <td>{{ $item->qty ?? 0 }}</td>
                  <td>{{ Fungsi::rupiah($item->total_harga_produk ?? 0) }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="7" class="text-end">Total</th>
                <th>{{ $total_qty }}</th>
                <th>{{ Fungsi::rupiah($total_harga) }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- END tab-pane -->
      <!-- BEGIN tab-pane -->
      <div class="tab-pane fade" id="nav-tab-4">
        <h3 class="mt-10px">Nav Tab 4</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,
          est diam sagittis orci, a ornare nisi quam elementum tortor.
          Proin interdum ante porta est convallis dapibus dictum in nibh.
          Aenean quis massa congue metus mollis fermentum eget et tellus.
          Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,
          nec eleifend orci eros id lectus.
        </p>
        <p>
          Aenean eget odio eu justo mollis consectetur non quis enim.
          Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.
          Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,
          at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.
          Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.
          Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.
          Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.
        </p>
      </div>
      <!-- END tab-pane -->

    </div>
    <!-- END tab-content -->
  </div>
  <!-- END panel -->
@endsection
