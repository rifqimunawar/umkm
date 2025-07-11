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
    Schema::create('transaksis', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('no_transaksi')->nullable();
      $table->string('konsumen_id')->nullable();
      $table->decimal('nominal_belanja')->default(0);
      $table->decimal('nominal_dibayar')->default(0);
      $table->decimal('nominal_kembalian')->default(0);
      $table->boolean('is_kasbon')->nullable();
      $table->decimal('nominal_kasbon')->default(0);

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
    Schema::dropIfExists('transaksis');
  }
};
