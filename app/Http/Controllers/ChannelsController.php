<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelIntegrationGuide;
use App\ChannelPath;
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
        $channels = Channel::orderBy('created_at', 'desc')->get();
        
        $ids = [];
        foreach ($channels as $channel) {
            $data = $channel->c_assignedFeeds;
            if ($data !== null) {
                $array = json_decode($data, true);
                foreach ($array as $key => $value) {
                    $parts = explode(' , ', $value);
                    $ids[] = $parts[0];
                }
            }
        }
        $assignedfeeds = Feed::whereIn('id', $ids)->get();
        $channels = Channel::all();

    // Get feeds for each channel
    // foreach ($channels as $channel) {
    //     $feedIds = explode(',', $channel->feed_ids);
    //     $channel->feeds = Feed::whereIn('id', $feedIds)->get();
    // }


        return view('channels.index', compact('channels', 'assignedfeeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        $publisherIds = $publishers->pluck('id')->toArray();
        $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)->get();
        $assignedPublisherIds = $assignedPublishers->pluck('publisher_id')->toArray();
        $availablePublishers = Publisher::whereNotIn('id', $assignedPublisherIds)->get();
        $channelpath = ChannelPath::all();
        $channelpathIds = $channelpath->pluck('id')->toArray();
        $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)->get();
        $assignedchannelpathIds = $assignedchannelpaths->pluck('channel_path_id')->toArray();
        $availablechannelpaths = ChannelPath::whereNotIn('id', $assignedchannelpathIds)->get();

        $channels = Channel::all();
        // dd($availablechannelpaths,$assignedchannelpaths);
        $ids = [];
        foreach ($channels as $channel) {
            $data = $channel->c_assignedFeeds;
            if ($data !== null) {
                $array = json_decode($data, true);
                foreach ($array as $key => $value) {
                    $parts = explode(' , ', $value);
                    $ids[] = $parts[0];
                }
            }
        }

        $feeds = Feed::all();
        $feedsIds = $feeds->pluck('id')->toArray();
        $assignedfeeds = Feed::whereIn('id', $ids)->get();
        $assignedfeedsIds = $assignedfeeds->pluck('id')->toArray();
        $availablefeeds = Feed::whereNotIn('id', $assignedfeedsIds)->get();
        $latestChannel = Channel::latest()->first();

        if ($latestChannel) {
            $channelId = $latestChannel->channelId;
            $numericPart = (int) substr($channelId, 1);
            // Increment the numeric part
            $numericPart++;
            // Generate a new underscore part with alphabetic and numeric characters
            $newUnderscorePart = "";
            $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $length = 5; // desired length of the new underscore part
            for ($i = 0; $i < $length; $i++) {
                $newUnderscorePart .= $characters[rand(0, strlen($characters) - 1)];
            }
            // Update the id with the incremented numeric part and new underscore part
            $newId = "C" . $numericPart . "_" . $newUnderscorePart;
        } else {
            $newId = 'C1_c1wRL';
        }
        // dd($channelId,$newId);
        $channelId = $newId;
        // dd($channelId);
        // dd($channelId,$availablefeeds);
        return view('channels.create', compact('availablePublishers','availablechannelpaths', 'feeds', 'channelId'));
    }

    public function store(Request $request)
    {
        $channel = new Channel;
        // dd($channel,$channelId);
        $channel->publisher_id = '1';
        // $channel->publisher_id = $request->publisher;
        $channel->channelId = $request->channelId;
        $channel->channel_path_id = $request->channel_path_id;
        $channel->c_priorityScore = $request->c_priorityScore;
        $channel->c_comments = $request->c_comments;
        $channel->is_active = true;
        $channel->status = 'enable';

        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        $assign_feed = $request->input('feed');
        $daily_cap = $request->input('dailyCap');

        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal,$assign_feed,$daily_cap);
        $mergedArrayStat = [];
        $mergedArrayDy = [];
        $mergeArrayFeed = [];
        $ids = [];

        for ($i = 0; $i < count($s_paramName); $i++) {
            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        }
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        }
        for ($i = 0; $i < count($assign_feed); $i++) {
            $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . $daily_cap[$i];
            $ids[] = (string) $assign_feed[$i];
        }
        $feedIds = $ids; // Array of feed IDs
        $channel->feed_ids = implode(',', $feedIds);
        // $channel->feed_ids = json_encode($ids);
        $channel->c_staticParameters = json_encode($mergedArrayStat);
        $channel->c_dynamicParameters = json_encode($mergedArrayDy);
        $channel->c_assignedFeeds = json_encode($mergeArrayFeed);
        $channel->save();
        $channel_Id = $channel->id;
        $channelInegration = new ChannelIntegrationGuide;
        $channelInegration->channel_id = $channel_Id;
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

        $channelInegration->save();

        // dd($channel,$channelInegration);
        return redirect()->route('channels.index')->with('success', 'Channel Form Data Has Been Inserted Successfuly');

        // return redirect()->back()->with('success', 'Channel Form Data Has Been Inserted Successfuly:');
    }

    public function view(Channel $channel)
    {

        $channelId = $channel->channelId;
        // dd('test',$channel);
        $publishers = Publisher::all();

        $selectedpublisher = $channel->publisher_id;
        $selectedchannelpath = $channel->channel_path_id;
        $publisherIds = $publishers->pluck('id')->toArray();
        // $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)->get();
        $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)
            ->whereNotIn('publisher_id', [$selectedpublisher])
            ->get();
        $assignedPublisherIds = $assignedPublishers->pluck('publisher_id')->toArray();
        $availablePublishers = Publisher::whereNotIn('id', $assignedPublisherIds)->get();
        $feedids = $channel->feed_ids;
        $feed_ids_array = json_decode($feedids, true);
        $feeds = Feed::all();
        $channelpath = ChannelPath::all();
        $channelpathIds = $channelpath->pluck('id')->toArray();
        $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)
        ->whereNotIn('publisher_id', [$selectedpublisher])
        ->get();        $assignedchannelpathIds = $assignedchannelpaths->pluck('channel_path_id')->toArray();
        $availablechannelpaths = ChannelPath::whereNotIn('id', $assignedchannelpathIds)->get();
        return view('channels.create', compact('channel', 'selectedpublisher','selectedchannelpath','availablechannelpaths', 'availablePublishers', 'feeds', 'channelId'));
    }

    public function edit(Channel $channel)
    {
        $channelId = $channel->channelId;
        // dd('test',$channel);
        $publishers = Publisher::all();

        $selectedpublisher = $channel->publisher_id;
        $selectedchannelpath = $channel->channel_path_id;
        $publisherIds = $publishers->pluck('id')->toArray();
        // $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)->get();
        $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)
            ->whereNotIn('publisher_id', [$selectedpublisher])
            ->get();
        $assignedPublisherIds = $assignedPublishers->pluck('publisher_id')->toArray();
        $availablePublishers = Publisher::whereNotIn('id', $assignedPublisherIds)->get();
        $feedids = $channel->feed_ids;
        $feed_ids_array = json_decode($feedids, true);
        $feeds = Feed::all();
        // $feedsIds = $feeds->pluck('id')->toArray();

        $channelpath = ChannelPath::all();
        $channelpathIds = $channelpath->pluck('id')->toArray();
        $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)
            ->whereNotIn('publisher_id', [$selectedpublisher])
            ->get();
        // $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)->get();
        $assignedchannelpathIds = $assignedchannelpaths->pluck('channel_path_id')->toArray();
        $availablechannelpaths = ChannelPath::whereNotIn('id', $assignedchannelpathIds)->get();
        // dd($availablechannelpaths);
        return view('channels.create', compact('channel','availablechannelpaths','selectedchannelpath', 'selectedpublisher', 'availablePublishers', 'feeds', 'channelId'));
    }


    public function update(Request $request, Channel $channel)
    {
        // $validatedData = $request->validate([

        // ]);

        $channel->publisher_id = $request->publisher;
        $channel->channel_path_id = $request->channel_path_id;
        $channel->c_priorityScore = $request->c_priorityScore;
        $channel->c_comments = $request->c_comments;
        // $channel->is_active = true;
        if ($channel->status == 'disable') {
            $channel->status = 'disable';
        } else {
            $channel->status = $request->status;
        };


        // dd($request->status);
        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        $assign_feed = $request->input('feed');
        $daily_cap = $request->input('dailyCap');

        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal,$assign_feed,$daily_cap);
        $mergedArrayStat = [];
        $mergedArrayDy = [];
        $mergeArrayFeed = [];
        $ids = [];

        for ($i = 0; $i < count($s_paramName); $i++) {
            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        }
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        }
        for ($i = 0; $i < count($assign_feed); $i++) {
            $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . $daily_cap[$i];
            $ids[] = (string) $assign_feed[$i];
        }
        // $channel->feed_ids = json_encode($ids);
        $channel->feed_ids = implode(', ', $ids);

        $channel->c_staticParameters = json_encode($mergedArrayStat);
        $channel->c_dynamicParameters = json_encode($mergedArrayDy);
        $channel->c_assignedFeeds = json_encode($mergeArrayFeed);
        $channel->update();
        $channelId = $channel->id;

        $channelIntegration = ChannelIntegrationGuide::where('channel_id', $channelId)->firstOrFail();
        $channelIntegration->channel_id = $channelId;
        $channelIntegration->c_guideUrl = $request->c_guideUrl;
        $channelIntegration->c_subids = $request->c_subids;
        $channelIntegration->c_dailyCap = $request->c_dailyCap;
        $channelIntegration->c_acceptedGeos = $request->c_acceptedGeos;
        $channelIntegration->c_searchEngine = $request->c_searchEngine;
        $channelIntegration->c_feedType = $request->c_feedType;
        $channelIntegration->c_trafficType = $request->c_trafficType;
        $channelIntegration->c_trafficSources = $request->c_trafficSources;
        $channelIntegration->c_platform = $request->c_platform;
        $channelIntegration->c_browsers = $request->c_browsers;
        $channelIntegration->c_otherRequirements = $request->c_otherRequirements;

        $channelIntegration->update();
        return redirect()->route('channels.index')->with('success', 'Channel Form Data Has Been Updated Successfuly:');
    }

    public function enable(Channel $channel)
    {
        // $channel->is_active = true;
        $channel->status = 'enable';
        $channel->save();
        return redirect()->back();
    }

    public function disable(Channel $channel)
    {
        // $channel->is_active = false;
        $channel->status = 'disable';
        $channel->save();
        return redirect()->back();
    }

    // public function ChannelId()
    // {
    //     $channel = new Channel;
    //     // $lastId = Channel::orderBy('channelId', 'desc')->first()->id; 
    //     $lastId = Channel::orderBy('channelId', 'desc')->first();
    //     if ($lastId !== null) {
    //         $lastId = $lastId->channelId;
    //         $str = $lastId;
    //         $numericPart = substr($str, 3);
    //         $numericPart++;
    //         $newId = 'ch_' . $numericPart;
    //         // echo $newId; 
    //     } else {
    //         $newId = 'ch_1001';
    //     }
    //     $channel->channelId = $newId;

    //     $channel->save();
    //     return $newId;
    // }
}
