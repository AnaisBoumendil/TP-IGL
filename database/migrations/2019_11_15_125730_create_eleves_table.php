<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Permet de créer la table 'eleves' et ses différents champs.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateNaiss');
            $table->string('lieuNaiss');
            $table->string('adr');
            $table->string('mail');
            $table->string('numIns')->unique();
            $table->string('niveau');
            $table->char('section');
            $table->integer('groupe');
            $table->timestamps();
        });
    }

    /**
     * Permet de supprimer la table 'eleves'
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
}
