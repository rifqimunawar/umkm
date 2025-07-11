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
    Schema::create('produks', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('nama_produk')->nullable();
      $table->unsignedBigInteger('kode')->nullable();
      $table->uuid('kategori_id')->nullable();
      $table->smallInteger('is_produksi')->nullable();
      $table->decimal('harga_beli')->nullable();
      $table->decimal('harga_jual')->nullable();
      $table->decimal('margin_nominal')->nullable();
      $table->decimal('margin_presentase')->nullable();
      $table->decimal('jumlah_produk')->nullable();
      $table->string('img')->nullable();
      $table->string('desc')->nullable();

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
    Schema::dropIfExists('produks');
  }
};
