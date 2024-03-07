<?php

namespace App\Console\Commands;

use App\Channel;
use App\ChannelSearch;
use App\Feed;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateChannelStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'channel:pause-if-no-search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pause channel status if no search happens.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();

        foreach (Channel::all() as $key => $channel) {
            $channelSearches = ChannelSearch::where('channel_id', $channel->id)
            ->whereBetween('created_at', [Carbon::now()->subDay(), Carbon::now()])->get();
            if($channelSearches){
                $channel->status = 'pause';
                $channel->save();
            }
        }

        $feeds = Feed::where('last_activity_at', '=<', $startOfDay)->get();

        foreach ($feeds as $key => $feed) {
            $feed->status = 'paused';
            $feed->save();
        }
        return Command::SUCCESS;
    }
}
