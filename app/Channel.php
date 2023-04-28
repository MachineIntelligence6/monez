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
        // return $this->hasMany(Feed::class);

        return $this->hasMany(Feed::class, 'id', 'feed_ids');
        // return $this->hasMany(Feed::class)->whereIn('id', explode(',', $this->feed_ids));
        // $feedIds = explode(',', $this->feed_ids);
        // // dd($feedIds);
        // // $return = $this->hasMany(Feed::class, 'id', 'feed_ids')->whereIn('id', $feedIds);
        // return $this->hasMany(Feed::class, 'id', 'feed_ids')->whereIn('id', $feedIds);


    }
    
    public function channelintegration()
    {
        return $this->belongsTo(ChannelIntegrationGuide::class, 'id', 'channel_id');
    }
}
