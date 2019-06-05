<?php

use Illuminate\Database\Seeder;

class answerseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
	        'id' => 666,
	        'answertext' => 'Alejandro José',
	        'id_question'=> 666,
	        'token_pa' => 1,
	        'created_at' => 20190424180436,
			'updated_at' => 20190424180436,
        ]);
      	DB::table('answers')->insert([
	        'id' => 667,
	        'answertext' => 'Alejandro',
	        'token_pa' => 2,
	        'id_question'=> 667,
	        'created_at' => 20190424180436,
			'updated_at' => 20190424180436,
	    ]);
      	
    }
}
