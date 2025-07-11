@extends('dashboard::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
  use Carbon\Carbon;
  Carbon::setLocale('id');
  $now = Carbon::now();
  $limitDate = $now->copy()->addDays(5);
@endphp
@section('content')
  <!-- BEGIN breadcrumb -->
  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
  <!-- END breadcrumb -->
  <!-- BEGIN page-header -->
  <h1 class="page-header">Dashboard <small> {{ GetSettings::getNamaWeb() }} </small></h1>
  <!-- END page-header -->
  <!-- BEGIN row -->
  <div class="row">
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-teal">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
        <div class="stats-content">
          <div class="stats-title">JUMLAH TRANSAKSI HARI INI</div>
          <div class="stats-number">{{ $data_transaksi_hari_ini?->count() ?? 0 }} </div>
          <div class="stats-progress progress">
            <div class="progress-bar" style="width: 70.1%;"></div>
          </div>
          <div class="stats-desc">Better than last week (70.1%)</div>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-blue">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
        <div class="stats-content">
          <div class="stats-title">PRODUK TERJUAL HARI INI</div>
          <div class="stats-number">{{ $data_produk_terjual_hari_ini->sum('qty') ?? 0 }}</div>
          <div class="stats-progress progress">
            <div class="progress-bar" style="width: 40.5%;"></div>
          </div>
          <div class="stats-desc">Better than last week (40.5%)</div>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-indigo">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
        <div class="stats-content">
          <div class="stats-title">NOMINAL PENJUALAN HARI INI</div>
          <div class="stats-number">{{ Fungsi::rupiah($data_transaksi_hari_ini->sum('nominal_belanja') ?? 0) }} </div>
          <div class="stats-progress progress">
            <div class="progress-bar" style="width: 76.3%;"></div>
          </div>
          <div class="stats-desc">Better than last week (76.3%)</div>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
    <!-- BEGIN col-3 -->
    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-gray-900">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
        <div class="stats-content">
          <div class="stats-title">NOMINAL PIUTANG HARI INI</div>
          <div class="stats-number">{{ Fungsi::rupiah($data_transaksi_hari_ini->sum('nominal_kasbon') ?? 0) }} </div>
          <div class="stats-progress progress">
            <div class="progress-bar" style="width: 54.9%;"></div>
          </div>
          <div class="stats-desc">Better than last week (54.9%)</div>
        </div>
      </div>
    </div>
    <!-- END col-3 -->
  </div>
  <!-- END row -->



  <!-- ================== BEGIN page-js ================== -->
  <script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/js/demo/dashboard-v3.js') }}"></script>

  <script src="../assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
  <script src="../assets/js/demo/render.highlight.js"></script>

  <script src="../assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
  <!-- ================== END page-js ================== -->
@endsection
