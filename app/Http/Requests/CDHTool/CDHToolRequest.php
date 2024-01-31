<?php

namespace App\Http\Requests\CDHTool;

use Illuminate\Foundation\Http\FormRequest;

class CDHToolRequest extends FormRequest
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
