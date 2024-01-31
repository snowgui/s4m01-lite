<?php

namespace App\Http\Requests\CDHLang;

use Illuminate\Foundation\Http\FormRequest;

class CDHLangRequest extends FormRequest
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
