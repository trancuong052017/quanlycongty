<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDungcu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dungcu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('idcongtrinh');
              $table->integer('madungcu');
             $table->string('noidung');
             $table->string('anhbangiao');
             $table->string('anh');
            $table->date('ngaygiao');
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
        Schema::dropIfExists('dungcu');
    }
}
