<?php

namespace App\Http\Requests\CodeHelper;

use Illuminate\Foundation\Http\FormRequest;

class CodeHelperRequest extends FormRequest{

    public function authorize(){
        return true;
    }
    
    public function rules(){
        return [
                "nome" => "required|max:42"
                // ,"c_d_h_categoria_id" => "required"
                // ,"c_d_h_lang_id" => "required"
                //,"code" => "required"
        ];  
    }
}
