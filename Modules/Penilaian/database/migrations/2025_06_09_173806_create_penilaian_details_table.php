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
    Schema::create('penilaian_details', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('penilaian_id');
      $table->unsignedBigInteger('kriteria_id');
      $table->integer('nilai')->nullable();

      $table->softDeletes();
      $table->timestamps();

      $table->foreign('penilaian_id')->references('id')->on('penilaians')->onDelete('cascade');
      $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('penilaian_details');
  }
};
