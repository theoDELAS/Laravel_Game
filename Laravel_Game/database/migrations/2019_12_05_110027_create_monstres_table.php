<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonstresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monstres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
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
        Schema::dropIfExists('monstres');
    }
}
