<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('IdPart');
            $table->string('City');
            $table->string('Type');
            $table->integer('NbrRoom');
            $table->date('From');
            $table->date('To');




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
        Schema::dropIfExists('info_reservations');
    }
}
