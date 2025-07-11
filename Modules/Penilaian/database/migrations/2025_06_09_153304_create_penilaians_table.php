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
    Schema::create('penilaians', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('karyawan_id');
      $table->unsignedBigInteger('periode_id');

      $table->string('created_by')->default('unknown');
      $table->string('updated_by')->default('unknown');
      $table->string('deleted_by')->nullable();
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
      $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('penilaians');
  }
};
