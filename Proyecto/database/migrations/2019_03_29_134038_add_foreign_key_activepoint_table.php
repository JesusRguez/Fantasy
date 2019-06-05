<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyActivepointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('activepoints', function (Blueprint $table) {

        $table->bigInteger('id_fantasy')->unsigned();
        $table->foreign('id_fantasy')->references('id')->on('fantasies')->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('activepoints', function (Blueprint $table) {
     $table->dropForeign('activepoint_id_fantasy_foreign');
 });
    }
}
