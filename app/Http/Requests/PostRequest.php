<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        //dd($this->post);

        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
            return [
                'titulo' => 'required|max:100|unique:posts,titulo,'. $this->post,
                'conteudo' => 'required',
                'imagem' => 'mimes:png,jpg,jpeg|max:2048|nullable',
            ];
        } else {
            return [
                'titulo' => 'required|max:100|unique:posts,titulo',
                'conteudo' => 'required',
                'imagem' => 'required|mimes:png,jpg,jpeg|max:2048|nullable',
            ];
        }
    }
}
