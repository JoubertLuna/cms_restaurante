<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['produto', 'eh_produto', 'eh_insumo', 'preco', 'imagem', 'ativo', 'category_id' ];

    #Relecionamentos
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
