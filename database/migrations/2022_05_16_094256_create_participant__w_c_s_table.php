<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantWCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant__w_c_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('IdFonction')->nullable();
            $table->unsignedInteger('IdVol')->nullable();
            $table->string('Nom')->nullable();
            $table->string('Prenom')->nullable();
            $table->unsignedInteger('IdSup')->nullable();
            $table->string('Pays')->nullable();
            $table->string('N_Passport')->nullable();
            $table->Integer('Nbr_Comp')->nullable();
            $table->Boolean('Transport')->nullable();

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
        Schema::dropIfExists('participant__w_c_s');
    }
}
