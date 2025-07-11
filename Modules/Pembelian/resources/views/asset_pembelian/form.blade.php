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
          <div>
            <form action="{{ route('pembelian_asset.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-2">
                    <label for="nama_asset">Nama Asset</label>
                    <input type="text" class="form-control" name="nama_asset" id="nama_asset" placeholder="Nama Asset"
                      required value="{{ old('nama_asset', $data->nama_asset ?? '') }}">
                  </div>
                  <div class="form-group mb-2">
                    <label for="kode">Kode Asset</label>
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Asset"
                      value="{{ old('kode', $data->kode ?? '') }}">
                  </div>
                  <div class="form-group mb-2">
                    <label for="harga_beli_satuan">Harga beli satuan</label>
                    <input type="text" class="form-control format-rupiah" name="harga_beli_satuan"
                      id="harga_beli_satuan" placeholder="Rp....." required
                      value="{{ old('harga_beli_satuan', $data->harga_beli_satuan ?? '') }}">
                  </div>
                  <div class="form-group mb-2">
                    <label for="qty">Kuantitas</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="qty" id="qty" placeholder="Kuantitas"
                        required value="{{ old('qty', $data->qty ?? '') }}"> <select class="form-control" name="satuan_id"
                        id="satuan_id" required>
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
                    <label for="total_harga_beli">Total Harga Beli</label>
                    <input readonly type="text" class="form-control format-rupiah" name="total_harga_beli"
                      id="total_harga_beli" placeholder="Rp . . . " required
                      value="{{ old('total_harga_beli', $data->total_harga_beli ?? '') }}">
                  </div>

                </div>


                <div class="col-md-6">


                  <div class="form-group mb-2">
                    <label for="total_dibayar">Total Dibayar</label>
                    <input type="text" class="form-control format-rupiah" name="total_dibayar" id="total_dibayar"
                      placeholder="Rp . . . " required value="{{ old('total_dibayar', $data->total_dibayar ?? '') }}">
                    <div id="totalDibayarFeedback" class="invalid-feedback"></div>
                  </div>

                  <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_hutang" id="is_hutang" value="1"
                      role="switch" {{ old('is_hutang', $data->is_hutang ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_hutang">Jadikan Hutang</label>
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
                    <label for="supplier_id">Supplier</label>
                    <select class="form-control" name="supplier_id" id="supplier_id" required>
                      <option value="">-- Pilih Supplier --</option>
                      @foreach ($data_supplier as $supplier)
                        <option value="{{ $supplier->id }}"
                          {{ old('supplier_id', $data->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>
                          {{ $supplier->nama_supplier }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-2">
                    <label for="desc">Deskripsi</label>
                    <textarea name="desc" id="desc" cols="30" rows="5" class="form-control">{{ old('desc', $data->desc ?? '') }}</textarea>
                  </div>
                </div>
              </div>



              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                <a href="{{ route('pembelian_asset.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    document.addEventListener("DOMContentLoaded", function() {

      function parseRupiah(str) {
        return parseInt(str.replace(/[^0-9]/g, '')) || 0;
      }

      function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      const hargaSatuanInput = document.getElementById('harga_beli_satuan');
      const qtyInput = document.getElementById('qty');
      const totalHargaBeliInput = document.getElementById('total_harga_beli');
      const dibayarInput = document.getElementById('total_dibayar');
      const hutangInput = document.getElementById('total_hutang');
      const isHutangCheckbox = document.getElementById('is_hutang');
      const hutangSection = document.getElementById('hutang_section');
      const dibayarFeedback = document.getElementById('totalDibayarFeedback');
      const form = document.querySelector('form');

      // Hitung total harga beli berdasarkan harga satuan * qty
      function hitungTotalHargaBeli() {
        const hargaSatuan = parseRupiah(hargaSatuanInput.value);
        const qty = parseRupiah(qtyInput.value);
        const total = hargaSatuan * qty;
        totalHargaBeliInput.value = total > 0 ? formatRupiah(total) : '';
        hitungHutang();
      }

      // Hitung hutang jika ada sisa pembayaran
      function hitungHutang() {
        const totalHarga = parseRupiah(totalHargaBeliInput.value);
        const totalDibayar = parseRupiah(dibayarInput.value);

        if (totalDibayar < totalHarga) {
          const sisa = totalHarga - totalDibayar;
          hutangInput.value = formatRupiah(sisa);
          if (isHutangCheckbox.checked) {
            hutangSection.style.display = "block";
          }
        } else {
          hutangInput.value = formatRupiah(0);
          hutangSection.style.display = "none";
          isHutangCheckbox.checked = false;
        }
      }

      // Validasi input total dibayar
      function validateDibayar() {
        const totalHarga = parseRupiah(totalHargaBeliInput.value);
        const totalDibayar = parseRupiah(dibayarInput.value);

        if (totalDibayar > totalHarga) {
          dibayarInput.classList.add('is-invalid');
          dibayarFeedback.textContent = "Total dibayar tidak boleh melebihi total harga beli.";
          return false;
        }

        if (totalDibayar < totalHarga && !isHutangCheckbox.checked) {
          dibayarInput.classList.add('is-invalid');
          dibayarFeedback.textContent = "Pembayaran kurang, centang 'Jadikan Hutang' untuk melanjutkan.";
          return false;
        }

        // Jika valid
        dibayarInput.classList.remove('is-invalid');
        dibayarFeedback.textContent = "";
        return true;
      }

      // Event Listener Input
      hargaSatuanInput.addEventListener('input', function() {
        hitungTotalHargaBeli();
        validateDibayar();
      });

      qtyInput.addEventListener('input', function() {
        hitungTotalHargaBeli();
        validateDibayar();
      });

      dibayarInput.addEventListener('input', function() {
        hitungHutang();
        validateDibayar();
      });

      isHutangCheckbox.addEventListener('change', function() {
        if (this.checked && parseRupiah(hutangInput.value) > 0) {
          hutangSection.style.display = "block";
        } else {
          hutangSection.style.display = "none";
        }
        validateDibayar();
      });

      // Submit form dengan validasi akhir
      form.addEventListener('submit', function(e) {
        const totalHarga = parseRupiah(totalHargaBeliInput.value);
        const totalDibayar = parseRupiah(dibayarInput.value);
        const isHutang = isHutangCheckbox.checked;

        // Validasi nominal dibayar > total
        if (totalDibayar > totalHarga) {
          dibayarInput.classList.add('is-invalid');
          dibayarFeedback.textContent = "Total dibayar tidak boleh melebihi total harga beli.";
          e.preventDefault();
          return;
        }

        // Validasi nominal dibayar < total dan checkbox hutang harus dicentang
        if (totalDibayar < totalHarga && !isHutang) {
          dibayarInput.classList.add('is-invalid');
          dibayarFeedback.textContent = "Pembayaran kurang, centang 'Jadikan Hutang' untuk melanjutkan.";
          e.preventDefault();
          return;
        }

        // Kalau valid
        dibayarInput.classList.remove('is-invalid');
        dibayarFeedback.textContent = "";

        // Format nilai ke angka saja sebelum submit
        hargaSatuanInput.value = parseRupiah(hargaSatuanInput.value);
        qtyInput.value = parseRupiah(qtyInput.value);
        totalHargaBeliInput.value = parseRupiah(totalHargaBeliInput.value);
        dibayarInput.value = parseRupiah(dibayarInput.value);
        hutangInput.value = parseRupiah(hutangInput.value);
      });


      // Inisialisasi awal
      hitungTotalHargaBeli();
      hitungHutang();
      validateDibayar();

    });
  </script>
@endsection
