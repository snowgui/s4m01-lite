<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration{

    public function up(){
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("dia");
            $table->string("emp")->comment("Empresa");            
            $table->bigInteger("user_id")->unsigned(); 
            $table->foreign("user_id")->references("id")->on("users");           
            $table->time("entrada")->nullable()->comment("Horário de Entrada");
            $table->time("saida")->nullable()->comment("Horário de Saída");
            $table->time("aEntrada")->nullable()->comment("Horário de Entrada Almoço");
            $table->time("aSaida")->nullable()->comment("Horário de Saída Almoço");
            $table->time("heEntrada")->nullable()->comment("Horário de Entrada Hora Extra");
            $table->time("heSaida")->nullable()->comment("Horário de Saída Hora Extra");
            $table->string("dia_semana", 10)->nullalbe()->comment("Seg, Ter, Qua, ..."); 
            $table->string("ex", 42)->nullable()->comment("Exception, dia livre, feriado, etc");
            
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('horarios');
    }
}
