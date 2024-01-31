<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class DevUserSeeder extends Seeder{
    
    public function run(){

        Role::create([
            "id" => 1
            ,"role" => "Root"            
        ]);

        Role::create([
            "id" => 2
            ,"role" => "Admin"
        ]);

        Role::create([
            "id" => 3
            ,"role" => "Guest"
        ]);

        App\User::create([
            "id" => 1
            ,"name" => "Guilherme"
            ,"email" => "guilherme42correa@gmail.com"
            ,"email_verified_at" => now()
            ,"password" => bcrypt("1708")
            ,"role_id" => 1
        ]);

    }
}
