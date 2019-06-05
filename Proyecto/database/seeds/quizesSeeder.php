<?php

use Illuminate\Database\Seeder;

class quizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('quizes')->insert([
        'id' => 666,
        'id_fantasy' => 666,
        'id_activepoint' => 666,
          ]);
    }
}
