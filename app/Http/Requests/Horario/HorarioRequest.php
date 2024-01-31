<?php

namespace App\Http\Requests\Horario;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [

            'entrada' => 'nullable|date_format:H:i',
            'saida' => 'nullable|date_format:H:i',
            'aEntrada' => 'nullable|date_format:H:i',
            'aSaida' => 'nullable|date_format:H:i',
            'horaExtraEntrada' => 'nullable|date_format:H:i',
            'horaExtraSaida' => 'nullable|date_format:H:i',            
        ];
    }
    
}
