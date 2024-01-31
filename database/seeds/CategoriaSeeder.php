<?php

use Illuminate\Database\Seeder;
use App\Models\CDHCategoria;

class CategoriaSeeder extends Seeder{

    public function run(){
        CDHCategoria::create([
           "nome" => "Script"
        ]);
    }
}
