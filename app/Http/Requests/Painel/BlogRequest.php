<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
      'titulo' => "required|min:3|max:255|unique:blogs,titulo,{$id},id",
      'descricao_1' => 'nullable|min:5|max:2000|',
      'descricao_2' => 'nullable|min:5|max:2000|',
      'descricao_3' => 'nullable|min:5|max:2000|',
      'imagem' => 'nullable|max:2048|',
      'palavras' => 'nullable|min:3|max:255|',
      'user_id' => 'numeric'
    ];
  }
}
