<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('station_go');
            $table->string('station_back');
            $table->timestamp('time_go')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('time_back')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->integer('route_id');
            $table->string('line');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->boolean('active');

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
        Schema::dropIfExists('cars');
    }
}
