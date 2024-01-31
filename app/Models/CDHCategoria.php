<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CodeHelper;

class CDHCategoria extends Model{

    protected $fillable = ['nome', 'atv', 'desc'];

    public function CodeHelper(){
        return $this->hasMany(CodeHelper::class,);
    }

}
