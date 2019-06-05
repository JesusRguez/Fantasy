<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyFantasyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('fantasies', function (Blueprint $table) {
        $table->bigInteger('id_quiz')->unsigned()->nullable();
        $table->bigInteger('id_author')->unsigned()->nullable();
        $table->foreign('id_quiz')->references('id')->on('quizes')->onDelete('cascade');
        $table->foreign('id_author')->references('id')->on('users')->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('fantasies', function (Blueprint $table) {
         $table->dropForeign('fantasy_id_quiz_foreign');
         $table->dropForeign('fantasy_id_author_foreign');
     });
    }
}
