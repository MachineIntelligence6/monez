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
    public function feed()
    {
        // return $this->belongsTo(Feed::class,'feed_ids','id');
        return $this->hasMany(Feed::class, 'id', 'feed_ids');
    }
    // protected $fillable = [
    //     // ... other attributes ...
    //     'feed_ids',
    // ];

    // Relationship to retrieve related feeds
    // public function feeds()
    // {
    //     // Explode the comma-separated string to an array of IDs
    //     $feedIds = explode(',', $this->feed_ids);
    //     // Use whereIn to filter feeds by IDs in the feedIds array
    //     return $this->hasMany(Feed::class, 'id')->whereIn('id', $feedIds);
    // }
    // public function getFeedIdsAttribute()
    // {
    //     return json_decode($this->attributes['feed_ids'], true);
    // }

    // public function feeds()
    // {
    //     return Feed::whereIn('id', $this->getFeedIdsAttribute())->get();
    // }
   
    public function channelintegration()
    {
        return $this->belongsTo(ChannelIntegrationGuide::class, 'id', 'channel_id');
    }
}
