<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			// 'role_id' => 1,
            'name' => 'User',
			'first_name' => '',
			'last_name' => '',
			'phone' => '',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Mi612345@')
        ]);
    }
}
