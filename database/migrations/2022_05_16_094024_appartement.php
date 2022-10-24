<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Appartement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartement', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('IdPart');
            $table->string('HotelName')->nullable();
            $table->integer('Nbr_Personne')->nullable();
            $table->date('From')->nullable();
            $table->date('To')->nullable();




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
