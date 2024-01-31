<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeHelpersTable extends Migration{

    public function up(){
        Schema::create('code_helpers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nome", 42);
            $table->longText("code");  
            $table->text("comment")->nullable();
            $table->enum("atv", ["s", "n"])->default("s");
            $table->longText("img64")->nullable();            
            $table->binary("file")->nullable();
            $table->text("path")->nullable();          
            $table->bigInteger("c_d_h_categoria_id")->unsigned();
            $table->bigInteger("c_d_h_lang_id")->unsigned();

            $table->foreign("c_d_h_categoria_id")->references("id")->on("c_d_h_categorias"); 
            $table->foreign("c_d_h_lang_id")->references("id")->on("c_d_h_langs"); 
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('code_helpers');
    }
}
