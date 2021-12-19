<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunasUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('sex');
            $table->string('phone');
            $table->string('state');
            $table->string('city');
            $table->string('situation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $columns = ['sex', 'phone', 'state', 'city', 'situation'];

        Schema::table('users', function (Blueprint $table) use($columns){
            $table->dropColumn($columns);
        });
    }
}
