<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nombre_slot');
            $table->integer('nombre_item');
            $table->unsignedBigInteger('personnage_id');
            $table->timestamps();

            // si suppression du user, alors suppression de tous les personnages liés à ce user
            $table->foreign('personnage_id')
                ->references('id')
                ->on('personnages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaires');
    }
}
