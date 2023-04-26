<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    public function feeds()
    {
        // return $this->hasMany(Feed::class);

        return $this->hasMany(Feed::class, 'id', 'feed_ids');
    }
   
    
    public function channelintegration()
    {
        return $this->belongsTo(ChannelIntegrationGuide::class, 'id', 'channel_id');
    }
}
