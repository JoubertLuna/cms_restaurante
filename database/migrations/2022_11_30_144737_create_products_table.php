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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('produto')->unique();
      $table->string('eh_produto', 1);
      $table->string('eh_insumo', 1);
      $table->decimal('preco', 10, 2)->default(0.00);
      $table->string('imagem')->nullable();
      $table->string('ativo', 1)->default('S');
      $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
    Schema::dropIfExists('products');
  }
};
