<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        //Regra unique : passa o nome da tabela,campo e o $id para ser ignorado.

        $category = $this->route('category');
        $id = $category ? $category->id : NULL;
        return [
            'name' => "required | max:255|unique:categories,name,$id"
        ];
    }

    //traduzir mensagens de erros.
    public function messages()
    {
        return [
            'required' => "O :attribute é requerido.",
            'unique' => "O :attribute digitado está em uso",
        ];
    }

    //traduzir o attribute que pode ser utilizado de forma dinamica.
    public function attributes()
    {
        return [
            'name' => 'nome',
            ];
    }
}