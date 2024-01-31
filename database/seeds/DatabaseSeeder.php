<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    public function run(){

         $this->call(DevUserSeeder::class);
         $this->call(HorarioSeeder::class);
         $this->call(CategoriaSeeder::class);
         $this->call(LangSeeder::class);
         
    }
}
