<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthCtrl extends Controller{
    
    public function reset_passoword_index(){
        return view ('auth.passwords.email');
    }

    public function TestPost(Request $req){
        $data = $req->all();
        return response()->json(["res" => $data, "msg" => "ok"], 201);
    }
}
