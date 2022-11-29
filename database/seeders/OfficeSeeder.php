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
        'nome'     => 'Recepcionista',
        'descricao'    => 'Cargo Recepcionista',
      ],
      [
        'nome'     => 'Faxineira',
        'descricao'    => 'Cargo Faxineira',
      ],
      [
        'nome'     => 'Manobrista',
        'descricao'    => 'Cargo Manobrista',
      ],
      [
        'nome'     => 'Entregador',
        'descricao'    => 'Cargo Entregador',
      ],
      [
        'nome'     => 'Garçon',
        'descricao'    => 'Cargo Garçon',
      ],
      [
        'nome'     => 'Chef',
        'descricao'    => 'Cargo Chef',
      ],
      [
        'nome'     => 'Financeiro',
        'descricao'    => 'Cargo Financeiro',
      ],
    ]);
  }
}
