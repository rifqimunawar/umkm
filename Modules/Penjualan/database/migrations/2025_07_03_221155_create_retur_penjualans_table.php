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
    Schema::create('retur_penjualans', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('transaksi_id')->nullable();
      $table->string('item_id')->nullable();
      $table->integer('retur_qty')->nullable();
      $table->string('alasan')->nullable();


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
    Schema::dropIfExists('retur_penjualans');
  }
};
