<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Team Member 1',
            'email' => 't1@gmail.com',
            'password' => Hash::make('Mi612345@'),
            'role' => 'Team Member'
        ]);
        User::create([
            'name' => 'Team Member 2',
            'email' => 't2@gmail.com',
            'password' => Hash::make('Mi612345@'),
            'role' => 'Team Member'
        ]);

        User::create([
            'name' => 'Team Member 3',
            'email' => 't3@gmail.com',
            'password' => Hash::make('Mi612345@'),
            'role' => 'Team Member'
        ]);

        User::create([
            'name' => 'Team Member 4',
            'email' => 't4@gmail.com',
            'password' => Hash::make('Mi612345@'),
            'role' => 'Team Member'
        ]);
    }
}
