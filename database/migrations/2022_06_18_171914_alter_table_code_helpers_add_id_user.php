<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCodeHelpersAddIdUser extends Migration
{
    
    public function up()
    {
     Schema::table('code_helpers', function(Blueprint $table){
        $table->unsignedBigInteger('user_id')->nullable();
        $table->foreign('user_id')->references('id')->on('users');
     });
    }

    public function down()
    {
        Schema::table('code_helpers', function(Blueprint $table){
            $table->dropForeign('code_helpers_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}