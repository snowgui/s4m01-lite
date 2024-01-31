<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CodeHelper;

class CDHFramework extends Model
{
    protected $fillable = ['nome', 'desc', 'atv', 'c_d_h_lang_id', 'link'];

    public function CodeHelper(){
        return $this->hasMany(CodeHelper::class);
    }
}
