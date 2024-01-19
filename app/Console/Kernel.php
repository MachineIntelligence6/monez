<?php

namespace App\Console;

use App\Feed;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\UpdateChannelStatus',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('channel:pause-if-no-search')->dailyAt('23:59');
        $schedule->command('report:update-channels-activity')->dailyAt('14:00');
        $schedule->call(function () {
            foreach (Feed::all() as $key => $feed) {
                $feed->daily_search_cap_count = 0;
                $feed->daily_ip_cap_count = 0;
                $feed->save();
            }

        })->dailyAt('23:59');
        // $schedule->command('channel:pause-if-no-search')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
