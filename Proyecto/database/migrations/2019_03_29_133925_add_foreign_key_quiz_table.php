<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('quizes', function (Blueprint $table) {
          $table->bigInteger('id_fantasy')->unsigned()->nullable(); //como un quiz es de una fantasia o de un ap, 1 campo sera siempre nulo
          $table->bigInteger('id_activepoint')->unsigned()->nullable();
          $table->bigInteger('id_student1')->unsigned()->nullable();
          $table->bigInteger('id_student2')->unsigned()->nullable();

          $table->foreign('id_fantasy')->references('id')->on('fantasies')->onDelete('cascade');
          $table->foreign('id_activepoint')->references('id')->on('activepoints')->onDelete('cascade');
          $table->foreign('id_student1')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('id_student2')->references('id')->on('users')->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('quizes', function (Blueprint $table) {
      $table->dropForeign('quiz_id_fantasy_foreign');
      $table->dropForeign('quiz_id_activepoint_foreign');
      $table->dropForeign('quiz_id_student1_foreign');
      $table->dropForeign('quiz_id_student2_foreign');

 });
    }
}
