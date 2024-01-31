<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCDHToolsTable extends Migration
{
    public function up()
    {
        Schema::create('c_d_h_tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 42);
            $table->string('desc', 150)->nullable();
            $table->string('link', 150)->nullable();
            $table->boolean('atv')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('c_d_h_tools');
    }
}
