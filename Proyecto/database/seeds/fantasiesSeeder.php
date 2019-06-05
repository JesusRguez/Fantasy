<?php

use Illuminate\Database\Seeder;

class fantasiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('fantasies')->insert([
            'id' => 666,
            'token' => 1,
			'description' => 'Reciclying is the most important action at the moment because we need to save our planet',
			'name' => 'Reciclying',
			'image' => 'uploads/images/1',
			'backgroundImage' => 'uploads/background/1',
			'created_at' => 20190424180436,
			'updated_at' => 20190424180436,
        ]);
        //
    }
}
