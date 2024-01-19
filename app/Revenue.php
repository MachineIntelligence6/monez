<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_date',
        'revenue_share',
        'channel_id',
        'advertiser_id',
        'publisher_id',
        'feed_id',
        'channel',
        'advertiser',
        'publisher',
        'feed',
    ];
}
