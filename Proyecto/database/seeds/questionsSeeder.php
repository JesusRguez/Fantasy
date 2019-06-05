<?php

use Illuminate\Database\Seeder;

class questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('questions')->insert([
        'id' => 666,
        'questiontext' => '¿Como se llama el Caraballo?',
        'score'=> 3,
        'id_quiz'=> 666,
        'type' => 1,
          ]);
      DB::table('questions')->insert([
        'id' => 667,
        'questiontext' => '¿Como se llama el Segovia?',
        'score'=> 2,
        'type'=> 1,
        'id_quiz'=> 666,
              ]);
    }
}
