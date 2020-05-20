<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('times');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('times', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->dateTime('time');
             $table->integer('car_id');
             $table->tinyInteger('route_type')->commit('1: go,2: back');
             $table->timestamps();
        });
    }
}
