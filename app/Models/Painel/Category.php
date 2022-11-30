<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $fillable = ['nome', 'descricao'];

  #Relecionamentos
  public function products_category()
  {
    return $this->hasMany(Product::class);
  }
}
