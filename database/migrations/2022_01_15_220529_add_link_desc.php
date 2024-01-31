<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkDesc extends Migration
{
    public function up()
    {
        Schema::table('c_d_h_frameworks', function (Blueprint $table) {
            $table->string('link', 150)->nullable()->after('desc');
        });

        Schema::table('c_d_h_langs', function (Blueprint $table) {
            $table->string('desc', 150)->nullable()->after('nome');
            $table->string('link', 150)->nullable()->after('desc');
        });

        Schema::table('c_d_h_categorias', function (Blueprint $table) {
            $table->string('desc', 150)->nullable()->after('nome');
        });
    }

    public function down()
    {
        Schema::table('c_d_h_frameworks', function (Blueprint $table) {
            $table->dropColumn('link');
        });

        Schema::table('c_d_h_langs', function (Blueprint $table) {
            $table->dropColumn('desc');
            $table->dropColumn('link');
        });
        Schema::table('c_d_h_categorias', function (Blueprint $table) {
            $table->dropColumn('desc');
        });
    }
}
