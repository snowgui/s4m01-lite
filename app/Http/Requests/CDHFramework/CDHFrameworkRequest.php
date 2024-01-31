<?php

namespace App\Http\Requests\CDHFramework;

use Illuminate\Foundation\Http\FormRequest;

class CDHFrameworkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:42'
            ,'desc' => 'max:150'
        ];
    }
}
