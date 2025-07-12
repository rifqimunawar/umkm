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

  <!-- BEGIN row -->
  <div class="row">
    <!-- BEGIN col-8 -->
    <div class="col-xl-8">
      <div class="widget-chart with-sidebar" data-bs-theme="dark">
        <div class="widget-chart-content bg-gray-800">
          <h4 class="chart-title">
            Penjualan Bulanan
            <small>Data penjualan per bulan</small>
          </h4>
          <div id="visitors-line-chart" class="widget-chart-full-width dark-mode" style="height: 257px;"></div>
        </div>
      </div>
    </div>
    <!-- END col-8 -->
    <!-- BEGIN col-4 -->
    <div class="col-xl-4">
      <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
          <h4 class="panel-title">
            Produk Menipis
          </h4>
        </div>
        <div class="list-group list-group-flush " data-bs-theme="dark">

          @foreach ($data_menipis->take(7) as $item)
            <a href="javascript:;" class="list-group-item list-group-item-action d-flex">
              <span class="flex-1">{{ $loop->iteration }}. {{ $item->nama_produk ?? '-' }}</span>
              <span class="badge bg-teal fs-10px">{{ $item->jumlah_produk ?? 0 }} &emsp;
                {{ $item->satuan->nama_satuan ?? '-' }}</span>
            </a>
          @endforeach

        </div>
      </div>
    </div>
    <!-- END col-4 -->
  </div>
  <!-- END row -->



  <!-- ================== BEGIN page-js ================== -->
  <script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
  <script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
  {{-- <script src="{{ asset('assets/js/demo/dashboard-v2.js') }}"></script> --}}

  <script>
    function parseDateStr(dateStr) {
      const [day, monthStr, year] = dateStr.split(' ');
      const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
      const monthIndex = monthNames.indexOf(monthStr.toUpperCase());
      const fullYear = 2000 + parseInt(year);
      return new Date(fullYear, monthIndex, parseInt(day));
    }

    function formatApiDataForChart(produksiData, produkData) {
      const produksiMap = new Map();
      produksiData.forEach(item => {
        produksiMap.set(item.tanggal, item.total_harga_harian);
      });
      const produkMap = new Map();
      produkData.forEach(item => {
        produkMap.set(item.tanggal, item.total_harga_harian);
      });
      const allDates = new Set([...produksiMap.keys(), ...produkMap.keys()]);
      const sortedDates = Array.from(allDates).sort((a, b) => parseDateStr(a) - parseDateStr(b));
      const produksiValues = sortedDates.map(tgl => [parseDateStr(tgl), produksiMap.get(tgl) || 0]);
      const produkValues = sortedDates.map(tgl => [parseDateStr(tgl), produkMap.get(tgl) || 0]);

      return [{
          key: 'Hasil Produksi',
          color: 'rgba(0, 150, 136, 0.8)',
          values: produksiValues
        },
        {
          key: 'Produk Jadi',
          color: 'rgba(33, 150, 243, 0.8)',
          values: produkValues
        }
      ];
    }


    async function handleVisitorsAreaChart() {
      const produksiData = await fetch('/ajx_get/data_harian_produksi').then(res => res.json());
      const produkData = await fetch('/ajx_get/data_harian_produk').then(res => res.json());
      const visitorAreaChartData = formatApiDataForChart(produksiData, produkData);
      nv.addGraph(function() {
        const chart = nv.models.stackedAreaChart()
          .useInteractiveGuideline(true)
          .x(d => d[0])
          .y(d => d[1])
          .pointSize(0.5)
          .margin({
            left: 50,
            right: 25,
            top: 20,
            bottom: 20
          })
          .controlLabels({
            stacked: 'Stacked'
          })
          .showControls(false)
          .duration(300);

        chart.xAxis.tickFormat(function(d) {
          const monthsName = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
            'Dec'
          ];
          d = new Date(d);
          return `${monthsName[d.getMonth()]} ${d.getDate()}`;
        });
        chart.yAxis.tickFormat(d3.format(',.0f'));

        d3.select('#visitors-line-chart')
          .selectAll('*').remove();

        d3.select('#visitors-line-chart')
          .append('svg')
          .datum(visitorAreaChartData)
          .transition().duration(1000)
          .call(chart);

        nv.utils.windowResize(chart.update);
        return chart;
      });
    }

    const DashboardV2 = (function() {
      "use strict";
      return {
        init: function() {
          handleVisitorsAreaChart();
        }
      };
    })();

    $(document).ready(function() {
      DashboardV2.init();
    });
  </script>

  <!-- ================== END page-js ================== -->
@endsection
