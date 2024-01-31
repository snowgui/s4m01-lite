<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCDHCategoriasTable extends Migration
{
  
    public function up()
    {
        Schema::create('c_d_h_categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nome", 42);
            $table->boolean("atv")->default(true);
            $table->timestamps();
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('c_d_h_categorias');
    }
}
