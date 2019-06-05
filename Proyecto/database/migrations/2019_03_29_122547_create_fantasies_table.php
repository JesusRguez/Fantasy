<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fantasies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('topic')->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('state')->nullable(); // 0 No publicada  y 1 Publicada
            $table->string('password')->nullable();
            $table->string('description')->nullable();
            $table->string('name');
            $table->string('author');
            $table->string('image')->nullable();
            $table->string('backgroundColor')->nullable();
            $table->string('backgroundImage')->nullable();

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
        Schema::dropIfExists('fantasies');
    }
}
