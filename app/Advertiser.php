<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertiser extends Model
{
    // use HasFactory;
    protected $guarded = [];

    public function advertisers()
    {
        return $this->hasMany(TeamMember::class );
    }


}
