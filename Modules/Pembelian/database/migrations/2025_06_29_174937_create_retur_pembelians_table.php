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
    Schema::create('retur_pembelians', function (Blueprint $table) {
      $table->uuid('id')->primary();

      $table->text('alasan')->nullable();
      $table->string('nama_barang')->nullable();
      $table->decimal('harga_satuan')->nullable();
      $table->decimal('total_harga')->nullable();
      $table->string('waktu_pembelian')->nullable();
      $table->string('supplier_id')->nullable();
      $table->string('satuan_id')->nullable();
      $table->string('nama_supplier')->nullable();
      $table->string('id_barang')->nullable();
      $table->integer('sumber')->nullable();
      $table->integer('qty_retur')->nullable();
      $table->integer('quantity')->nullable();
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
    Schema::dropIfExists('retur_pembelians');
  }
};
