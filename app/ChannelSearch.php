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
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}
