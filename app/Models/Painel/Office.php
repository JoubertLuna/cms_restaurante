<?php

namespace App\Models\Painel;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
  use HasFactory;

  protected $fillable = ['nome', 'descricao'];

  public function Users()
  {
    return $this->hasMany(User::class);
  }
}
