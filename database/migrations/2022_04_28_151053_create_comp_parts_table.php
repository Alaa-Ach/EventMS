<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comp_parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('IdPart')->nullable();
            $table->unsignedInteger('IdVol')->nullable();
            $table->unsignedInteger('IdFonction')->nullable();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Pays');
            $table->string('N_Passport');
            $table->Boolean('Transport');
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
        Schema::dropIfExists('comp_parts');
    }
}
