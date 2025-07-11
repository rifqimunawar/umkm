@extends('pembelian::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
          <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <!-- Kolom Kiri -->
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="nama_produk">Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk"
                    required value="{{ old('nama_produk', $data->nama_produk ?? '') }}">
                </div>

                {{-- <div class="form-group mb-3">
                  <label for="kode">Kode Produk</label>

                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Produk"
                    value="{{ old('kode', $data->kode ?? '') }}">
                  <button type="button" class="btn btn-primary btn-sm" onclick="startScan()">Scan Kode</button>
                </div>

                <div class="form-group mb-3">

                  <div id="scanner" style="width: 100%; max-width: 400px; margin-top: 10px;"></div>
                </div> --}}

                <div class="form-group mb-1">
                  <label for="kode">Kode Produk</label>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Produk"
                    value="{{ old('kode', $data->kode ?? '') }}">
                  <button type="button" class="btn btn-primary btn-sm" onclick="startScan()">Scan Kode</button>
                </div>

                <div class="form-group mb-3">
                  <label for="kategori_id">Kategori</label>
                  <select class="form-control" name="kategori_id" id="kategori_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($data_kategori as $kategori)
                      <option value="{{ $kategori->id }}"
                        {{ old('kategori_id', $data->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" name="is_produksi" role="switch" id="is_produksi"
                    value="1" {{ old('is_produksi', $data->is_produksi ?? false) ? 'checked' : '' }}>
                  <label class="form-check-label" for="is_produksi">Hasil Produksi</label>
                </div>


                <div id="panel-bahan-produksi">
                  <a href="#" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                    data-bs-target="#bahanProduksi">
                    Tambah &ensp;<i class="fa fa-plus-square" aria-hidden="true" style="font-size: 12px"></i>
                  </a>
                  <table id="data-table-bahan-produksi" width="100%"
                    class="table table-striped table-bordered align-middle text-nowrap">
                    <thead>
                      <tr>
                        <th width="1%">No</th>
                        <th class="text-nowrap">Bahan</th>
                        <th class="text-nowrap">Jumlah bahan</th>
                        <th class="text-nowrap">Nominal</th>
                        <th class="text-nowrap"></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div id="panel-komponen-produksi">
                  <a href="#" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                    data-bs-target="#komponenProduksi">
                    Tambah &ensp;<i class="fa fa-plus-square" aria-hidden="true" style="font-size: 12px"></i>
                  </a>
                  <table id="data-table-komponen-produksi" width="100%"
                    class="table table-striped table-bordered align-middle text-nowrap">
                    <thead>
                      <tr>
                        <th width="1%">No</th>
                        <th class="text-nowrap">Komponen</th>
                        <th class="text-nowrap">Nominal</th>
                        <th class="text-nowrap"></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                <div class="form-group mb-3">
                  <label for="harga_beli">Total Modal (Harga Beli)</label>
                  <input type="text" class="form-control format-rupiah" id="total_harga_bahan" name="harga_beli"
                    placeholder="Nominal" required value="{{ old('harga_beli', $data->harga_beli ?? '') }}">
                </div>


                <div class="form-group mb-3">
                  <label for="harga_jual">Nominal Harga Jual Total</label>
                  <input type="text" class="form-control format-rupiah" id="harga_jual" name="harga_jual"
                    placeholder="Nominal" required value="{{ old('harga_jual', $data->harga_jual ?? '') }}">
                </div>

              </div>

              <!-- Kolom Kanan -->
              <div class="col-md-6">

                <div class="form-group mb-3">
                  <label for="jumlah_produk">Jumlah Produk</label>
                  <div class="input-group">
                    <input type="number" class="form-control" name="jumlah_produk" id="jumlah_produk"
                      placeholder="Kuantitas" required value="{{ old('jumlah_produk', $data->jumlah_produk ?? '') }}">
                    <select class="form-control" name="satuan_id" id="satuan_id" required>
                      <option value="">-- Pilih satuan --</option>
                      @foreach ($data_satuan as $satuan)
                        <option value="{{ $satuan->id }}"
                          {{ old('satuan_id', $data->satuan_id ?? '') == $satuan->id ? 'selected' : '' }}>
                          {{ $satuan->nama_satuan }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>




                <div class="form-group mb-2">
                  <label for="total_dibayar">Total Dibayar</label>
                  <input type="text" class="form-control format-rupiah" name="total_dibayar" id="total_dibayar"
                    placeholder="Rp . . . " required value="{{ old('total_dibayar', $data->total_dibayar ?? '') }}">
                  <div id="totalDibayarFeedback" class="invalid-feedback"></div>
                </div>

                <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" name="is_hutang" id="is_hutang" value="1"
                    role="switch" {{ old('is_hutang', $data->is_hutang ?? false) ? 'checked' : '' }}>
                  <label class="form-check-label" for="is_hutang">Hutang Pembelian</label>
                </div>

                <div id="hutang_section" style="display: none;">
                  <div class="form-group mb-2">
                    <label for="total_hutang">Total Hutang</label>
                    <input readonly type="text" class="form-control format-rupiah" name="total_hutang"
                      id="total_hutang" placeholder="Rp . . . "
                      value="{{ old('total_hutang', $data->total_hutang ?? '') }}">
                  </div>

                  <div class="form-group mb-2">
                    <label for="jatuh_tempo">Jatuh Tempo</label>
                    <input type="date" class="form-control" name="jatuh_tempo" id="jatuh_tempo"
                      value="{{ old('jatuh_tempo', $data->jatuh_tempo ?? '') }}">
                  </div>
                </div>




                <div class="form-group mb-3">
                  <label for="harga_beli_satuan">Modal Awal Satuan</label>
                  <input type="text" readonly class="form-control format-rupiah" name="harga_beli_satuan"
                    id="harga_beli_satuan" placeholder="Modal Harga Satuan" required
                    value="{{ old('harga_beli_satuan', $data->harga_beli_satuan ?? '') }}">
                </div>

                <div class="form-group mb-3">
                  <label for="harga_jual_satuan">Harga Jual Satuan</label>
                  <input type="text" readonly class="form-control format-rupiah" name="harga_jual_satuan"
                    id="harga_jual_satuan" placeholder="Harga Satuan" required
                    value="{{ old('harga_jual_satuan', $data->harga_jual_satuan ?? '') }}">
                </div>

                <div class="mb-3">
                  <label class="form-label" for="img">Gambar Produk</label><br>
                  @isset($data->img)
                    <img id="preview-img-old" src="{{ asset('img/' . $data->img) }}" alt="Logo Lama" class="mb-2"
                      style="max-height: 100px;">
                  @endisset
                  <img id="preview-img" class="mb-2 d-block" style="max-height: 100px; display: none;">
                  <input class="form-control" type="file" id="img" name="img" accept="image/*"
                    onchange="previewImage(event, 'preview-img')" />
                </div>

                <img id="preview-img-old" src="#" alt="Logo Lama" class="mb-2"
                  style="max-height: 100px; display: none;">

                <div class="form-group mb-3">
                  <label for="desc">Deskripsi</label>
                  <textarea name="desc" class="form-control" placeholder="Deskripsi" id="desc" rows="4">{{ old('desc', $data->desc ?? '') }}</textarea>
                </div>
              </div>
            </div>

            <div class="card-action gap-2 d-flex justify-content-center mt-4">

              @if (isset($data->id))
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
              @else
                <input type="hidden" name="produk_temp_id" value="{{ $produk_temp_id }}">
              @endif

              <a href="{{ route('produk.index') }}" class="btn btn-warning btn-sm">Kembali</a>
              <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal qrcode -->
  <div class="modal fade" id="scannerModal" tabindex="-1" aria-labelledby="scannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="scannerModalLabel">Scanner QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            onclick="stopScan()"></button>
        </div>
        <div class="modal-body text-center justify-center">
          <div id="scanner"
            style="width: 100%; max-width: 800px; aspect-ratio: 16 / 9; margin: 0 auto; background: #000;"></div>
          <button type="button" class="btn btn-danger btn-sm mt-3" onclick="stopScan()" style="display:none;"
            id="stop-btn">Stop</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal table produksi -->
  <div class="modal fade" id="bahanProduksi" tabindex="-1" aria-labelledby="bahanProduksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bahanProduksiLabel">Tambah Bahan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="bahan" class="form-label">Pilih Bahan:</label>
            <select name="bahan_id" id="bahanSelect" class="form-control"></select>
          </div>
          <div class="form-group">
            <label for="jumlah_bahan_digunakan" class="form-label">Jumlah:</label>
            <input type="number" id="jumlah_bahan_digunakan" class="form-control" placeholder="Masukkan jumlah">
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="produk_temp_id" value="{{ $produk_temp_id }}">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" id="btn-post-bahan" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal table komponen porduksi -->
  <div class="modal fade" id="komponenProduksi" tabindex="-1" aria-labelledby="komponenProduksiLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="komponenProduksiLabel">Tambah Komponen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="komponen" class="form-label">Pilih Komponen:</label>
            <select name="komponen_id" id="komponenSelect" class="form-control"></select>
          </div>
          <div class="form-group">
            <label for="nominal_komponen" class="form-label format-rupiah">Nominal:</label>
            <input type="text" id="nominal_komponen" class="form-control" placeholder="Rp . . . ">
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="produk_temp_id" value="{{ $produk_temp_id }}">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" id="btn-post-komponen" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    let scannerInstance;
    let isScanning = false;

    function startScan() {
      const scannerModal = new bootstrap.Modal(document.getElementById('scannerModal'));
      scannerModal.show();
      if (isScanning) return;

      scannerInstance = new Html5Qrcode("scanner");

      Html5Qrcode.getCameras().then(devices => {
        if (devices && devices.length) {
          const cameraId = devices[0].id;
          const config = {
            fps: 30,
            qrbox(viewfinderWidth) {
              const width = viewfinderWidth * 0.8;
              const height = width * 9 / 16;
              return {
                width,
                height
              };
            }
          };

          scannerInstance.start(
            cameraId,
            config,
            qrCodeMessage => {
              fetch(`/get_ajx/produk/${qrCodeMessage}`)
                .then(response => response.json())
                .then(data => {
                  document.getElementById("kode").value = qrCodeMessage;
                  document.getElementById("nama_produk").value = data.nama_produk ?? '';
                  document.getElementById("kategori_id").value = data.kategori_id ?? '';
                  document.getElementById("total_harga_bahan").value = data.harga_beli ?? '';
                  document.getElementById("harga_jual").value = data.harga_jual ?? '';
                  document.getElementById("jumlah_produk").value = data.jumlah_produk ?? '';
                  document.getElementById("desc").value = data.desc ?? '';
                  document.getElementById("is_produksi").checked = data.is_produksi == 1;


                  if (data.img) {
                    const previewOld = document.getElementById("preview-img-old");
                    previewOld.src = `/img/${data.img}`;
                    previewOld.style.display = "block";
                  } else {
                    document.getElementById("preview-img-old").style.display = "none";
                  }

                  stopScan();
                  scannerModal.hide();

                  Swal.fire({
                    icon: 'success',
                    title: 'Scan Berhasil',
                    text: `Kode produk: ${qrCodeMessage}`,
                    timer: 2500,
                    showConfirmButton: false
                  });
                  loadTableBahan();
                })
                .catch(error => console.error("Gagal ambil data produk:", error));
            },
            errorMessage => {
              console.warn("Scan error:", errorMessage);
            }
          ).then(() => {
            isScanning = true;
            document.getElementById("stop-btn").style.display = "inline-block";
          });
        }
      }).catch(err => {
        alert("Tidak bisa akses kamera: " + err);
      });
    }

    function stopScan() {
      const stopBtn = document.getElementById("stop-btn");
      const scanner = document.getElementById("scanner");

      if (scannerInstance) {
        scannerInstance.stop().then(() => {
          scannerInstance.clear();
          isScanning = false;
          stopBtn.style.display = "none";
          scanner.innerHTML = "<div class='text-muted'>Scan dihentikan.</div>";
        }).catch(err => {
          console.error("Gagal menghentikan scan:", err);
        });
      }
    }

    function previewImage(event, previewId) {
      const input = event.target;
      const preview = document.getElementById(previewId);
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
      }
    }



    document.addEventListener("DOMContentLoaded", function() {
      const totalHargaBeliInput = document.getElementById('total_harga_bahan');
      const dibayarInput = document.getElementById('total_dibayar');
      const hutangInput = document.getElementById('total_hutang');
      const isHutangCheckbox = document.getElementById('is_hutang');
      const hutangSection = document.getElementById('hutang_section');
      const dibayarFeedback = document.getElementById('totalDibayarFeedback');

      function parseRupiah(str) {
        return parseInt(str.replace(/[^0-9]/g, '')) || 0;
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

        return split[1] !== undefined ? 'Rp ' + rupiah + ',' + split[1] : 'Rp ' + rupiah;
      }

      function formatRupiahInput(el) {
        const raw = el.value.replace(/[^0-9]/g, '');
        if (!raw) {
          el.value = '';
          return;
        }
        el.value = formatRupiah(raw);
      }

      function validateDibayar() {
        const totalHarga = parseRupiah(totalHargaBeliInput.value);
        const totalDibayar = parseRupiah(dibayarInput.value);
        const selisih = totalHarga - totalDibayar;

        if (totalDibayar > totalHarga) {
          dibayarInput.classList.add('is-invalid');
          dibayarFeedback.textContent = "Total dibayar tidak boleh melebihi total harga beli.";
          hutangSection.style.display = "none";
          return false;
        }

        if (totalDibayar < totalHarga) {
          if (isHutangCheckbox.checked) {
            hutangInput.value = formatRupiah(selisih);
            hutangSection.style.display = "block";
            dibayarInput.classList.remove('is-invalid');
            dibayarFeedback.textContent = "";
            return true;
          } else {
            dibayarInput.classList.add('is-invalid');
            dibayarFeedback.textContent = "Pembayaran kurang, centang 'Jadikan Hutang' untuk melanjutkan.";
            hutangSection.style.display = "none";
            return false;
          }
        }

        hutangSection.style.display = "none";
        dibayarInput.classList.remove('is-invalid');
        dibayarFeedback.textContent = "";
        hutangInput.value = formatRupiah(0);
        return true;
      }

      // Listener
      dibayarInput.addEventListener('input', function() {
        formatRupiahInput(this);
        validateDibayar();
      });
      totalHargaBeliInput.addEventListener('input', validateDibayar);
      isHutangCheckbox.addEventListener('change', validateDibayar);

      // Initial check
      validateDibayar();
    });



    const bahanSelect = document.getElementById("bahanSelect");

    function loadBahanOptions() {
      fetch("/get_ajx/bahan")
        .then(response => response.json())
        .then(data => {
          bahanSelect.innerHTML = '<option value="">-- Pilih Bahan --</option>';
          data.forEach(bahan => {
            const option = document.createElement("option");
            option.value = bahan.id;
            option.textContent = bahan.nama || bahan.nama_bahan || `Bahan #${bahan.id}`;
            bahanSelect.appendChild(option);
          });
        })
        .catch(error => console.error("Gagal mengambil data bahan:", error));
    }
    document.getElementById("bahanProduksi").addEventListener("show.bs.modal", loadBahanOptions);
    document.getElementById("btn-post-bahan").addEventListener("click", function() {

      const btn = this;
      btn.disabled = true;
      btn.textContent = "Loading...";

      const bahan_id = document.getElementById("bahanSelect").value;
      const jumlah_bahan_digunakan = document.getElementById("jumlah_bahan_digunakan").value;
      const produk_temp_id = document.getElementById("produk_temp_id").value;

      fetch("/post_ajx/bahan_produk", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
          },
          body: JSON.stringify({
            bahan_id,
            jumlah_bahan_digunakan,
            produk_temp_id
          })
        })
        .then(response => {
          if (!response.ok) {
            return response.json().then(err => Promise.reject(err));
          }
          return response.json();
        })
        .then(data => {
          document.getElementById("jumlah_bahan_digunakan").value = "";
          document.getElementById("bahanSelect").selectedIndex = 0;
          $('#bahanProduksi').modal('hide');
          loadTableBahan();
          loadTableKomponen();
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: data.message,
            timer: 2500,
            showConfirmButton: true
          });
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: error.message || "Terjadi kesalahan saat menyimpan data",
            showConfirmButton: true
          });
        })
        .finally(() => {
          btn.disabled = false;
          btn.textContent = "Simpan";
        });

    });

    function loadTableBahan() {
      const produk_temp_id = document.getElementById("produk_temp_id").value;
      const totalHargaEl = document.getElementById("total_harga_bahan");

      fetch(`/get_ajx/bahan_produk/${produk_temp_id}`)
        .then(response => response.json())
        .then(data => {
          const tbody = document.querySelector("#data-table-bahan-produksi tbody");
          tbody.innerHTML = "";

          let totalHarga = 0;

          if (data.length === 0) {
            const row = document.createElement("tr");
            row.innerHTML = `<td colspan="5" class="text-center">Belum ada bahan</td>`;
            tbody.appendChild(row);
            return;
          }

          data.forEach((item, index) => {
            const jumlah = Number(item.jumlah_bahan_digunakan || 0);
            const harga = Number(item.harga_bahan || 0);
            const subtotal = jumlah * harga;
            totalHarga += subtotal;

            const row = document.createElement("tr");
            row.innerHTML = `
          <td>${index + 1}</td>
          <td>${item.bahan_nama || item.nama || '—'}</td>
          <td>${jumlah}</td>
          <td>Rp ${harga.toLocaleString()}</td>
          <td>
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBahan('${item.id}')">Hapus</button>
          </td>
        `;
            tbody.appendChild(row);
          });

          const totalHargaFormatted = totalHarga.toLocaleString("id-ID");
          document.getElementById("total_harga_bahan").value = `Rp ${totalHargaFormatted}`;
        })
        .catch(error => console.error("Gagal mengambil data bahan:", error));
    }

    function hapusBahan(id) {
      Swal.fire({
        title: 'Hapus Bahan?',
        text: 'Data bahan ini akan dihapus.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          fetch(`/del_ajx/bahan_produk/${id}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content")
              }
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                loadTableBahan();
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data berhasil dihapus',
                  timer: 2000,
                  showConfirmButton: true
                });
              }
            })
            .catch(error => console.error('Gagal menghapus:', error));
        }
      });
    }

    // ============ komponen produksi
    document.addEventListener("DOMContentLoaded", function() {
      loadTableKomponen();
      const nominal_komponen = document.getElementById("nominal_komponen");
      const produksiSwitch = document.getElementById("is_produksi");
      const panelKomponen = document.getElementById("panel-komponen-produksi");
      panelKomponen.style.display = produksiSwitch.checked ? "block" : "none";
      produksiSwitch.addEventListener("change", function() {
        panelKomponen.style.display = this.checked ? "block" : "none";
      });

      function formatRupiah(angka) {
        const numberString = angka.replace(/[^,\d]/g, '');
        const split = numberString.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        const ribuan = split[0].substr(sisa).match(/\d{3}/g);

        if (ribuan) {
          const separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        return split[1] !== undefined ? 'Rp. ' + rupiah + ',' + split[1] : 'Rp. ' + rupiah;
      }

      nominal_komponen.addEventListener("input", function(e) {
        const cursorPosition = this.selectionStart;
        const originalLength = this.value.length;
        this.value = formatRupiah(this.value);
        const newLength = this.value.length;
        this.setSelectionRange(cursorPosition + (newLength - originalLength), cursorPosition + (newLength -
          originalLength));
      });
    });
    const komponenSelect = document.getElementById("komponenSelect");

    function loadKomponenOptions() {
      fetch("/get_ajx/komponen")
        .then(response => response.json())
        .then(data => {
          komponenSelect.innerHTML = '<option value="">-- Pilih Komponen --</option>';
          data.forEach(komponen => {
            const option = document.createElement("option");
            option.value = komponen.id;
            option.textContent = komponen.nama || komponen.nama_komponen || `Komponen #${komponen.id}`;
            komponenSelect.appendChild(option);
          });
        })
        .catch(error => console.error("Gagal mengambil data komponen:", error));
    }
    document.getElementById("komponenProduksi").addEventListener("show.bs.modal", loadKomponenOptions);
    document.getElementById("btn-post-komponen").addEventListener("click", function() {


      const btn = this;
      btn.disabled = true;
      btn.textContent = "Loading...";

      const komponen_id = document.getElementById("komponenSelect").value;
      const nominal_komponen = document.getElementById("nominal_komponen").value;
      const produk_temp_id = document.getElementById("produk_temp_id").value;
      fetch("/post_ajx/komponen_produk", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
          },
          body: JSON.stringify({
            komponen_id,
            nominal_komponen,
            produk_temp_id
          })
        })
        .then(response => {
          if (!response.ok) {
            return response.json().then(err => Promise.reject(err));
          }
          return response.json();
        })
        .then(data => {
          document.getElementById("nominal_komponen").value = "";
          document.getElementById("komponenSelect").selectedIndex = 0;
          $('#komponenProduksi').modal('hide');
          loadTableBahan();
          loadTableKomponen();
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: data.message,
            timer: 2500,
            showConfirmButton: true
          });
        })
        .catch(error => {
          loadTableBahan();
          loadTableKomponen();
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: error.message || "Terjadi kesalahan saat menyimpan data",
            showConfirmButton: true
          });
        })
        .finally(() => {
          btn.disabled = false;
          btn.textContent = "Simpan";
        });

    });

    function loadTableKomponen() {
      const produk_temp_id = document.getElementById("produk_temp_id").value;
      const totalHargaEl = document.getElementById("total_harga_bahan");

      fetch(`/get_ajx/komponen_produk/${produk_temp_id}`)
        .then(response => response.json())
        .then(data => {
          const tbody = document.querySelector("#data-table-komponen-produksi tbody");
          tbody.innerHTML = "";

          let totalHargaKomponen = 0;

          if (data.length === 0) {
            const row = document.createElement("tr");
            row.innerHTML = `<td colspan="5" class="text-center">Belum ada komponen</td>`;
            tbody.appendChild(row);
            return;
          }

          data.forEach((item, index) => {
            const nominal_komponen = Number(item.nominal_komponen || 0);
            totalHargaKomponen += nominal_komponen;

            const row = document.createElement("tr");
            row.innerHTML = `
          <td>${index + 1}</td>
          <td>${item.nama_komponen || '—'}</td>
          <td>Rp ${nominal_komponen.toLocaleString()}</td>
          <td>
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusKomponen('${item.id}')">Hapus</button>
          </td>
        `;
            tbody.appendChild(row);
          });

          const totalBahanStr = totalHargaEl.value.replace(/[^\d]/g, '');
          const totalBahan = Number(totalBahanStr) || 0;

          const grandTotal = totalBahan + totalHargaKomponen;
          totalHargaEl.value = `Rp ${grandTotal.toLocaleString("id-ID")}`;
        })
        .catch(error => console.error("Gagal mengambil data komponen:", error));
    }


    function hapusKomponen(id) {
      Swal.fire({
        title: 'Hapus Komponen?',
        text: 'Data komponen produksi ini akan dihapus.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          fetch(`/del_ajx/komponen_produk/${id}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content")
              }
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                loadTableKomponen();
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data berhasil dihapus',
                  timer: 2000,
                  showConfirmButton: true
                });
              }
            })
            .catch(error => console.error('Gagal menghapus:', error));
        }
      });
    }
    // ======================
    function cleanRupiah(value) {
      return parseFloat(value.replace(/[^0-9]/g, '')) || 0;
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

      return split[1] !== undefined ? 'Rp. ' + rupiah + ',' + split[1] : 'Rp. ' + rupiah;
    }



    function hitungSatuan() {
      const jumlah = parseFloat(document.getElementById('jumlah_produk').value) || 0;
      const hargaBeli = cleanRupiah(document.getElementById('total_harga_bahan').value);
      const hargaJual = cleanRupiah(document.getElementById('harga_jual').value);

      const hargaBeliSatuan = jumlah > 0 ? (hargaBeli / jumlah) : 0;
      const hargaJualSatuan = jumlah > 0 ? (hargaJual / jumlah) : 0;

      document.getElementById('harga_beli_satuan').value = formatRupiah(hargaBeliSatuan.toFixed(0));
      document.getElementById('harga_jual_satuan').value = formatRupiah(hargaJualSatuan.toFixed(0));
    }



    // Trigger setiap kali input berubah
    document.getElementById('jumlah_produk').addEventListener('input', hitungSatuan);
    document.getElementById('total_harga_bahan').addEventListener('input', hitungSatuan);
    document.getElementById('harga_jual').addEventListener('input', hitungSatuan);
  </script>
@endsection
