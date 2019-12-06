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
            $table->integer('hp');
            $table->integer('degats');
            $table->integer('defense');
            $table->integer('esquive');
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
