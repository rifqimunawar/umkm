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
    Schema::create('komponen_produksis', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('komponen_id')->nullable();
      $table->string('nominal_komponen')->nullable();
      $table->string('produk_temp_id')->nullable();
      $table->string('produk_id')->nullable();

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
    Schema::dropIfExists('komponen_produksis');
  }
};
