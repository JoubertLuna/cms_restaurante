<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('banners', function (Blueprint $table) {
      $table->id();
      $table->string('imagem')->nullable();
      $table->string('titulo')->unique();
      $table->string('subtitulo')->unique();
      $table->string('descricao')->nullable();
      $table->string('link')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('banners');
  }
};
