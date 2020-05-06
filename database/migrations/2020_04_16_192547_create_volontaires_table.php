<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolontairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volontaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('expertise_id');
            $table->string('noms', 100);
            $table->string('prenon', 100)->nullable();
            $table->string('couriel', 100)->nullable();
            $table->string('photo', 100);
            $table->string('reference', 100);
            //$table->foreign('expertise_id')->references('id')->on('expertises');
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
        Schema::dropIfExists('volontaires');
    }
}
