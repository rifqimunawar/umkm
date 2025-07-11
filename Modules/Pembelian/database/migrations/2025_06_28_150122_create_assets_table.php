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
    Schema::create('assets', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('nama_asset')->nullable();
      $table->unsignedBigInteger('kode')->nullable();
      $table->decimal('harga_beli_satuan')->nullable();
      $table->decimal('qty')->nullable();
      $table->decimal('total_harga_beli')->nullable();
      $table->decimal('harga_jual')->nullable();
      $table->decimal('harga_jual_satuan')->nullable();
      $table->decimal('total_dibayar')->nullable();
      $table->decimal('is_hutang')->nullable();
      $table->decimal('total_hutang')->nullable();
      $table->string('img')->nullable();
      $table->string('desc')->nullable();
      $table->integer('supplier_id')->nullable();
      $table->integer('satuan_id')->nullable();
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
    Schema::dropIfExists('assets');
  }
};
