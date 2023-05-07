<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPath extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_path',
        'is_default',
        'status',
    ];
}
