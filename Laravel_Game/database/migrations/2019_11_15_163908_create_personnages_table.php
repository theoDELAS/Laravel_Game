<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pseudo')->unique();
            $table->integer('lvl_perso');
            $table->integer('hp');
            $table->integer('degats');
            $table->integer('defense');
            $table->integer('esquive');
            $table->integer('histoire_completed');
            $table->timestamps();
        });

        Schema::create('personnage_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('personnage_id');
            $table->timestamps();

            $table->unique(['user_id', 'personnage_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('personnage_id')->references('id')->on('personnages')->onDelete('cascade');
        });

        Schema::create('classe_personnage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('personnage_id');
            $table->timestamps();

            $table->unique(['classe_id', 'personnage_id']);

            $table->foreign('classe_id')->references('id')->on('classe')->onDelete('cascade');
            $table->foreign('personnage_id')->references('id')->on('personnages')->onDelete('cascade');
        });

        Schema::create('inventaire_personnage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inventaire_id');
            $table->unsignedBigInteger('personnage_id');
            $table->timestamps();

            $table->unique(['inventaire_id', 'personnage_id']);

            $table->foreign('inventaire_id')->references('id')->on('inventaires')->onDelete('cascade');
            $table->foreign('personnage_id')->references('id')->on('personnages')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnages');
    }
}
