<?php

namespace App\Http\Requests\CDHCategoria;

use Illuminate\Foundation\Http\FormRequest;

class CDHCategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
                "nome" => "required|max:42"                          
        ];  
    }
}
