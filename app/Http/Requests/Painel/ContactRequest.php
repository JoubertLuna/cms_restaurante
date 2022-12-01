<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    $id = $this->segment(2);

    return [
      'nome' => "required|min:3|max:255|unique:contacts,nome,{$id},id",
      'eh_fornecedor' => 'nullable', Rule::in(['S', 'N']),
      'eh_entregador' => 'nullable', Rule::in(['S', 'N']),
      'nome_fantasia' => 'nullable|min:3|max:255|',
      'cpf' => 'required|min:14|max:14|',
      'cnpj' => 'required|min:18|max:18|',
      'ativo' => 'required', Rule::in(['S', 'N']),
      'fone' => 'nullable|min:14|max:14|',
      'celular' => 'nullable|min:15|max:15|',
      'email' => "required|string|email|min:3|max:255|unique:contacts,email,{$id},id",
      'cep' => 'required|min:9|max:10|',
      'logradouro' => 'nullable|max:200|',
      'numero' => 'nullable|numeric',
      'uf' => 'nullable|min:2|max:2|',
      'cidade' => 'nullable|max:200|',
      'complemento' => 'nullable|max:200|',
      'bairro' => 'nullable|max:200|',
      'rg' => 'nullable|min:9|max:10|',
    ];
  }
}
