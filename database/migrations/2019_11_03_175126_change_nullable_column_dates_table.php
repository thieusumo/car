<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableColumnDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dates', function (Blueprint $table) {
            $table->text('car_id_go')->nullable()->comment('implode car id with ";"')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dates', function (Blueprint $table) {
            //
        });
    }
}
