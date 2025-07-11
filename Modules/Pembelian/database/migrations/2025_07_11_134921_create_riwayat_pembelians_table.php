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
    Schema::create('riwayat_pembelians', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('assetIdprodukIdbahanId')->nullable();
      $table->string('nama_pembelian')->nullable();
      $table->decimal('harga_satuan')->nullable();
      $table->bigInteger('qty')->nullable();
      $table->decimal('total_harga_beli')->nullable();

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
    Schema::dropIfExists('riwayat_pembelians');
  }
};
