<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
  use HasFactory;

  protected $fillable = ['nome', 'descricao'];
}
