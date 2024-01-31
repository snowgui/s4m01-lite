<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CDHCategoria;
use App\Models\CDHLang;
use App\Models\CDHFramework;
use App\Models\CDHTool;
use App\Models\CDHSo;
class CodeHelper extends Model
{
    protected $fillable = [
        'code'
        , 'nome'
        , 'c_d_h_categoria_id'
        , 'c_d_h_lang_id'
        , 'c_d_h_framework_id'
        , 'c_d_h_tool_id'
        , 'c_d_h_so_id'
        , 'comment'
        , 'img64'
        , 'file'
        , 'path'
        
    ];

    public function Cat(){
        return $this->belongsTo(CDHCategoria::class, 'c_d_h_categoria_id', 'id');
    } 
    
    public function Lang(){
        return $this->belongsTo(CDHLang::class, 'c_d_h_lang_id', 'id');
    }
     
    public function Frame(){
        return $this->belongsTo(CDHFramework::class, 'c_d_h_framework_id', 'id');
    }

    public function Tool(){
        return $this->belongsTo(CDHTool::class, 'c_d_h_tool_id', 'id');
    }

    public function SO(){
        return $this->belongsTo(CDHSo::class, 'c_d_h_so_id', 'id');
    }

}
