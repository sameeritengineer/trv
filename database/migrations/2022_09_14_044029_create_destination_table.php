<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price')->nullable();
            $table->string('start_date_time', 50)->nullable();
            $table->string('end_date_time', 50)->nullable();
            $table->string('includesId', 255)->nullable();
            $table->string('excludesId', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('activities')->nullable();
            $table->longText('dest_gallery')->nullable();
            $table->string('image');
            $table->integer('status');
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
        Schema::dropIfExists('destination');
    }
}
