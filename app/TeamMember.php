<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    public function advertisers(){
        return $this->belongsTo(Advertiser::class,'id','team_member_id');
    }
}
