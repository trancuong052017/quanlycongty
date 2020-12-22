<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Luong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('tencongtrinh');
            $table->integer('idcongtrinh');
             $table->integer('thang_1');
            $table->integer('thang_2');
            $table->integer('thang_3');
            $table->integer('thang_4');
            $table->integer('thang_5');
           $table->integer('thang_6');
           $table->integer('thang_7');
            $table->integer('thang_8');
            $table->integer('thang_9');
            $table->integer('thang_10');
            $table->integer('thang_11');
           $table->integer('thang_12');
            $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
