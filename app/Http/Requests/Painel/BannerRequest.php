<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
      'titulo' => "required|min:3|max:255|unique:banners,titulo,{$id},id",
      'subtitulo' => "required|min:3|max:255|unique:banners,subtitulo,{$id},id",
      'descricao' => 'nullable|min:3|max:255|',
      'link' => 'nullable|min:3|max:255|',
      'imagem' => 'nullable|max:2048|',
    ];
  }
}
