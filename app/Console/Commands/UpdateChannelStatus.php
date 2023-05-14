<?php

namespace App\Console\Commands;

use App\Channel;
use App\ChannelSearch;
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
        foreach (Channel::all() as $key => $channel) {

            $channelSearch = ChannelSearch::where('channel_id', $channel->id)
            ->whereBetween('created_at', [Carbon::now()->subDay(), Carbon::now()])->get();
            if($channelSearch){
                $channel->status = 'pause';
                $channel->save();
            }
        }
        return Command::SUCCESS;
    }
}
