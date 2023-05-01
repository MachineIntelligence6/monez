<?php

use App\TeamMember;
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
        $this->call(BankSeeder::class);
		// $this->call(CountriesSeeder::class);
		$this->call(UserSeeder::class);

        TeamMember::create([
            'name'=>'ads',
            'email'=>'asdas@gmail.com',
            'password'=>'asdsad',
            'amPhone'=>'asd'
        ]);
    }
}


