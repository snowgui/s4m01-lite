<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCDHSosTable extends Migration
{
    public function up()
    {
        Schema::create('c_d_h_sos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 42);
            $table->string('desc', 150)->nullable();
            $table->boolean('atv')->default(false);
            $table->timestamps();
        });

        Schema::table('code_helpers', function(Blueprint $table){
            $table->unsignedBigInteger('c_d_h_so_id')->nullable();
            $table->foreign('c_d_h_so_id')->references('id')->on('c_d_h_sos');
        });
    }

    public function down()
    {
        Schema::table('code_helpers', function(Blueprint $table){
            $table->dropForeign('code_helpers_c_d_h_so_id_foreign');
            $table->dropColumn('c_d_h_so_id');
        });

        Schema::dropIfExists('c_d_h_sos');
    }
}
