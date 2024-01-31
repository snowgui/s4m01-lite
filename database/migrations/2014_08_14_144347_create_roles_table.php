<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration{

    public function up(){
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role', 42);
            $table->string('desc', 142)->nullable();
            $table->timestamps();
        });
    }

    
    public function down(){
        Schema::dropIfExists('roles');
    }
}
