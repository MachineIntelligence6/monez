<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_id',
        'no_of_redirects',
        'ip_address',
        'user_agent',
        'latency',
        'device',
        'os',
        'browser',
        'advertiser_id',
        'publisher_id',
        'feed_id',
        'feed',
        'publisher',
        'location',
        'subid',
        'referer',
        'query',
        'no_of_redirects',
        'alert',
        'geo',
        'screen_resolution',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function feed()
    {
        return $this->belongsTo(Feed::class, 'feed_id');
    }

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id');
    }
}
