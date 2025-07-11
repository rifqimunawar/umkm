@extends('pembelian::layouts.master')
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
      <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah &ensp;<i class="fa fa-plus-square" style="font-size: 12px"></i>
      </a>

      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('pembelian_retur.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a> --}}

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        {{-- <a href="{{ route('pembelian_retur.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a> --}}

      </div>
    </div>
    <div class="panel-body">
      <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
        <thead>
          <tr>
            <th width="1%"></th>
            <th class="text-nowrap">Barang diretur</th>
            <th class="text-nowrap">Tgl Pembelian</th>
            <th class="text-nowrap">Tgl Retur</th>
            <th class="text-nowrap">Supplier</th>
            <th class="text-nowrap">Total Harga</th>
            <th class="text-nowrap">Alasan</th>
            <th class="text-nowrap"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr class="odd gradeX">
              <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
              <td>{{ $item->nama_barang ?? '-' }}</td>
              <td>{{ Fungsi::format_tgl($item->waktu_pembelian ?? '') }}</td>
              <td>{{ Fungsi::format_tgl($item->create_at ?? '') }}</td>
              <td>{{ $item->nama_supplier ?? '-' }}</td>
              <td>{{ Fungsi::rupiah($item->total_harga ?? 0) }}</td>
              <td>{{ $item->alasan ?? '-' }}</td>
              <td class="d-flex justify-content-center align-items-center text-center">
                <a href="{{ route('pembelian_retur.edit', $item->id) }}">
                  <i class="fa fa-pencil-square" style="font-size: 14px; margin-right:5px"></i>
                </a>
                {{-- <a href="{{ route('pembelian_retur.destroy', $item->id) }}" data-confirm-delete="true">
                  <i class="fa fa-trash mx-2" style="font-size: 14px"></i>
                </a> --}}
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>


  {{-- modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Barang Yang Ingin Di Retur</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" id="modal-body-content">
          Memuat data...
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>

      </div>
    </div>
  </div>


  <script>
    function formatTanggal(datetimeStr) {
      const date = new Date(datetimeStr);
      const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
        timeZone: 'Asia/Jakarta'
      };
      return date.toLocaleString('id-ID', options);
    }


    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function() {
      getDataPembelian();
    });

    function getDataPembelian() {
      fetch('/pembelian/getDataPembelian')
        .then(response => response.json())
        .then(data => {
          const container = document.getElementById('modal-body-content');

          console.log(data)

          let html = `
        <table class="table table-bordered table-striped table-sm">
          <thead class="table-light">
            <tr>
              <th>Waktu</th>
              <th>Nama Barang</th>
              <th>Harga Satuan</th>
              <th>Qty</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
      `;

          data.forEach(item => {
            html += `
          <tr>
            <td>${formatTanggal(item.time)}</td>
            <td>${item.nama_barang}</td>
            <td>Rp ${item.harga_satuan != null ? item.harga_satuan.toLocaleString() : '0'}</td>
            <td>${item.quantity}</td>
            <td>Rp ${item.total_harga != null ? item.total_harga.toLocaleString() : '0'}</td>
            <td>
              <button class="btn btn-sm btn-success pilih-btn" data-id="${item.id_barang}" data-nama="${item.nama_barang}">Pilih</button>
            </td>
          </tr>
        `;
          });

          html += `
          </tbody>
        </table>
      `;

          container.innerHTML = html;

          document.querySelectorAll('.pilih-btn').forEach(button => {
            button.addEventListener('click', function() {
              const id_barang = this.dataset.id;
              const nama = this.dataset.nama;
              // alert(`Barang dipilih: ${nama} (ID: ${id})`);
              // Anda bisa menambahkan logic untuk mengisi form, dsb.
              window.location.href = `/pembelian/retur/create/${id_barang}`;
            });
          });
        })
        .catch(error => {
          console.error('Error fetching data:', error);
          document.getElementById('modal-body-content').innerHTML = '<p class="text-danger">Gagal memuat data.</p>';
        });
    }
  </script>
@endsection
