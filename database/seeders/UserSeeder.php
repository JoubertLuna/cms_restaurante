<?php

namespace Database\Seeders;

use App\Models\Painel\Office;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $office = Office::first();

      $office->users()->create([
        'name' => 'Administrador - Restaurante',
        'email' => Str::random(4) . '@gmail.com',
        'password' => Hash::make('@admin123'),
      ]);
    }
}
