<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            "name" => "max:42|required"
        ];
    }
}
