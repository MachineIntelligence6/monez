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
    public function teamMember()
    {
        return $this->hasOne(TeamMember::class,'id','team_member_id' );
    }
    public function bankDetails()
    {
        return $this->hasOne(AdvertiserBankDetail::class,'advertiser_id','id' );
    }
    public function reportColumns()
    {
        return $this->hasOne(AdvertiserReportColumn::class,'advertiser_id','id' );
    }
    public function reportTypes()
    {
        return $this->hasOne(AdvertiserReportType::class,'advertiser_id','id' );
    }


}
