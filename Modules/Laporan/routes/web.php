<?php

use Illuminate\Support\Facades\Route;
use Modules\Laporan\Http\Controllers\LaporanController;
use Modules\Laporan\Http\Controllers\LaporanHutangPiutangController;
use Modules\Laporan\Http\Controllers\LaporanLabarugiController;
use Modules\Laporan\Http\Controllers\LaporanPembelianController;
use Modules\Laporan\Http\Controllers\LaporanPengeluaranController;
use Modules\Laporan\Http\Controllers\LaporanPenjualanController;
use Modules\Laporan\Http\Controllers\LaporanPrediksiBahanController;
use Modules\Laporan\Http\Controllers\LaporanStokBahanController;
use Modules\Laporan\Http\Controllers\LaporanStokProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group([], function () {
//     Route::resource('laporan', LaporanController::class)->names('laporan');
// });
Route::prefix('laporan')->middleware('auth')->group(function () {

  Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
  Route::get('/export', [LaporanController::class, 'export'])->name('laporan.export');
  Route::get('/print', [LaporanController::class, 'print'])->name('laporan.print');
  Route::get('/pdf', [LaporanController::class, 'pdf'])->name('laporan.pdf');

  Route::get('/penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan_penjualan.index');
  Route::get('/penjualan/export', [LaporanPenjualanController::class, 'export'])->name('laporan_penjualan.export');
  Route::get('/penjualan/print', [LaporanPenjualanController::class, 'print'])->name('laporan_penjualan.print');
  Route::get('/penjualan/pdf', [LaporanPenjualanController::class, 'pdf'])->name('laporan_penjualan.pdf');

  Route::get('/penjualan/export_produk_jadi', [LaporanPenjualanController::class, 'exportProdukJadi'])->name('laporan_penjualan_produk_jadi.export');
  Route::get('/penjualan/print_produk_jadi', [LaporanPenjualanController::class, 'printProdukJadi'])->name('laporan_penjualan_produk_jadi.print');
  Route::get('/penjualan/pdf_produk_jadi', [LaporanPenjualanController::class, 'pdfProdukJadi'])->name('laporan_penjualan_produk_jadi.pdf');
  Route::get('/penjualan/export_hasil_produksi', [LaporanPenjualanController::class, 'exportHasilProduksi'])->name('laporan_penjualan_hasil_produksi.export');
  Route::get('/penjualan/print_hasil_produksi', [LaporanPenjualanController::class, 'printHasilProduksi'])->name('laporan_penjualan_hasil_produksi.print');
  Route::get('/penjualan/pdf_hasil_produksi', [LaporanPenjualanController::class, 'pdfHasilProduksi'])->name('laporan_penjualan_hasil_produksi.pdf');


  Route::get('/pengeluaran', [LaporanPengeluaranController::class, 'index'])->name('lap_pengeluaran.index');
  Route::get('/pengeluaran/export', [LaporanPengeluaranController::class, 'export'])->name('lap_pengeluaran.export');
  Route::get('/pengeluaran/print', [LaporanPengeluaranController::class, 'print'])->name('lap_pengeluaran.print');
  Route::get('/pengeluaran/pdf', [LaporanPengeluaranController::class, 'pdf'])->name('lap_pengeluaran.pdf');

  Route::get('/prediksi_bahan', [LaporanPrediksiBahanController::class, 'index'])->name('prediksi_bahan.index');
  Route::get('/prediksi_bahan/export', [LaporanPrediksiBahanController::class, 'export'])->name('prediksi_bahan.export');
  Route::get('/prediksi_bahan/print', [LaporanPrediksiBahanController::class, 'print'])->name('prediksi_bahan.print');
  Route::get('/prediksi_bahan/pdf', [LaporanPrediksiBahanController::class, 'pdf'])->name('prediksi_bahan.pdf');

  Route::get('/pembelian', [LaporanPembelianController::class, 'index'])->name('lap_pembelian.index');
  Route::get('/pembelian/export', [LaporanPembelianController::class, 'export'])->name('lap_pembelian.export');
  Route::get('/pembelian/print', [LaporanPembelianController::class, 'print'])->name('lap_pembelian.print');
  Route::get('/pembelian/pdf', [LaporanPembelianController::class, 'pdf'])->name('lap_pembelian.pdf');

  Route::get('/bahan', [LaporanStokBahanController::class, 'index'])->name('lap_bahan.index');
  Route::get('/bahan/export', [LaporanStokBahanController::class, 'export'])->name('lap_bahan.export');
  Route::get('/bahan/print', [LaporanStokBahanController::class, 'print'])->name('lap_bahan.print');
  Route::get('/bahan/pdf', [LaporanStokBahanController::class, 'pdf'])->name('lap_bahan.pdf');

  Route::get('/produk', [LaporanStokProdukController::class, 'index'])->name('lap_produk.index');
  Route::get('/produk/export', [LaporanStokProdukController::class, 'export'])->name('lap_produk.export');
  Route::get('/produk/print', [LaporanStokProdukController::class, 'print'])->name('lap_produk.print');
  Route::get('/produk/pdf', [LaporanStokProdukController::class, 'pdf'])->name('lap_produk.pdf');

  Route::get('/hutang', [LaporanHutangPiutangController::class, 'index'])->name('lap_hutang.index');
  Route::get('/hutang/export', [LaporanHutangPiutangController::class, 'exportHutang'])->name('lap_hutang.export');
  Route::get('/hutang/print', [LaporanHutangPiutangController::class, 'printHutang'])->name('lap_hutang.print');
  Route::get('/hutang/pdf', [LaporanHutangPiutangController::class, 'pdfHutang'])->name('lap_hutang.pdf');
  Route::get('/piutang/export', [LaporanHutangPiutangController::class, 'exportPiutang'])->name('lap_piutang.export');
  Route::get('/piutang/print', [LaporanHutangPiutangController::class, 'printPiutang'])->name('lap_piutang.print');
  Route::get('/piutang/pdf', [LaporanHutangPiutangController::class, 'pdfPiutang'])->name('lap_piutang.pdf');
  Route::get('/riwHutang/export', [LaporanHutangPiutangController::class, 'exportRiwHutang'])->name('lap_riwHutang.export');
  Route::get('/riwHutang/print', [LaporanHutangPiutangController::class, 'printRiwHutang'])->name('lap_riwHutang.print');
  Route::get('/riwHutang/pdf', [LaporanHutangPiutangController::class, 'pdfRiwHutang'])->name('lap_riwHutang.pdf');
  Route::get('/riwPiutang/export', [LaporanHutangPiutangController::class, 'exportRiwPituang'])->name('lap_riwPiutang.export');
  Route::get('/riwPiutang/print', [LaporanHutangPiutangController::class, 'printRiwPiutang'])->name('lap_riwPiutang.print');
  Route::get('/riwPiutang/pdf', [LaporanHutangPiutangController::class, 'pdfRiwPiutang'])->name('lap_riwPiutang.pdf');

  Route::get('/labarugi', [LaporanLabarugiController::class, 'index'])->name('lap_labarugi.index');
  Route::get('/labarugi/export', [LaporanLabarugiController::class, 'export'])->name('lap_labarugi.export');
  Route::get('/labarugi/print', [LaporanLabarugiController::class, 'print'])->name('lap_labarugi.print');
  Route::get('/labarugi/pdf', [LaporanLabarugiController::class, 'pdf'])->name('lap_labarugi.pdf');
});
