<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelSearch;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;

class RoutingController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $startTime = microtime(true);
        // dd($request->header('X-Request-StartTime'));
        if($request->has('channel')){
            $cahnnel = Channel::where('channelId', $request->channel)->get()->first();
            if($cahnnel){
                $channelSearch = ChannelSearch::create([
                    'channel_id' => $cahnnel->id,
                    'ip_address' => $request->ip(),
                    'browser' => Agent::browser(),
                    'device' => Agent::device(),
                    'os' => Agent::platform(),
                ]);
                $cahnnel->status = 'live';
                $cahnnel->save();
                $channelSearch->latency = microtime(true) - $startTime;
                $channelSearch->save();
            }
        }
        return view('auth.login');
    }

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root($first)
    {

        if ($first != 'assets')
            return view($first);
        return view('auth.login');
    }

    /**
     * second level route
     */
    public function secondLevel($first, $second)
    {
        if ($first != 'assets')
            return view($first.'.'.$second);
        return view('auth.login');
    }

    /**
     * third level route
     */
    public function thirdLevel($first, $second, $third)
    {
        if ($first != 'assets')
            return view($first.'.'.$second.'.'.$third);
        return view('auth.login');
    }
}
