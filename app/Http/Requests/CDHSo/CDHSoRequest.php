<?php

namespace App\Http\Requests\CDHSo;

use Illuminate\Foundation\Http\FormRequest;

class CDHSoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:42'
        ];
    }
}
