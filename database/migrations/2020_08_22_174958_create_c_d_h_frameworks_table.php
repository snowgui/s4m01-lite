<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCDHFrameworksTable extends Migration
{

    public function up()
    {
        Schema::create('c_d_h_frameworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('desc', 150)->nullable();
            $table->boolean('atv')->default(true);      

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('c_d_h_frameworks');
        Schema::enableForeignKeyConstraints();
    }
}
