<?php

namespace App\Imports;

use App\Activity;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Advertiser;
use App\Channel;
use App\Feed;
use App\Publisher;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportActivity implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $channel = Channel::where('channelId', $row[1])->first();
        $publisher = Publisher::where('publisher_id', $row[1])->first();
        $feed = Feed::where('feedId', $row[1])->first();
        $advertiser = Advertiser::where('advertiser_id', $row[1])->first();

        $activity = Activity::where('activity_date', $row[0])
            ->where('channel_id', $channel ? $channel->id : null)
            ->where('advertiser_id', $advertiser ? $advertiser->id : null)
            ->where('publisher_id', $publisher ? $publisher->id : null)
            ->where('feed_id', $feed ? $feed->id : null)
            ->first();

        if ($activity) {
            $activity->revenue_share = $row[3];
            $activity->save();
        } else {
            return new Activity([
                'activity_date' => $row[0],
                'channel' =>  $row[1],
                'publisher' =>  $row[2],
                'revenue_share' => $row[3],
                'feed' => $row[4],
                'advertiser' =>  $row[5],

                'channel_id' => $channel ? $channel->id : null,
                'advertiser_id' => $advertiser ? $advertiser->id : null,
                'publisher_id' => $publisher ? $publisher->id : null,
                'feed_id' => $feed ? $feed->id : null,
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
