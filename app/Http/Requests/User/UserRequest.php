<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function messages(){
        return [

            'name.required'=> 'É obrigatório',
            'name.max'=> 'Máximo 20 caracteres',
            'sobrenome.max'=> 'Máximo de 42 caracteres',
            'password.required'=> 'O campo senha é obrigatório.',
            'password.min'=> 'O campo senha deve ter no mínimo 6 digitos.',
            'password_confirm.required'=> 'Digite a senha novamente',
            'password_confirm.same'=> 'Senhas diferentes.',
            'role_id.required' => 'Obrigatório'

        ];
    }

    public function rules(){
        return [
            'name'=>'max:20|required',
            'sobrenome'=>'max:42',
            'role_id'=>'required',
            //'email'=>'max:72|required|email|unique:users,email,' . $this->id, // $this->id --Essa alteração faz com que o usuário possa ser alterado sem ter que obrigatoriamente alterar o e-mail.
            'email'=>'max:72|required|email',
            'password'=>'required|min:6',
            'password_confirm'=>'required|same:password',
          
        ];
    }
}
