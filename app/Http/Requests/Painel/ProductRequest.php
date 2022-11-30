<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
      'produto' => "required|min:3|max:255|unique:products,produto,{$id},id",
      'eh_produto' => 'required', Rule::in(['S', 'N']),
      'eh_insumo' => 'required', Rule::in(['S', 'N']),
      'ativo' => 'required', Rule::in(['S', 'N']),
      'preco' => "required|regex:/^\d+(\.\d{1,2})?$/",
      'imagem' => 'nullable|max:2048|',
      'category_id' => 'required',

    ];
  }
}
