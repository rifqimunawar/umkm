@extends('penjualan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('penjualan_edit.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                  <div class="form-group mb-2">
                    <label for="nama_konsumen">Nama Konsumen</label>
                    <select name="nama_konsumen" id="nama_konsumen" class="form-select" aria-label="Konsumen">
                      <option selected value="">Pilih Konsumen</option>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_belanja">Nominal Belanja</label>
                    <input type="text" class="form-control format-rupiah" name="nominal_belanja" id="nominal_belanja">
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_dibayar">Nominal Dibayar</label>
                    <input type="text" class="form-control format-rupiah" name="nominal_dibayar" id="nominal_dibayar">
                  </div>

                  <div class="form-group mb-2">
                    <label for="nominal_kasbon">Nominal Piutang</label>
                    <input type="text" class="form-control format-rupiah" readonly name="nominal_kasbon"
                      id="nominal_kasbon">
                  </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                  <label for="" class="label-control mb-3 fs-3">Riwayat Belanja:
                    {{ Fungsi::format_tgl($data->create_at) }}</label>
                  <div class="table-responsive">
                    <table id="table_detail_penjualan"
                      class="table table-striped table-bordered align-middle text-nowrap">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th>Produk</th>
                          <th>Harga Satuan</th>
                          <th>Qty</th>
                          <th>Total</th>
                          <th>Qty Retur</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <!-- Tombol -->
              <div class="d-flex justify-content-center gap-2 mt-4">
                <input type="hidden" name="transaksi_id" value="{{ $data->id ?? '' }}">
                <input type="hidden" name="konsumen_id" value="{{ $data->konsumen_id ?? '' }}">
                <a href="{{ route('penjualan_edit.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalRetur" tabindex="-1" aria-labelledby="modalReturLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalReturLabel">Retur Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <form id="formRetur">
            <div class="mb-3">
              <label for="retur_produk" class="form-label">Produk</label>
              <input type="text" class="form-control" id="retur_produk" readonly>
            </div>
            <div class="mb-3">
              <label for="retur_alasan" class="form-label">Alasan Retur</label>
              <select class="form-select" id="retur_alasan" required>
                <option value="" disabled selected>Pilih Alasan</option>
                <option value="Rusak">Rusak</option>
                <option value="Kadaluwarsa">Kadaluwarsa</option>
                <option value="Salah Produk">Salah Produk</option>
              </select>
            </div>
            <input type="hidden" id="retur_item_id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="submitRetur">Simpan Retur</button>
        </div>
      </div>
    </div>
  </div>


  <p style="display: none" id="id_transaksi">{{ $id_transaksi }}</p>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const id_transaksi = document.getElementById('id_transaksi').innerText;

      function parseRupiah(rupiah) {
        return parseInt(rupiah.replace(/[^\d]/g, '')) || 0;
      }

      function formatRupiah(angka) {
        const numberString = angka.toString().replace(/[^,\d]/g, '');
        const split = numberString.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        const ribuan = split[0].substr(sisa).match(/\d{3}/g);

        if (ribuan) {
          const separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        return split[1] !== undefined ?
          'Rp. ' + rupiah + ',' + split[1] :
          'Rp. ' + rupiah;
      }


      function getDataKonsumen(selectedId = null) {
        fetch(`/penjualan/ajx_dataKonsumen`)
          .then(response => response.json())
          .then(data => {
            const select = document.getElementById('nama_konsumen');
            select.innerHTML = '<option value="">Pilih Konsumen</option>';
            data.forEach(konsumen => {
              const option = document.createElement('option');
              option.value = konsumen.id;
              option.textContent = konsumen.nama_konsumen;
              if (selectedId && konsumen.id === selectedId) {
                option.selected = true;
              }
              select.appendChild(option);
            });
          })
          .catch(error => console.error('Gagal ambil konsumen:', error));
      }

      function getData(id_transaksi) {
        fetch(`/penjualan/ajx_dataTransaksi/${id_transaksi}`)
          .then(response => response.json())
          .then(data => {
            console.log(data);

            // Isi input
            document.getElementById('nominal_belanja').value = formatRupiah(data.nominal_belanja);
            document.getElementById('nominal_dibayar').value = formatRupiah(data.nominal_dibayar);
            document.getElementById('nominal_kasbon').value = formatRupiah(data.nominal_kasbon);

            // Konsumen
            getDataKonsumen(data.konsumen_id);

            // Detail transaksi
            const tbody = document.querySelector('#table_detail_penjualan tbody');
            tbody.innerHTML = '';

            data.detail_transaksi.forEach((item, index) => {
              const tr = document.createElement('tr');

              tr.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.nama_produk}</td>
                <td>${formatRupiah(item.harga_satuan_produk)}</td>
                <td>${item.qty}</td>
                <td>${formatRupiah(item.total_harga_produk)}</td>
                <td>
                  <input type="number" min="0" max="${item.qty}"
                        class="form-control form-control-sm retur-qty"
                        name="retur_qty[${item.id}]"
                        data-id="${item.id}"
                        data-produk="${item.nama_produk}"
                        placeholder="0">
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning btn-retur"
                    data-id="${item.id}" data-produk="${item.nama_produk}" data-qty="${item.qty}"
                    data-bs-toggle="modal" data-bs-target="#modalRetur">
                    Retur
                  </button>
                </td>
              `;


              tbody.appendChild(tr);
            });
          })
          .catch(error => console.error('Terjadi kesalahan saat ambil data transaksi:', error));
      }

      function initReturHandler() {
        // Buka modal saat tombol diklik
        document.addEventListener('click', function(e) {
          if (e.target.classList.contains('btn-retur')) {
            const itemId = e.target.dataset.id;
            const produk = e.target.dataset.produk;

            document.getElementById('retur_produk').value = produk;
            document.getElementById('retur_item_id').value = itemId;
          }
        });

        // Submit Retur
        document.getElementById('submitRetur').addEventListener('click', function() {
          const transaksiId = document.getElementById('id_transaksi').innerText;
          const itemId = document.getElementById('retur_item_id').value;
          const alasan = document.getElementById('retur_alasan').value;

          // Ambil qty dari input yg sesuai
          const qtyInput = document.querySelector(`.retur-qty[data-id="${itemId}"]`);
          const retur_qty = qtyInput ? parseInt(qtyInput.value) : 0;

          if (!alasan) {
            Swal.fire({
              icon: 'warning',
              title: 'Oops!',
              text: 'Silakan pilih alasan retur terlebih dahulu.',
              confirmButtonText: 'OK'
            });
            return;
          }

          if (!retur_qty || retur_qty <= 0) {
            Swal.fire({
              icon: 'warning',
              title: 'Qty tidak valid',
              text: 'Masukkan jumlah qty yang ingin diretur.',
              confirmButtonText: 'OK'
            });
            return;
          }

          // Data yang dikirim
          const returData = {
            transaksi_id: transaksiId,
            item_id: itemId,
            retur_qty: retur_qty,
            alasan: alasan
          };

          // Kirim via fetch ke backend
          fetch('/penjualan/ajx_storeRetur', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // jika pakai Laravel
              },
              body: JSON.stringify(returData)
            })
            .then(response => response.json())
            .then(result => {
              if (result.success) {
                Swal.fire({
                  icon: 'success',
                  title: 'Retur berhasil',
                  text: result.message || 'Data retur telah disimpan.',
                  timer: 1500,
                  showConfirmButton: false
                });

                // Tutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modalRetur'));
                modal.hide();
                window.location.reload();
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: result.message || 'Gagal menyimpan retur.'
                });
              }
            })
            .catch(error => {
              console.error('Error simpan retur:', error);
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan saat mengirim data retur.'
              });
            });
        });
      }


      // Load data saat halaman siap
      getData(id_transaksi);
      initReturHandler();
    });
  </script>

@endsection
