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
            $table->string('pseudo');
            $table->integer('lvl_perso');
            $table->unsignedBigInteger('user_id');
            $table->integer('histoire_completed');
            $table->string('class');
            $table->integer('hp_base');
            $table->integer('hp_max');
            $table->integer('hp_current');
            $table->integer('degat_base');
            $table->integer('degat_max');
            $table->integer('degat_current');
            $table->integer('defense_base');
            $table->integer('defense_max');
            $table->integer('defense_current');
            $table->integer('esquive_base');
            $table->integer('esquive_max');
            $table->integer('esquive_current');
            $table->unsignedBigInteger('inventaire_id');
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
        Schema::dropIfExists('personnages');
    }
}
