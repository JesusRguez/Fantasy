
<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

		$this->call([
        fantasiesSeeder::class,
		activepointsSeeder::class,
        quizesSeeder::class,
        questionsSeeder::class,
        answerseed::class,
	]);
        // $this->call(UsersTableSeeder::class);
    }
}
