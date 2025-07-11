@extends('kasir::layouts.master')
@php
  use App\Helpers\Fungsi;
  use Carbon\Carbon;
  $getWebName = App\Helpers\GetSettings::getNamaWeb();
  $getLogo = App\Helpers\GetSettings::getLogo();
@endphp
@section('content')
  <!-- BEGIN pos -->
  <div class="pos pos-with-menu pos-with-sidebar" id="pos">
    <!-- BEGIN pos-menu -->
    <div class="pos-menu">
      <div class="logo">
        <a href="/">
          {{-- <div class="logo-img"><i class="fa fa-bowl-rice"></i></div> --}}
          <div class="logo-img"><img src="{{ $getLogo }}" alt=""></div>
          <div class="flex items-center justify-center h-full">
            <div class="logo-text text-center">{{ $getWebName }}</div>
          </div>

        </a>
      </div>
      <div class="nav-container">
        <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
          <ul id="kategori-list" class="nav nav-tabs nav-pills flex-column">
          </ul>

        </div>
      </div>
    </div>
    <!-- END pos-menu -->

    <!-- BEGIN pos-content -->
    <div class="pos-content" style="height: 100vh; display: flex; flex-direction: column;">
      <div class="input-group mb-4 mt-4" style="position: sticky; top: 0;  z-index: 10; padding-top: 10px;">
        <input type="text" id="search_produk" placeholder="Search..." class="form-control">
        {{-- <button class="btn btn-success">Scan &emsp;<i class="fa-solid fa-qrcode"></i></button> --}}
      </div>
      <div class="pos-content-container" style="flex-grow: 1; overflow-y: auto;">
        <div class="product-row">
        </div>
      </div>
    </div>

    <!-- END pos-content -->

    <!-- BEGIN #modalProduk -->
    <div class="modal modal-pos fade" id="modalProduk">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body p-0">
            <a href="#" data-bs-dismiss="modal" class="btn-close position-absolute top-0 end-0 m-4"></a>
            <div class="modal-pos-product d-flex">
              <div class="modal-pos-product-img">
                <div class="img" style="background-image: url('/img/produk.png')"></div>
              </div>
              <div class="modal-pos-product-info flex-grow-1 p-4">
                <div class="fs-4 fw-bold nama-produk mb-4"></div>
                <div class="fs-6 text-body text-opacity-50 mb-2">Kategori Produk:
                  <span class="kategori-produk"></span>
                </div>
                <div class="fs-5 fw-bolder mb-1">Harga Satuan: <span class="harga-satuan"></span></div>
                <div class="fs-3 fw-bolder mb-3 ">Total :<span class="total-harga"></span></div>
                <div class="option-row">
                  <div class="d-flex mb-3 align-items-center">
                    <a href="#" class="btn btn-default btn-minus"><i class="fa fa-minus"></i></a>
                    <input type="text"
                      class="form-control w-30px fw-bold fs-5 px-0 mx-2 text-center border-0 qty-input" name="qty"
                      value="1">
                    <a href="#" class="btn btn-default btn-plus"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
                <hr />
                <div class="fw-bold fs-6">Deskripsi</div>
                <div class="mb-3 deskripsi-produk"></div>
                <div class="mb-3 produk-id" style="display: none"></div>
                <div class="mb-3 jumlah-sisa" style="display: none"></div>
                <hr />
                <div class="row gx-3">
                  <div class="col-4">
                    <a href="#" class="btn btn-default fs-14px rounded-3 fw-bold mb-0 d-block py-3"
                      data-bs-dismiss="modal">Cancel</a>
                  </div>
                  <div class="col-8">
                    <a href="#"
                      class="btn btn-theme fs-14px rounded-3 fw-bold d-flex justify-content-center align-items-center py-3 m-0"
                      id="btn-add-to-chart" data-bs-dismiss="modal">
                      Add to cart <i class="fa fa-plus ms-3"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END #modalProduk -->


    <!-- BEGIN pos-sidebar -->
    <div class="pos-sidebar" style="height: 100vh; display: flex; flex-direction: column;">
      <div class="pos-sidebar-header">
        <div class="back-btn">
          <button type="button" data-dismiss-class="pos-sidebar-mobile-toggled" data-target="#pos" class="btn border-0">
            <i class="fa fa-chevron-left"></i>
          </button>
        </div>
        <div class="icon"><i class="fa fa-plate-wheat"></i></div>
        <div class="title">{{ Fungsi::format_tgl(Carbon::today()) }}</div>
        <div class="order">{{ Auth::user()->username }}</div>
      </div>

      <div class="pos-sidebar-nav">
        <ul class="nav nav-tabs nav-fill">
          <li class="nav-item">
            <a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#newOrderTab">New Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#orderHistoryTab">Order History</a>
          </li>
        </ul>
      </div>

      <div class="pos-sidebar-body tab-content" style="flex-grow: 1; overflow-y: auto; overflow-x: hidden;">
        <div class="tab-pane fade h-90 show active" id="newOrderTab">
          <div class="pos-table">
          </div>
        </div>
        <div class="tab-pane fade h-100" id="orderHistoryTab">
          <div class="pos-table p-2">

            @foreach ($data_order_hari_ini as $item)
              <a href="javascript:void(0)" onclick="printPage('{{ route('kasir.nota', $item->id) }}')"
                style="text-decoration: none; color: inherit;">
                <div
                  class="card mb-2 p-2 m-1 border shadow-sm {{ ($item->nominal_kasbon ?? 0) != 0 ? 'bg-warning text-dark' : '' }}">
                  <div style="display: flex; justify-content: space-between;"><strong>Nominal Belanja</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_belanja ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Nominal Dibayar</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_dibayar ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Kembalian</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_kembalian ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Kasbon</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_kasbon ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Nama Konsumen</strong> <span>:
                      {{ $item->konsumen->nama_konsumen ?? '-' }}</span></div>
                </div>
              </a>

              {{-- testing print --}}
              {{-- <a href="{{ route('kasir.nota', $item->id) }}" style="text-decoration: none; color: inherit;">
                <div
                  class="card mb-2 p-2 m-1 border shadow-sm {{ ($item->nominal_kasbon ?? 0) != 0 ? 'bg-warning text-dark' : '' }}">
                  <div style="display: flex; justify-content: space-between;"><strong>Nominal Belanja</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_belanja ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Nominal Dibayar</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_dibayar ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Kembalian</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_kembalian ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Kasbon</strong> <span>:
                      {{ Fungsi::rupiah($item->nominal_kasbon ?? 0) }}</span></div>
                  <div style="display: flex; justify-content: space-between;"><strong>Nama Konsumen</strong> <span>:
                      {{ $item->konsumen->nama_konsumen ?? '-' }}</span></div>
                </div>
              </a> --}}
            @endforeach
          </div>
        </div>
      </div>

      <div class="pos-sidebar-footer border-top pt-3 px-3 mb-2">
        <div class="d-flex align-items-center mb-2">
          <div>Total</div>
          <div class="flex-1 text-end h4 mb-0" id="total-belanja"></div>
          <div class="flex-1 text-end h4 mb-0 d-none" id="total-belanja-raw"></div>
        </div>
        <div class="d-flex align-items-center mt-3">
          <a href="#" id="btn-submit-order" class="btn btn-theme rounded-3 text-center flex-grow-1">
            <i class="fa fa-shopping-cart d-block fs-18px my-1"></i> Submit Order
          </a>
        </div>
      </div>
    </div>

  </div>
  <!-- END pos-sidebar -->


  <!-- BEGIN #modalOrder -->
  <div class="modal modal-pos fade" id="modalOrder" tabindex="-1">
    <div class="modal-dialog modal-lg modal-center">
      <div class="modal-content">
        <div class="modal-body p-0">
          <a href="#" data-bs-dismiss="modal" class="btn-close position-absolute top-0 end-0 m-4"></a>
          <div class="modal-pos-product d-flex flex-column p-4">
            <div class="fs-4 fw-bolder mb-3">Konfirmasi Pesanan</div>
            <div class="fs-5 fw-bolder mb-3">
              Total Belanja: <span id="total-belanja-modalOrder" class="text-theme"></span>
              <span id="total-belanja-raw-modalOrder" class="text-theme" style="display: none"></span>
            </div>
            <div class="d-flex justify-content-between gap-3 mb-4">
              <div class="flex-fill">
                <label class="form-label">Nominal Dibayar</label>
                <input type="text" class="form-control" id="nominal-dibayar" placeholder="Masukkan nominal">
              </div>
              <div class="flex-fill">
                <label class="form-label">Kembalian</label>
                <input type="text" class="form-control" id="nominal-kembalian" readonly
                  placeholder="Masukkan nominal">
              </div>
            </div>
            <div class="mb-3 d-flex gap-3 justify-content-center" id="uang-pas"></div>
            <div class="mb-3 d-flex gap-3 justify-content-center ">
              <a href="#" class="btn btn-sm btn-info" data-nominal="500"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 500</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="1000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 1.000</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="2000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 2.000</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="5000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 5.000</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="10000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 10.000</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="20000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 20.000</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="50000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 50.000</a>
              <a href="#" class="btn btn-sm btn-info" data-nominal="100000"><i
                  class="fa-solid fa-money-bill-1-wave"></i> 100.000</a>
            </div>
            <hr />

            {{-- <div class="form-gorup">
              <label for="" class="form-label">Jenis Pembayaran</label>
              <div class="mb-3 d-flex gap-3 justify-content-center ">
                <a href="#" class="btn btn-sm btn-info" data-jenis-pembayaran="Cash"><i
                    class="fa-solid fa-money-bill-1-wave"></i> Cash</a>
                <a href="#" class="btn btn-sm btn-info" data-jenis-pembayaran="Transfer Bank"><i
                    class="fa-solid fa-money-bill-1-wave"></i> Transfer Bank</a>
                <a href="#" class="btn btn-sm btn-info" data-jenis-pembayaran="E-Wallet"><i
                    class="fa-solid fa-money-bill-1-wave"></i> E-Wallet</a>
              </div>
            </div> --}}

            <hr />
            <div class="form-check form-switch mb-3">
              <input class="form-check-input" type="checkbox" role="switch" id="is_kasbon">
              <label class="form-check-label" for="is_kasbon">Kasbon</label>
            </div>
            <div class="is_kason" style="display: none;">
              <div class="d-flex justify-content-between gap-4 mb-4">
                <div class="flex-fill me-3">
                  <label class="form-label">Nama Konsumen</label>
                  <select class="form-select" name="id_konsumen" id="konsumen-select2" style="width: 100%;">
                    <option value="">- Pilih Konsumen -</option>
                  </select>
                </div>
                <div class="flex-fill ms-3">
                  <label class="form-label">Nominal Kasbon</label>
                  <input type="text" class="form-control" id="nominal-kasbon" readonly
                    placeholder="Masukkan nominal">
                </div>
              </div>
              <div class="mb-3">
                <a href="#" class="btn btn-sm btn-info" id="btn-konsumen-baru">+ Konsumen Baru</a>
              </div>
            </div>
            <hr />
            <div class="row gx-3">
              <div class="col-4">
                <a href="#" class="btn btn-default fs-14px rounded-3 fw-bold d-block py-3"
                  data-bs-dismiss="modal">Cancel</a>
              </div>
              <div class="col-8">
                <a href="#"
                  class="btn btn-theme fs-14px rounded-3 fw-bold d-flex justify-content-center align-items-center py-3 m-0"
                  id="btn-bayar">
                  Bayar </i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END #modalOrder -->



  <!-- BEGIN #modalAddKonsumen -->
  <div class="modal modal-pos fade" id="modalAddKonsumen" tabindex="-1">
    <div class="modal-dialog modal-lg modal-center">
      <div class="modal-content">
        <div class="modal-body p-0">
          <a href="#" data-bs-dismiss="modal" class="btn-close position-absolute top-0 end-0 m-4"></a>
          <div class="modal-pos-product d-flex flex-column p-4">
            <div class="fs-4 fw-bold mb-3">Nama Konsumen Baru</div>
            <div class="mb-3">
              <label class="form-label">Nama Konsumen</label>
              <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen"
                placeholder="Nama Konsumen">
            </div>
            <div class="mb-3">
              <label class="form-label">Kontak</label>
              <input type="text" class="form-control" name="kontak_konsumen" id="kontak" placeholder="+62....">
            </div>
            <hr />
            <div class="row gx-3">
              <div class="col-4">
                <a href="#" class="btn btn-default fs-14px rounded-3 fw-bold d-block py-3"
                  data-bs-dismiss="modal">Cancel</a>
              </div>
              <div class="col-8">
                <a href="#"
                  class="btn btn-theme fs-14px rounded-3 fw-bold d-flex justify-content-center align-items-center py-3 m-0"
                  id="btn-simpan-konsumen">
                  Simpan <i class="fa fa-plus ms-3"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <audio id="beep-audio" src="{{ asset('audio/beep.wav') }}" preload="auto"></audio>
  </div>
  <!-- END pos -->

  <!-- print -->
  <iframe id="printFrame" style="display:none;"></iframe>
  <script>
    function printPage(url) {
      var iframe = document.getElementById('printFrame');
      iframe.src = url;
      iframe.onload = function() {
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
      };
    }
  </script>
  <!-- print -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.getElementById("search_produk");
      const kasbonSwitch = document.getElementById('is_kasbon');
      const kasbonFields = document.querySelector('.is_kason');
      const btnKonsumenBaru = document.getElementById('btn-konsumen-baru');

      document.getElementById('btn-submit-order').addEventListener('click', function(e) {
        e.preventDefault();
        submitOrder();
      });

      document.getElementById('btn-bayar').addEventListener('click', function(e) {
        e.preventDefault();
        handleTransaksi();
      });

      function getAllKategori() {
        fetch('/kasir/get_ajx_kategori')
          .then(response => response.json())
          .then(data => {
            const container = document.getElementById("kategori-list");
            container.innerHTML = '';

            const allItem = `
              <li class="nav-item">
                <a class="nav-link active" href="#" data-filter="all">
                  <div class="nav-icon"><i class="fa fa-fw fa-utensils"></i></div>
                  <div class="nav-text">All Item</div>
                </a>
              </li>
            `;
            container.innerHTML += allItem;

            data.forEach(kategori => {
              const li = document.createElement("li");
              li.className = "nav-item";
              li.innerHTML = `
                <a class="nav-link" href="#" data-filter="${kategori.id}">
                  <div class="nav-icon">${kategori.icon}</div>
                  <div class="nav-text">${kategori.nama_kategori}</div>
                </a>
              `;
              container.appendChild(li);
            });

            document.querySelectorAll('#kategori-list .nav-link').forEach(link => {
              link.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-filter');
                if (id === 'all') {
                  getAllProduk();
                } else {
                  getProdukByKategori(id);
                }
                if (searchInput) searchInput.value = "";
                document.querySelectorAll('#kategori-list .nav-link').forEach(el => el.classList.remove(
                  'active'));
                this.classList.add('active');
              });
            });
          })
          .catch(error => console.error("Gagal mengambil kategori:", error));
      }

      function getAllProduk() {
        fetch('/kasir/get_ajx_produk')
          .then(response => response.json())
          .then(data => {
            renderProduk(data);
            modalProduk();
          })
          .catch(error => console.error("Gagal mengambil produk:", error));
      }

      function getProdukByKategori(kategoriId) {
        fetch(`/kasir/get_ajx_produk_by_kategori/${kategoriId}`)
          .then(response => response.json())
          .then(data => {
            renderProduk(data);
            modalProduk();
          })
          .catch(error => console.error("Gagal mengambil produk kategori:", error));
      }

      function searchProduk(keyword) {
        fetch(`/kasir/search_produk?q=${encodeURIComponent(keyword)}`)
          .then(response => response.json())
          .then(data => {
            renderProduk(data);
            modalProduk();
          })
          .catch(error => console.error("Gagal mencari produk:", error));
      }

      function debounce(func, delay) {
        let timeout;
        return function(...args) {
          clearTimeout(timeout);
          timeout = setTimeout(() => func.apply(this, args), delay);
        };
      }

      if (searchInput) {
        searchInput.addEventListener("input", debounce(function() {
          const keyword = this.value.trim();
          if (keyword === "") {
            getAllProduk();
          } else {
            searchProduk(keyword);
          }
        }, 300));
      }
      kasbonSwitch.addEventListener('change', toggleKasbonFields);

      function renderProduk(data) {
        const container = document.querySelector(".product-row");
        container.innerHTML = '';

        if (data.length === 0) {
          container.innerHTML =
            `<div class="text-muted justify-center text-center mt-3 fs-2">Tidak ada produk.</div>`;
          return;
        }

        data.forEach(produk => {
          const imgPath = produk.img ? produk.img : '/img/produk.png';
          const produkHTML = `
            <div class="product-container" data-type="meat">
              <a href="#" class="product"
                data-bs-toggle="modal"
                data-bs-target="#modalProduk"
                data-id="${produk.id}"
                data-nama="${produk.nama_produk}"
                data-img="${imgPath}"
                data-desc="${produk.desc ?? '-'}"
                data-harga="${produk.harga_jual_satuan}"
                data-jumlah="${produk.jumlah_produk ?? '0'}"
                data-kategori="${produk.kategori?.nama_kategori ?? '-'}">
                <div class="img" style="background-image: url('${imgPath}')"></div>
                <div class="text">
                  <div class="title">${produk.nama_produk}</div>
                  <div class="price">Rp${Number(produk.harga_jual_satuan).toLocaleString('id-ID')}</div>
                  <div class="jumlah-produk">Sisa : ${produk.jumlah_produk ?? 0}</div>
                </div>
              </a>
            </div>
          `;
          container.innerHTML += produkHTML;
        });
      }

      function modalProduk() {
        document.querySelectorAll('.product').forEach(item => {
          item.addEventListener('click', function() {
            const modal = document.querySelector('#modalProduk');

            const nama = this.dataset.nama || '';
            const img = this.dataset.img || '/img/produk.png';
            const desc = this.dataset.desc || 'Tidak ada deskripsi.';
            const harga = parseInt(this.dataset.harga || 0);
            const jumlah = parseInt(this.dataset.jumlah || 0);
            const kategori = this.dataset.kategori || '';
            const produkId = this.dataset.id;

            modal.querySelector('.img').style.backgroundImage = `url('${img}')`;
            modal.querySelector('.nama-produk').textContent = nama;
            modal.querySelector('.kategori-produk').textContent = kategori;
            modal.querySelector('.harga-satuan').textContent = `Rp ${harga.toLocaleString('id-ID')}`;
            modal.querySelector('.total-harga').textContent = `Rp ${harga.toLocaleString('id-ID')}`;
            modal.querySelector('.deskripsi-produk').innerHTML = `${desc}`;
            modal.querySelector('.produk-id').innerHTML = `${produkId}`;
            modal.querySelector('.jumlah-sisa').innerHTML = `${jumlah}`;

            const qtyInput = modal.querySelector('input[name="qty"]');
            const totalHargaEl = modal.querySelector('.total-harga');

            qtyInput.value = 1;

            const updateTotal = () => {
              let qty = parseInt(qtyInput.value);
              if (isNaN(qty) || qty < 1) {
                qty = 1;
                qtyInput.value = qty;
              }
              const total = qty * harga;
              totalHargaEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            };

            const btnMinus = modal.querySelector('.btn-minus');
            const btnPlus = modal.querySelector('.btn-plus');

            const newBtnMinus = btnMinus.cloneNode(true);
            const newBtnPlus = btnPlus.cloneNode(true);

            btnMinus.replaceWith(newBtnMinus);
            btnPlus.replaceWith(newBtnPlus);

            newBtnMinus.addEventListener('click', function(e) {
              e.preventDefault();
              let qty = parseInt(qtyInput.value);
              if (qty > 1) {
                qty--;
                qtyInput.value = qty;
                updateTotal();
              }
            });

            newBtnPlus.addEventListener('click', function(e) {
              e.preventDefault();
              let qty = parseInt(qtyInput.value);
              qty++;
              qtyInput.value = qty;
              updateTotal();
            });

            qtyInput.addEventListener('input', updateTotal);

            updateTotal();
          });
        });
      }

      function extractNumber(text) {
        const digitsOnly = text.replace(/[^\d]/g, '');
        return parseInt(digitsOnly, 10) || 0;
      }

      function addToChart() {

        const audio = document.getElementById('beep-audio');
        audio.volume = 0.3;
        audio.play();


        const produkIdEl = document.querySelector('.produk-id');
        const deskripsiEl = document.querySelector('.deskripsi-produk');
        const namaProdukEl = document.querySelector('.nama-produk');
        const kategoriProdukEl = document.querySelector('.kategori-produk');
        const hargaSatuanEl = document.querySelector('.harga-satuan');
        const totalHargaEl = document.querySelector('.total-harga');
        const qtyInputEl = document.querySelector('.qty-input');
        const jumlahProdukEl = document.querySelector('.jumlah-sisa');
        const imgEl = document.querySelector('#modalProduk .img');


        const hargaSatuanText = hargaSatuanEl?.innerText.trim() || '-';
        const totalHargaText = totalHargaEl?.innerText.trim() || '-';

        const hargaSatuanValue = extractNumber(hargaSatuanText);
        const totalHargaValue = extractNumber(totalHargaText);
        const produkIdText = produkIdEl?.innerText.trim() || '-';
        const deskripsiText = deskripsiEl?.innerText.trim() || '-';
        const namaProdukText = namaProdukEl?.innerText.trim() || '-';
        const kategoriProdukText = kategoriProdukEl?.innerText.trim() || '-';
        const qtyValue = parseInt(qtyInputEl?.value || '1', 10);
        const jumlahProdukText = jumlahProdukEl?.innerText.trim() || '-';

        let imgText = '-';
        if (imgEl) {
          const bgStyle = window.getComputedStyle(imgEl).getPropertyValue('background-image');
          const match = bgStyle.match(/url\(["']?(.*?)["']?\)/);
          if (match) {
            const fullUrl = match[1];
            const locationOrigin = window.location.origin;
            imgText = fullUrl.startsWith(locationOrigin) ? fullUrl.replace(locationOrigin, '') : fullUrl;
          } else {
            imgText = '-';
          }
        }

        const cartItem = {
          produkId: produkIdText,
          namaProduk: namaProdukText,
          deskripsi: deskripsiText,
          kategori: kategoriProdukText,
          hargaSatuan: hargaSatuanValue,
          totalHarga: hargaSatuanValue * qtyValue,
          qty: qtyValue,
          stok: extractNumber(jumlahProdukText),
          img: imgText
        };

        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const existingIndex = cart.findIndex(p => p.produkId === cartItem.produkId);
        if (existingIndex !== -1) {
          cart[existingIndex].qty += cartItem.qty;
          cart[existingIndex].totalHarga = cart[existingIndex].qty * cart[existingIndex].hargaSatuan;
        } else {
          cart.push(cartItem);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        loadOrderChart();
      }

      const btnAddToChart = document.getElementById('btn-add-to-chart');
      if (btnAddToChart) {
        btnAddToChart.addEventListener('click', function(event) {
          event.preventDefault();

          const qtyInputEl = document.querySelector('.qty-input');
          const jumlahProdukEl = document.querySelector('.jumlah-sisa');

          const qty = parseInt(qtyInputEl?.value || '0', 10);
          const stok = extractNumber(jumlahProdukEl?.innerText.trim() || '0');

          if (qty > stok) {
            Swal.fire({
              icon: 'Warning',
              title: 'Oops...',
              text: 'Jumlah melebihi stok yang tersedia!',
              timer: 6500,
              showConfirmButton: false
            });
            return;
          }

          addToChart();
          loadOrderChart();
        });
      }

      function clearCartOnFirstLoad() {
        localStorage.removeItem('cart');
      }

      function loadOrderChart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const container = document.querySelector('.pos-table');
        container.innerHTML = '';

        cart.forEach((item, index) => {
          const row = document.createElement('div');
          row.classList.add('row', 'pos-table-row');
          row.setAttribute('data-index', index);

          row.innerHTML = `
        <div class="col-9">
          <div class="pos-product-thumb">
            <div class="img" style="background-image: url(${item.img})"></div>
            <div class="info">
              <div class="title">${item.namaProduk}</div>
              <div class="desc">Rp ${item.hargaSatuan.toLocaleString()}</div>
              <div class="input-group qty">
                <div class="input-group-append">
                  <a href="#" class="btn btn-default btn-minus" data-index="${index}"><i class="fa fa-minus"></i></a>
                </div>
                <input type="text" class="form-control" readonly value="${item.qty}" />
                <div class="input-group-prepend">
                  <a href="#" class="btn btn-default btn-plus" data-index="${index}"><i class="fa fa-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 total-price">
          Rp ${(item.qty * item.hargaSatuan).toLocaleString()}
          <a href="#" class="btn btn-danger btn-sm btn-delete" data-index="${index}" style="margin-left: 5px;"><i class="fa fa-trash"></i></a>
        </div>
      `;

          container.appendChild(row);
        });

        setupCartActions();
        updateTotal();
      }

      function setupCartActions() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        document.querySelectorAll('.btn-plus').forEach(btn => {
          btn.addEventListener('click', e => {
            e.preventDefault();
            const index = +btn.dataset.index;
            if (cart[index].qty < cart[index].stok) {
              cart[index].qty++;
              cart[index].totalHarga = cart[index].qty * cart[index].hargaSatuan;
              localStorage.setItem('cart', JSON.stringify(cart));
              loadOrderChart();
            } else {
              Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Jumlah melebihi stok yang tersedia!',
                timer: 3000,
                showConfirmButton: false
              });
            }
          });
        });

        document.querySelectorAll('.btn-minus').forEach(btn => {
          btn.addEventListener('click', e => {
            e.preventDefault();
            const index = +btn.dataset.index;
            if (cart[index].qty > 1) {
              cart[index].qty--;
              cart[index].totalHarga = cart[index].qty * cart[index].hargaSatuan;
              localStorage.setItem('cart', JSON.stringify(cart));
              loadOrderChart();
            }
          });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
          btn.addEventListener('click', e => {
            e.preventDefault();
            const index = +btn.dataset.index;
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadOrderChart();
          });
        });
      }

      function updateTotal() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let total = 0;

        cart.forEach(item => {
          total += item.qty * item.hargaSatuan;
        });

        const totalOrderRawEl = document.getElementById('total-belanja-raw');
        const totalEl = document.getElementById('total-belanja');
        if (totalEl) {
          totalOrderRawEl.innerText = total;
          totalEl.innerText = 'Rp ' + total.toLocaleString();
        }
      }

      function submitOrder() {
        const totalBelanja = document.getElementById('total-belanja').textContent;
        const totalBelanjaRaw = document.getElementById('total-belanja-raw').textContent;
        document.getElementById('total-belanja-modalOrder').textContent = totalBelanja;
        document.getElementById('total-belanja-raw-modalOrder').textContent = totalBelanjaRaw;
        const modal = new bootstrap.Modal(document.getElementById('modalOrder'));
        hitungKembalianDanKasbon();
        modal.show();
      }

      function toggleKasbonFields() {
        const kasbonFields = document.querySelector('.is_kason');
        const kasbonSwitch = document.getElementById('is_kasbon');

        if (kasbonSwitch.checked) {
          kasbonFields.style.display = 'block';

          fetch('/kasir/get_ajx_konsumen')
            .then(response => response.json())
            .then(data => {
              const konsumenSelect = $('#konsumen-select2');
              konsumenSelect.empty().append('<option value="">- Pilih Konsumen -</option>');

              data.forEach(item => {
                const option = new Option(item.nama_konsumen, item.id, false, false);
                konsumenSelect.append(option);
              });

              konsumenSelect.trigger('change');
            });
        } else {
          kasbonFields.style.display = 'none';
        }
      }

      btnKonsumenBaru.addEventListener('click', function(e) {
        e.preventDefault();
        const modalOrderEl = document.getElementById('modalOrder');
        const modalOrder = bootstrap.Modal.getInstance(modalOrderEl) || new bootstrap.Modal(modalOrderEl);
        modalOrder.hide();
        const modalAddKonsumen = new bootstrap.Modal(document.getElementById('modalAddKonsumen'));
        modalAddKonsumen.show();
      });

      function handleSimpanKonsumen() {
        const nama = document.getElementById('nama_konsumen').value.trim();
        const kontak = document.getElementById('kontak').value.trim();

        // Validasi
        if (nama === '') {
          Swal.fire({
            icon: 'warning',
            title: 'Oops..',
            text: 'Nama konsumen wajib diisi!',
            timer: 3000,
            showConfirmButton: false
          });
          return;
        }

        fetch('/kasir/konsumen/store', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
              nama_konsumen: nama,
              kontak_konsumen: kontak
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              const modalAddKonsumen = bootstrap.Modal.getInstance(document.getElementById('modalAddKonsumen'));
              const modalOrder = new bootstrap.Modal(document.getElementById('modalOrder'));
              modalAddKonsumen.hide();
              modalOrder.show();
              toggleKasbonFields();

              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Konsumen berhasil ditambahkan!',
                timer: 3000,
                showConfirmButton: false
              });
              return;
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: 'Gagal menambah data!',
                timer: 3000,
                showConfirmButton: false
              });
            }
          })
          .catch(error => {
            Swal.fire({
              icon: 'error',
              title: 'Oops..',
              text: 'Terjadi Kesalahan!',
              timer: 3000,
              showConfirmButton: false
            });
          });
      }

      const btnSimpanKonsumen = document.getElementById('btn-simpan-konsumen');
      if (btnSimpanKonsumen) {
        btnSimpanKonsumen.addEventListener('click', function(e) {
          e.preventDefault();
          handleSimpanKonsumen();
        });
      }

      function formatRupiah(angka) {
        let numberString = angka.toString().replace(/[^,\d]/g, ''),
          split = numberString.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
          let separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp. ' + rupiah;
      }

      function tambahNominal() {
        const inputNominal = document.getElementById('nominal-dibayar');
        const buttons = document.querySelectorAll('.btn-info[data-nominal]');
        buttons.forEach(btn => {
          btn.addEventListener('click', function(e) {
            e.preventDefault();
            const nominalTambah = parseInt(this.getAttribute('data-nominal'));
            let currentVal = inputNominal.value.replace(/[^,\d]/g, '');
            currentVal = currentVal ? parseInt(currentVal) : 0;
            let newVal = currentVal + nominalTambah;
            inputNominal.value = formatRupiah(newVal);
            hitungKembalianDanKasbon();
          });
        });

        inputNominal.addEventListener('input', function(e) {
          let cursorPosition = this.selectionStart;
          let originalLength = this.value.length;
          let value = this.value.replace(/[^,\d]/g, '');
          if (value) {
            this.value = formatRupiah(value);
          } else {
            this.value = '';
          }
          let newLength = this.value.length;
          cursorPosition = cursorPosition + (newLength - originalLength);
          this.setSelectionRange(cursorPosition, cursorPosition);
          hitungKembalianDanKasbon();
        });

        if (!inputNominal.value.trim()) {
          inputNominal.value = formatRupiah(0);
        }
      }

      function hitungKembalianDanKasbon() {
        const inputBayar = document.getElementById('nominal-dibayar').value.replace(/[^,\d]/g, '');
        const totalBelanjaText = document.getElementById('total-belanja-raw-modalOrder').textContent.replace(
          /[^,\d]/g, '');
        const inputKembalian = document.getElementById('nominal-kembalian');
        const inputKasbon = document.getElementById('nominal-kasbon');
        const inputUangPas = document.getElementById('uang-pas');

        const bayar = parseInt(inputBayar) || 0;
        const total = parseInt(totalBelanjaText) || 0;

        const kembalian = bayar - total;
        const kasbon = total - bayar;
        const uangPas = bayar === total;

        inputKembalian.value = kembalian > 0 ? formatRupiah(kembalian) : 'Rp. 0';
        inputKasbon.value = kasbon > 0 ? formatRupiah(kasbon) : 'Rp. 0';

        inputUangPas.innerHTML = uangPas ?
          `<div class="alert alert-success py-1 px-2 mb-0" role="alert">
          <i class="fa-solid fa-hand-holding-dollar me-1"></i> Uang pas, tidak ada kembalian 🎉
        </div>` :
          '';
      }

      function handleTransaksi() {
        const totalBelanja = document.getElementById('total-belanja-raw-modalOrder').textContent.replace(/[^,\d]/g,
          '');
        const nominalDibayar = document.getElementById('nominal-dibayar').value.replace(/[^,\d]/g, '');
        const kembalian = document.getElementById('nominal-kembalian').value.replace(/[^,\d]/g, '');
        const kasbon = document.getElementById('nominal-kasbon').value.replace(/[^,\d]/g, '');
        const isKasbon = document.getElementById('is_kasbon').checked;
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        if (cart.length === 0) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops..',
            text: 'Keranjang belanja kosong!',
            timer: 3000,
            showConfirmButton: false
          });
          return;
        }

        const idKonsumen = isKasbon ? document.getElementById('konsumen-select2').value : null;
        if (isKasbon && (!idKonsumen || idKonsumen === '')) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops..',
            text: 'Silakan pilih konsumen terlebih dahulu untuk kasbon!',
            timer: 3000,
            showConfirmButton: false
          });
          return;
        }

        if (!isKasbon && parseInt(nominalDibayar) < parseInt(totalBelanja)) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops..',
            text: 'Nominal dibayar tidak cukup!',
            timer: 3000,
            showConfirmButton: false
          });
          return;
        }

        fetch('/kasir/transaksi/store', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
              total_belanja: parseInt(totalBelanja),
              dibayar: parseInt(nominalDibayar),
              kembalian: parseInt(kembalian),
              kasbon: parseInt(kasbon),
              is_kasbon: isKasbon,
              id_konsumen: idKonsumen,
              cart: cart
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Transaksi Berhasil Disimpan!',
                timer: 3000,
                showConfirmButton: false
              });
              localStorage.removeItem('cart');
              setTimeout(() => {
                window.speechSynthesis.cancel();
                const suaraAkhir = new SpeechSynthesisUtterance(
                  'Terima kasih sudah berbelanja. Jangan lupa untuk berbelanja kembali.'
                );
                suaraAkhir.lang = 'id-ID';
                suaraAkhir.volume = 1;
                if (isKasbon === true) {
                  const suaraKasbon = new SpeechSynthesisUtterance(
                    `Terima kasih sudah berbelanja. Anda memiliki hutang sebesar, ${kasbon.toLocaleString('id-ID')} rupiah.`
                  );
                  suaraKasbon.lang = 'id-ID';
                  suaraKasbon.volume = 1;
                  suaraKasbon.onend = () => {
                    window.speechSynthesis.speak(suaraAkhir);
                  };
                  suaraAkhir.onend = () => {
                    window.location.reload();
                  };
                  window.speechSynthesis.speak(suaraKasbon);
                } else {
                  suaraAkhir.onend = () => {
                    window.location.reload();
                  };
                  window.speechSynthesis.speak(suaraAkhir);
                }
              }, 500);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: data.message || 'Terjadi kesalahan saat menyimpan transaksi!',
                timer: 3000,
                showConfirmButton: false
              });
            }
          })
          .catch(error => {
            console.error('Fetch error:', error);
            Swal.fire({
              icon: 'error',
              title: 'Oops..',
              text: 'Terjadi kesalahan koneksi!',
              timer: 3000,
              showConfirmButton: false
            });
          });
      }




      clearCartOnFirstLoad();
      getAllKategori();
      getAllProduk();
      loadOrderChart();
      toggleKasbonFields();
      tambahNominal();
      hitungKembalianDanKasbon();
    });
  </script>
@endsection
