<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    public function advertisers(){
        $this->hasMany(Advertiser::class,'advertiser_id','id');
    }
    public function feedintegration(){
        $this->hasOne(FeedIntegrationGuide::class,'feedId','id');
    }
}
