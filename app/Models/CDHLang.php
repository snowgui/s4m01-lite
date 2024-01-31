<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CodeHelper;

class CDHLang extends Model{

    protected $fillable = ['nome', 'atv', 'link', 'desc'];

    public function CodeHelper(){
        return $this->hasMany(CodeHelper::class);
    }

}
