<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up() : void
  {
    Schema::create('riwayat_pembayaran_piutangs', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('transaksi_id')->nullable();
      $table->string('konsumen_id')->nullable();
      $table->string('nama_konsumen')->nullable();
      $table->string('nominal_belanja')->nullable();
      $table->string('nominal_dibayar')->nullable();
      $table->string('nominal_kasbon')->nullable();
      $table->string('nominal_pembayaran_kasbon')->nullable();
      $table->string('nominal_sisa_kasbon')->nullable();

      $table->string('created_by')->default('unknown');
      $table->string('updated_by')->default('unknown');
      $table->string('deleted_by')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('riwayat_pembayaran_piutangs');
  }
};
