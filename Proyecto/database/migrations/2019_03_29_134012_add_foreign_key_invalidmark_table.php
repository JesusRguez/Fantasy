<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyInvalidmarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('invalidmarks', function (Blueprint $table) {

        $table->bigInteger('id_quiz')->unsigned();
        $table->foreign('id_quiz')->references('id')->on('quizes')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('invalidmarks', function (Blueprint $table) {
     $table->dropForeign('invalidmark_id_quiz_foreign');
 });
    }
}
