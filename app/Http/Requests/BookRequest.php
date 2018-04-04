<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $book = $this->route('book');
        $id = $book ? $book->id : NULL;

        return [
            'title' => "required | max:255 | unique:books,title,$id",
            'subtitle' => "required | max:255 ",
            'price' =>"required | numeric",
            'user_id'=>"required | numeric | exists:users,id",
        ];
    }
}
