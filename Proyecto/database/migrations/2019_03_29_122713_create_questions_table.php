<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(1000);
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('questiontext')->nullable();
	        $table->string('image')->nullable(); //Only the final quiz can have images in its questions
            $table->tinyInteger('type')->nullable(); /* 4 tipos
                    1: Tipo Test de toda la vida
                    2: Multirespuesta
                    3: Una palabra
                    4: Pequeño desarrollo valuable por la profesora esta opción solo existe en quiz final
            */
            $table->double('score')->nullable();;
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
        Schema::dropIfExists('questions');
    }
}
