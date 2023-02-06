<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'category_id' => ['required', 'string'],
            'author_id' => ['required', 'string'],
            'title' => ['required', 'string', "unique:Books,title,{$this->book->id}"],
            'stock' => ['required', 'numeric'],
            'description' => ['nullable', 'string','min:15'],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'El numero de la categoria es requerido',
            'category_id.string' => 'El numero de la categoria no existe(1-3)',

            'author_id.required' => 'El numero de autor es requerido',
            'author_id.string' => 'El Escriba un numero de autor valido (1-100)',

            'title.required' => 'El titulo del libro es requerido',
            'title.string' => 'El titulo de libro no es valido',
            'title.unique' => 'Este titulo de libro ya existe',

            'stock.required' => 'La cantidad de libros es requerida',
            'stock.email' => 'La cantidad de libros debe ser valida',

            'description.required' => 'La descripcion es requerida',
            'description.string' => 'Escriba una descripcion aceptable',
            'description.min' => 'La descripcion es muy corta (min 15)',
        ];
    
    }
}
