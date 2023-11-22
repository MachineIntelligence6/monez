<?php

use App\Channel;
use App\ChannelPath;
use App\Feed;
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

        // User::create([
        //     'name' => 'Rajat Gupta',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('Mi612345@'),
        //     'role' => 'Admin'
        // ]);

        if (config('app.env') == 'local') {
            $channelPath = new ChannelPath();
            $channelPath->status = '1';
            $channelPath->channel_path = 'http://127.0.0.1:8000/';
            $channelPath->save();

            $teamMember = new User();
            $teamMember->name = 'Rajat Gupta';
            $teamMember->email = 'searchmonez@gmail.com';
            $teamMember->password = Hash::make('1234567');
            $teamMember->skype = 'skype987';
            $teamMember->linkedin = 'linkedin.com';
            $teamMember->phone = '+91982684623984320';
            $teamMember->country_code = '91';
            $teamMember->save();
        }

        $feed = new Feed();
        $feed->feedId = 'F1';
        $feed->reportId = 'F1_fallback';
        $feed->feedPath = 'https://www.google.com/search';
        $feed->status = 'disabled';
        $feed->state = 'enabled';
        $feed->is_default = true;
        $feed->save();
    }
}


