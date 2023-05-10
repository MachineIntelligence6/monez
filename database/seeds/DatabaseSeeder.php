<?php

use App\TeamMember;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

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
		$this->call(CountrySeeder::class);
		// $this->call(UserSeeder::class);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Mi612345@'),
            'role' => 'Admin'
        ]);

    }
}


