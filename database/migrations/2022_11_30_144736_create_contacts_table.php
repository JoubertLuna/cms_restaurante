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
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string('eh_fornecedor', 1)->default('S');
      $table->string('eh_entregador', 1)->default('N');
      $table->string('nome')->unique();
      $table->string('nome_fantasia')->nullable();
      $table->string('cpf', 20)->nullable();
      $table->string('cnpj', 20)->nullable();
      $table->string('ativo', 1)->default('S');
      $table->string('fone', 20)->nullable();
      $table->string('celular', 20)->nullable();
      $table->string('email')->unique();
      $table->string('cep', 20)->nullable();;
      $table->string('logradouro')->nullable();
      $table->string('numero')->nullable();
      $table->string('uf', 2)->nullable();
      $table->string('cidade')->nullable();
      $table->string('complemento')->nullable();
      $table->string('bairro')->nullable();
      $table->string('rg', 20)->nullable();
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
    Schema::dropIfExists('contacts');
  }
};
