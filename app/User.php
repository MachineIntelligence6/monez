<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable 
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function advertiser(){
        return $this->hasOne(Advertiser::class, 'user_id');
    }

    public function publisher(){
        return $this->hasOne(Publisher::class, 'user_id');
    }

    public function advertisers(){
        return $this->hasMany(Advertiser::class, 'team_member_id');
    }

    public function publishers(){
        return $this->hasMany(Publisher::class, 'team_member_id');
    }

    public function generateApiToken()
    {
        $this->remember_token = str_random(60);
        $this->save();

        return $this->remember_token;
    }    
}
