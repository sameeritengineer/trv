<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewdataToDestinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destination', function (Blueprint $table) {
            //
            $table->string('depositeId', 255)->nullable();
            $table->string('video')->nullable();
            $table->string('countryId')->nullable();
            $table->string('hotelname')->nullable();
            $table->string('hoteladd')->nullable();
            $table->longText('addinfo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destination', function (Blueprint $table) {
            //
        });
    }
}
