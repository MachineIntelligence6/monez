<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Channel extends Model
{
    use HasFactory;
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }
    public function channelpath()
    {
        return $this->belongsTo(ChannelPath::class, 'channel_path_id', 'id');
    }
    public function feeds()
    {
        $feedIds = explode(',', $this->feed_ids);
        $feeds = DB::table('feeds')->whereIn('id', $feedIds)->orderBy('daily_ip_cap_count')->get();
        return $feeds;
    }

    public function makeFeedAvailable()
    {
        foreach ($this->feeds() as $feed) {
            if (Channel::where('feed_ids',$feed->id)->where('is_active', true)->exists()) {
                DB::table('feeds')->where('id', $feed->id)->update(['status' => 'available']);
            }
        }
    }

    public function channelintegration()
    {
        return $this->belongsTo(ChannelIntegrationGuide::class, 'id', 'channel_id');
    }
}
