<?php

use App\User;

/* Helper para trabalhar com fotos */

class Foto{

    public static function getFotoUser($id){

        $user = User::find($id);

        if(!isset($user->foto) || $user->foto == "")
            return asset("img/avatar.png");
        else
            return $user->foto;
            
    }

}
