<?php

namespace App\Http\Controllers;

use App\ChannelSearch;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function activity()
    {
        $channelSearchs = ChannelSearch::all();
        return view("reports.activity", compact('channelSearchs'));
    }


    public function revenue()
    {
        return view("reports.revenue");
    }
}
