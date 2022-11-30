<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  use HasFactory;

  protected $fillable = ['imagem', 'titulo', 'subtitulo', 'descricao', 'link'];
}
