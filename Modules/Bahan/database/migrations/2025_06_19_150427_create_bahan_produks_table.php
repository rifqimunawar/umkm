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
    Schema::create('bahan_produks', function (Blueprint $table) {
      $table->uuid('id')->primary();

      // Hubungan ke produk (produk yang memakai bahan ini)
      $table->uuid('produk_id')->nullable();
      $table->uuid('produk_temp_id')->nullable();

      $table->uuid('bahan_id');
      $table->decimal('jumlah_bahan_digunakan', 10, 2)->nullable();
      $table->decimal('jumlah_bahan_digunakan_unk_1_produk', 10, 2)->nullable();
      $table->string('satuan')->nullable();

      $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
      $table->foreign('bahan_id')->references('id')->on('bahans')->onDelete('cascade');

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
    Schema::dropIfExists('bahan_produks');
  }
};
