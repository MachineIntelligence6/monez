<?php

namespace App\Console\Commands;

use App\Channel;
use App\ChannelSearch;
use App\Feed;
use App\FeedIntegrationGuide;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ResetChannelCap extends Command
{
    protected $signature = 'channel:reset-cap';

    protected $description = 'Reset channel cap at midnight';

    public function handle(){
        foreach (Channel::all() as $key => $channel) {
            if($channel->feed_ids === null or trim($channel->feed_ids) === ''){
                continue;
            }

            $data = [];

            $feeds = explode(',', $channel->feed_ids);
            foreach($feeds as $feedId){
                $feedIntegrationGuide = FeedIntegrationGuide::where('feed_id', trim($feedId))->get()->first();

                $data[] = sprintf('%s , %s', $feedId, $feedIntegrationGuide->dailyCap);
            }

            $channel->c_assignedFeeds = json_encode($data);
            $channel->save();
        }

        return Command::SUCCESS;
    }
}
