<?php

use Illuminate\Database\Seeder;
use App\Models\CDHLang As Lang;

class LangSeeder extends Seeder{
    
    public function run(){
     
        Lang::create([
            "nome" => "Php"
        ]);

        Lang::create([
            "nome" => "JavaScript"
        ]);

        Lang::create([
            "nome" => "C#"
        ]);

        Lang::create([
            "nome" => "Android Java"
        ]);

        Lang::create([
            "nome" => "React"
        ]);

        Lang::create([
            "nome" => "React Native"
        ]);

        Lang::create([
            "nome" => "React Native"
        ]);

        Lang::create([
            "nome" => "HTML"
        ]);   

        Lang::create([
            "nome" => "Materialize"
        ]);    
        
        Lang::create([
            "nome" => "Bootstrap"
        ]);    

        Lang::create([
            "nome" => "SQL Server"
        ]);

        Lang::create([
            "nome" => "SQL"
        ]);

        

    }
}
