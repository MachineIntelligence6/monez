<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    public function advertisers()
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id', 'id');
    }
    public function feedintegration()
    {
        return $this->belongsTo(FeedIntegrationGuide::class, 'id', 'feed_id');
    }
    // public function channel()
    // {

    //     // return $this->belongsTo(Channel::class);
    //     return $this->belongsTo(Channel::class, 'feed_ids', 'id');
    // }
    public function channel(){
        return $this->belongsTo(Channel::class,'id','feed_ids');
    }
}
