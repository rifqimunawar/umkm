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
    Schema::create('pemasukans', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('nama_pemasukan')->nullable();
      $table->string('sumber')->nullable();
      $table->decimal('nominal_pemasukan')->nullable();
      $table->string('jenis_pembayaran_id')->nullable();
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
    Schema::dropIfExists('pemasukans');
  }
};
