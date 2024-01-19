<?php

namespace App\Console\Commands;

use App\Activity;
use App\Channel;
use App\ChannelSearch;
use App\Feed;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateActivityReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:update-channels-activity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "update/add entry in activity report for channel' revenue share";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Channel::all() as $key => $channel) {
            if (isset($channel->feed_ids)) {
                $channelFeedIds = explode(',', $channel->feed_ids);

                foreach ($channelFeedIds as $key => $feedId) {
                    $feed = Feed::find($feedId);
                    if ($feed) {
                        $activity = Activity::where('activity_date', Carbon::today())
                            ->where('channel_id', $channel ? $channel->id : null)
                            ->where('advertiser_id', $feed->advertiser_id)
                            ->where('publisher_id', $channel->publisher_id)
                            ->where('feed_id', $feed->id)
                            ->first();
                        if ($activity) {
                            $activity->revenue_share = $channel->publisher->revenue_share;
                            $activity->save();
                        } else {
                            Activity::create([
                                'activity_date' => Carbon::today(),
                                'channel' =>  $channel->channelId,
                                'publisher' =>  $channel->publisher ? $channel->publisher->publisher_id : null,
                                'revenue_share' => $channel->publisher ? $channel->publisher->revenue_share : null,
                                'feed' => $feed->feedId,
                                'advertiser' =>  $feed->advertiser ? $feed->advertiser->advertiser_id : null,

                                'channel_id' => $channel->id,
                                'advertiser_id' => $feed->advertiser_id,
                                'publisher_id' => $channel->publisher_id,
                                'feed_id' => $feed->id
                            ]);
                        }
                    }
                }
            }
        }
        return Command::SUCCESS;
    }
}
