<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivepointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('activepoints', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('token');
          $table->integer('turn')->nullable();
          $table->string('title')->nullable();
          $table->string('text', 1000)->nullable();
          $table->string('image')->nullable();
          $table->string('audio')->nullable();
          $table->string('video')->nullable();
          $table->string('music')->nullable();
          $table->string('coordinateX')->nullable();
          $table->string('coordinateY')->nullable();
          $table->string('height')->nullable();
          $table->string('width')->nullable();
          $table->string('status')->nullable();
		      $table->string('html', 800)->nullable();
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
        Schema::dropIfExists('activepoints');
    }
}
