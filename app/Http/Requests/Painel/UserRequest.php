<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      'name' => ['required', 'string', 'max:255'],
      'email' => "required|string|email|min:3|max:255|unique:users,email,{$id},id",
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'cep' => 'required|min:9|max:10|',
      'logradouro' => 'nullable|max:200|',
      'numero' => 'nullable|numeric',
      'uf' => 'nullable|min:2|max:2|',
      'cidade' => 'nullable|max:200|',
      'complemento' => 'nullable|max:200|',
      'bairro' => 'nullable|max:200|',
      'fone' => 'nullable|min:14|max:14|',
      'celular' => 'nullable|min:15|max:15|',
      'office_id' => 'required',
      'image' => 'nullable|max:2048|',
    ];
  }
}
