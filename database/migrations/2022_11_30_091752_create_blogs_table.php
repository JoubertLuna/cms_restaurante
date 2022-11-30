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
    Schema::create('blogs', function (Blueprint $table) {
      $table->id();
      $table->string('titulo')->unique();
      $table->string('url_titulo')->unique();
      $table->text('descricao_1')->nullable();
      $table->text('descricao_2')->nullable();
      $table->text('descricao_3')->nullable();
      $table->string('imagem')->nullable();
      $table->string('palavras')->nullable();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
    Schema::dropIfExists('blogs');
  }
};
