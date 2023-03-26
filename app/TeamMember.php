<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = [];
    public function advertisers(){
        $this->belongsTo(Advertiser::class,'advertiser_id','id');
    }
}
