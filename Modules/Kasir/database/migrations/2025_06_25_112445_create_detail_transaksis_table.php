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
    Schema::create('detail_transaksis', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('transaksi_id')->nullable();
      $table->string('produk_id')->nullable();
      $table->string('nama_produk')->nullable();
      $table->string('nama_kategori_produk')->nullable();
      $table->decimal('harga_satuan_produk')->default(0);
      $table->decimal('qty')->default(0);
      $table->decimal('total_harga_produk')->default(0);

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
    Schema::dropIfExists('detail_transaksis');
  }
};
