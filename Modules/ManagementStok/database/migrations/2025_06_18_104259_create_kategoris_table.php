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
    Schema::create('kategoris', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('nama_kategori')->nullable();
      $table->string('icon')->default('<i class="fa-solid fa-burger"></i>');
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
    Schema::dropIfExists('kategoris');
  }
};
