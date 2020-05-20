<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('car_id');
            $table->text('image_src',255);
            $table->tinyInteger('type')->default(1)->comment('1:own, 2: customer');
            $table->boolean('active')->default(1);
            $table->timestamps();

            // $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_files');
    }
}
