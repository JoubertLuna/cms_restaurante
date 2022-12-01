<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['eh_fornecedor', 'eh_entregador', 'nome', 'nome_fantasia', 'cpf', 'cnpj', 'ativo', 'fone', 'celular', 'email', 'cep', 'logradouro', 'numero', 'uf', 'cidade', 'complemento', 'bairro', 'rg'];
}
