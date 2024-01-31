<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Doctrine\DBAL\Driver\PDOMySql\Driver;

class AlterCdhColumns extends Migration
{
    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    public function up()
    {
        Schema::table('code_helpers', function (Blueprint $table) {
            $table->unsignedBigInteger('c_d_h_categoria_id')->nullable()->change();
            $table->unsignedBigInteger('c_d_h_lang_id')->nullable()->change();

            $table->unsignedBigInteger('c_d_h_framework_id')->nullable();
            $table->foreign('c_d_h_framework_id')->references('id')->on('c_d_h_frameworks');

            $table->unsignedBigInteger('c_d_h_tool_id')->nullable()->after('c_d_h_framework_id');
            $table->foreign('c_d_h_tool_id')->references('id')->on('c_d_h_tools');
        });
    }

    public function down()
    {
        Schema::table('code_helpers', function (Blueprint $table) {   
            $table->dropForeign('code_helpers_c_d_h_framework_id_foreign');
            $table->dropColumn('c_d_h_framework_id');

            $table->dropForeign('code_helpers_c_d_h_tool_id_foreign');
            $table->unsignedBigInteger('c_d_h_categoria_id')->nullable(true)->change();
            $table->unsignedBigInteger('c_d_h_lang_id')->nullable(true)->change();
            $table->dropColumn('c_d_h_tool_id');
            
        });
    }
}
