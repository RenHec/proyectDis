<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cui')->unique();
            $table->string('name_one');
            $table->string('name_two')->nullable();
            $table->string('last_name_one');
            $table->string('last_name_two')->nullable();   
            $table->string('direction'); 
            $table->string('gender');
            $table->string('email')->unique();
            $table->unsignedBigInteger('municipalities_id');
            $table->foreign('municipalities_id')->references('id')->on('municipalities');  
                  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}
