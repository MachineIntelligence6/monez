<?php

use App\Channel;
use App\ChannelPath;
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

        if(config('app.env') == 'local'){
            $channelPath = new ChannelPath();
            $channelPath->status = '1';
            $channelPath->channel_path = 'http://127.0.0.1:8000/';
            $channelPath->save();

            $teamMember = new User();
            $teamMember->name = 'Test User 1';
            $teamMember->email = 'abc@example.com';
            $teamMember->password = Hash::make('abc');
            $teamMember->skype = 'skype987';
            $teamMember->linkedin = 'linkedin.com';
            $teamMember->phone = '+92982684623984320';
            $teamMember->country_code = '92';
            $teamMember->save();

        }

    }
}


