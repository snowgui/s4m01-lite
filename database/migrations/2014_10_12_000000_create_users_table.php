<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

    public function up(){

        Schema::create("users", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name", 20);
            $table->string("sobrenome", 42)->nullable();
            $table->string("email", 72)->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->longText("foto")->nullable();
            $table->bigInteger("role_id")->unsigned();
            $table->foreign("role_id")->references("id")->on("roles"); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists("users");
    }
}
