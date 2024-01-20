<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'revenue_date',
        'channel_id',
        'advertiser_id',
        'publisher_id',
        'feed_id',
        'channel',
        // 'advertiser',
        // 'publisher',
        'sub_id',
        'geo',
        'total_searches',
        'monetized_searches',
        'paid_clicks',
        'net_revenue',
        'coverage',
        'ctr',
        'rpm',
        'monetized_rpm',
        'epc',
        'gross_revenue',
        'report_id',
        'daily_reports_status'
    ];

    public function getPublisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    public function getAdvertiser()
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id', 'id');
    }

    public function feed()
    {
        return $this->belongsTo(Feed::class, 'feed_id', 'id');
    }
}
