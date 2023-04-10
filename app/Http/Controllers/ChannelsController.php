<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelIntegrationGuide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publisher;
use App\Feed;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('channels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers= Publisher::all();
        $feeds= Feed::all();
        return view('channels.create',compact('publishers','feeds'));
    }

    public function store(Request $request)
    {

        dd('test');
        // $validatedData = $request->validate([
        //     'publisher' => 'required',
        //     'channelId'  => 'required',
        // ]);
        // $channelId = "fd_" . $request->feedId;
        $channelId = "fd_12345";
        $channel = new Channel;

        $channel->publisher_id = $request->publisher;
        $channel->channelId = 'ch_012345';
        // $channel->channelId = $channelId;
        $channel->c_priorityScore = $request->c_priorityScore;
        $channel->c_comments = $request->c_comments;
        $channel->is_active= true;
        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        $assign_feed = $request->input('feed');
        $daily_cap = $request->input('dailyCap');

        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal);
        $mergedArrayStat = [];
        $mergedArrayDy = [];
        $mergeArrayFeed =[];

        for ($i = 0; $i < count($s_paramName); $i++) {
            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        }
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        }
        for ($i = 0; $i < count($assign_feed); $i++) {
            $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . $daily_cap[$i];
        }
        $channel->staticParameters = json_encode($mergedArrayStat);
        $channel->dynamicParameters = json_encode($mergedArrayDy);
        $channel->c_assignedFeeds = json_encode($mergeArrayFeed);
        // $channel->save();
        $channelId = 'ch_012345';
        // $channelId = $channel->id;
        $channelInegration = new ChannelIntegrationGuide;
        $channelInegration->channel_id = $channelId;
        $channelInegration->c_guideUrl = $request->c_guideUrl;
        $channelInegration->c_subids = $request->c_subids;
        $channelInegration->c_dailyCap = $request->c_dailyCap;
        $channelInegration->c_acceptedGeos = $request->c_acceptedGeos;
        $channelInegration->c_searchEngine = $request->c_searchEngine;
        $channelInegration->c_feedType = $request->c_feedType;
        $channelInegration->c_trafficType = $request->c_trafficType;
        $channelInegration->c_trafficSources = $request->c_trafficSources;
        $channelInegration->c_platform = $request->c_platform;
        $channelInegration->c_browsers = $request->c_browsers;
        $channelInegration->c_otherRequirements = $request->c_otherRequirements;
        
        // $channelInegration->save();

        dd($channel,$channelInegration);
        return redirect()->route('feeds.index')->with('success', 'Feed Form Data Has Been Inserted Successfuly');

        // return view('feeds.index', compact('feeds'))->with('success', 'Feed Form Data Has Been Inserted Successfuly:');
        // return redirect()->back()->with('success', 'Feed Form Data Has Been Inserted Successfuly:');
    }

    public function ChannelId(Request $request)
    {
        
    }
}
