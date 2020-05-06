<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('zone_id');
            $table->bigInteger('nbr_personne_test');
            $table->bigInteger('nbr_personne_confine');
            $table->bigInteger('nbr_personne_hospitalise');
            $table->bigInteger('nbr_personne_guerie');
            $table->bigInteger('nbr_personne_mort');
            $table->date("horodatage");
            //$table->foreign('zone_id')->references('id')->on('zones');
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
        Schema::dropIfExists('situations');
    }
}
