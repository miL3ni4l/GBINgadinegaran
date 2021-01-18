<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatansTable extends Migration
{

    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('jemaat_id')->references('id')->on('jemaats')->onDelete('cascade');
            $table->string('nama_jabatan');
            $table->string('ket');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('jabatan');
    }
}
