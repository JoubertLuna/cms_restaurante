<?php

namespace App\Models\Painel;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  use HasFactory;

  protected $fillable = ['titulo', 'url_titulo', 'descricao_1', 'descricao_2', 'descricao_3', 'imagem', 'palavras', 'user_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
