<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    public function advertisers(){
        return $this->belongsTo(Advertiser::class,'advertiser_id','id');
    }
    public function feedintegration(){
        return $this->belongsTo(FeedIntegrationGuide::class,'id','feed_id');
    }
}
