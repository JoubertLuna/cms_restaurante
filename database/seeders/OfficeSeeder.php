<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('offices')->insert([
      [
        'nome'     => 'Administrador',
        'descricao'    => 'Cargo Administrador',
      ],
      [
        'nome'     => 'Financeiro',
        'descricao'    => 'Cargo Financeiro',
      ],
      [
        'nome'     => 'Chef',
        'descricao'    => 'Cargo Chef',
      ],

      [
        'nome'     => 'Garçon',
        'descricao'    => 'Cargo Garçon',
      ],
      [
        'nome'     => 'Tela',
        'descricao'    => 'Cargo Tela',
      ],
    ]);
  }
}
