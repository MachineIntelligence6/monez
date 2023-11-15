<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiserReportColumn extends Model
{
//    use HasFactory;
    protected $table = 'advertiser_report_columns';
    protected $guarded = [];


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

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }      
}
