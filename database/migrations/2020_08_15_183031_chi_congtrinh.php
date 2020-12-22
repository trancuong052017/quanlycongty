<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiCongtrinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_congtrinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('diachi');
            $table->string('ngaykhoicong');
             $table->string('ngayhoanthanh');
            $table->string('chihuy');
             $table->string('noidung');
            $table->integer('tientchi');
             $table->string('anh');
            $table->string('anhkemtheo');
            
        
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
