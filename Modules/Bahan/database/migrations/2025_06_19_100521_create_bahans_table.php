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
    Schema::create('bahans', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('nama_bahan')->nullable();
      $table->decimal('harga_bahan')->nullable();
      $table->decimal('jumlah_bahan')->nullable();
      $table->string('img')->nullable();
      $table->integer('satuan_id')->nullable();
      $table->integer('supplier_id')->nullable();
      $table->string('desc')->nullable();
      $table->decimal('total_harga_bahan')->nullable();
      $table->decimal('total_dibayar')->nullable();
      $table->smallInteger('is_hutang')->nullable();
      $table->decimal('total_hutang')->nullable();
      $table->date('jatuh_tempo')->nullable();
      $table->smallInteger('status_lunas')->nullable();

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
    Schema::dropIfExists('bahans');
  }
};
