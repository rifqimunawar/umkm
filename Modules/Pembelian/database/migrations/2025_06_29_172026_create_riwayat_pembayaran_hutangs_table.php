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
    Schema::create('riwayat_pembayaran_hutangs', function (Blueprint $table) {
      $table->uuid('id')->primary();

      $table->string('id_barang')->nullable();
      $table->string('nama_barang')->nullable();
      $table->decimal('total_harga_beli')->nullable();
      $table->decimal('total_dibayar')->nullable();
      $table->decimal('total_hutang')->nullable();
      $table->decimal('nominal_dibayar')->nullable();
      $table->string('jatuh_tempo')->nullable();
      $table->string('nama_supplier')->nullable();
      $table->string('supplier_id')->nullable();
      $table->smallInteger('sumber')->nullable();
      $table->string('sumber_text')->nullable();

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
    Schema::dropIfExists('riwayat_pembayaran_hutangs');
  }
};
