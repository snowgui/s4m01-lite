<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model{

    protected $fillable = [
        "dia"
        ,"mes"
        ,"entrada"
        ,"saida"
        ,"aEntrada"
        ,"aSaida"
        ,"heEntrada"
        ,"heSaida"
        ,"dia_semana"
        ,"ex"
        ,"emp"
        ,"user_id"
    ];

}
