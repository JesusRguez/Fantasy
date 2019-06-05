<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('files', function (Blueprint $table) {

        $table->bigInteger('id_activepoint')->unsigned();
        $table->foreign('id_activepoint')->references('id')->on('activepoints')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('files', function (Blueprint $table) {
     $table->dropForeign('file_id_activepoint_foreign');
 });
    }
}
