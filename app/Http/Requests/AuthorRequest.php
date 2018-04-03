<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
        $author = $this->route('author');
        $id = $author ? $author->id : NULL;
        return [
            'name' => "required | max:255|unique:authors,name,$id"
        ];
    }
}
