<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertiser;
use App\Feed;
use App\FeedIntegrationGuide;
use App\Country;
use App\Bank;
use App\Channel;
use App\ChannelIntegrationGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::orderByRaw("CASE WHEN is_default = 1 THEN 0 ELSE 1 END, created_at DESC")->get();
        return view('feeds.index', compact('feeds'));
    }


    public function redirectsTest()
    {
        $redirects = [];
        return view("feeds.redirect-test", compact('redirects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisers = Advertiser::all();

//        $advertiserIds = $advertisers->pluck('id')->toArray();
//        $assignedAdvertisers = Feed::whereIn('advertiser_id', $advertiserIds)->get();
//        $assignedAdvertiserIds = $assignedAdvertisers->pluck('advertiser_id')->toArray();
//        $availableAdvertisers = Advertiser::whereNotIn('id', $assignedAdvertiserIds)->get();

        // $latestFeed = Feed::latest()->first();
        // if ($latestFeed) {
        //     $feedId = $latestFeed->feedId;
        //      $numericPart = (int) substr($feedId, 1);
        //     $numericPart++;
        //     $newId = "F" . $numericPart . "_";
        // } else {
        //     $newId = 'F1_';
        // }
        // $feedId = $newId;
        return view('feeds.create', compact('advertisers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'advertiser' => 'required',
            'feedId'  => 'required',
            'feedPath' => 'required',
            'keywordParameter' => 'required',
            'priorityScore' => 'numeric|min:1|max:10',
        ]);
        $spanValue = $request->input('spanValue');
        //feedid auto incr
        $latestFeed = Feed::latest()->first();
        if ($latestFeed) {
            $feedId = $latestFeed->feedId;
            $numericPart = (int) substr($feedId, 1);
            $numericPart++;
            $newId = "F" . $numericPart . "_";
        } else {
            $newId = 'F1_';
        }
        $feedId = $newId;

        $feed_id = $feedId . $request->feedId;
        $feed = new Feed;
        $feed->advertiser_id = $request->advertiser;
        $feed->feedId =   $spanValue . $feed_id;
        $feed->reportId =  $request->feedId;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        $feed->status = 'available';
        $feed->state = 'enabled';
        $feed->is_default = false;
        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal);
        $mergedArrayStat = [];
        $mergedArrayDy = [];

        $perameters = "/?";
        for ($i = 0; $i < count($s_paramName); $i++) {

            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
            $perameters = $perameters . $s_paramName[$i] . '=' . $s_paramVal[$i] . '&';
        }
        // $count = min(count($d_paramName), count($d_paramVal));
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i];
            $perameters = $perameters . $d_paramName[$i] . '=<' . $d_paramName[$i] . '>';
            if($i+1 != count($d_paramName)){
                $perameters = $perameters . '&';
            }
        }

        $feed->staticParameters = json_encode($mergedArrayStat);
        $feed->dynamicParameters = json_encode($mergedArrayDy);
        // dd($feed);
        $feed->perameters = $perameters;
        $feed->save();
        $feedId = $feed->id;
        $FeedInegration = new FeedIntegrationGuide;
        $FeedInegration->feed_id = $feedId;
        $FeedInegration->guideUrl = $request->feedUrl;
        $FeedInegration->subids = $request->subids;
        $FeedInegration->dailyCap = $request->dailyCap;
        $FeedInegration->dailyIpCap = $request->dailyIpCap;
        $FeedInegration->acceptedGeos = $request->acceptedGeos;
        $FeedInegration->searchEngine = $request->searchEngine;
        $FeedInegration->feedType = $request->feedType;
        $FeedInegration->trafficType = $request->trafficType;
        $FeedInegration->trafficSources = $request->trafficSources;
        $FeedInegration->platform = $request->platform;
        $FeedInegration->browsers = $request->browsers;
        $FeedInegration->otherRequirements = $request->otherRequirements;

        $FeedInegration->save();

        // dd($feed);
        return redirect()->route('feeds.index')->with('success', 'Feed Form Data Has Been Inserted Successfuly');

        // return view('feeds.index', compact('feeds'))->with('success', 'Feed Form Data Has Been Inserted Successfuly:');
        // return redirect()->back()->with('success', 'Feed Form Data Has Been Inserted Successfuly:');
    }

    public function edit(Feed $feed)
    {
        $feedId = $feed->feedId;
        $underscorePos = strpos($feedId, "_");
        $partfirst = substr($feedId, 0, $underscorePos + 1);
        $partsecond = substr($feedId, $underscorePos + 1);
        $advertisers = Advertiser::all();
        $countries = Country::all();
        $banks = Bank::all();
        $selectedAdv = $feed->advertiser_id;
        $advertisers = Advertiser::all();
//        $advertiserIds = $advertisers->pluck('id')->toArray();
//        $assignedAdvertisers = Feed::whereIn('advertiser_id', $advertiserIds)
//            ->whereNotIn('advertiser_id', [$selectedAdv])
//            ->get();
        // dd($assignedAdvertisers);
//        $assignedAdvertiserIds = $assignedAdvertisers->pluck('advertiser_id')->toArray();
//        $availableAdvertisers = Advertiser::whereNotIn('id', $assignedAdvertiserIds)->get();
        return view('feeds.create', compact('feed', 'advertisers', 'selectedAdv', 'countries', 'banks', 'partfirst', 'partsecond'));
    }

    public function update(Request $request, Feed $feed)
    {
        $spanValue = $request->input('spanValue');
        $feed_id = $request->feedId;
        // $feed->feedId =   $spanValue . $feed_id;
        $feed->reportId =   $request->reportId;
        $feed->advertiser_id = $request->advertiser;
        $feed->advertiser_id = $request->advertiser;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        if ($request->status == null) {
            $feed->status = $feed->status;
        }
        if ($request->state == null) {
            $feed->state = $feed->state;
        }
        // $feed->is_default = false;
        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal);
        $mergedArrayStat = [];
        $mergedArrayDy = [];
        // for ($i = 0; $i < count($s_paramName); $i++) {
        //     $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        // }
        // for ($i = 0; $i < count($d_paramName); $i++) {
        //     $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        // }
        $perameters = "/?";
        for ($i = 0; $i < count($s_paramName); $i++) {

            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
            $perameters = $perameters . $s_paramName[$i] . '=' . $s_paramVal[$i] . '&';
        }
        // $count = min(count($d_paramName), count($d_paramVal));
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i];
            $perameters = $perameters . $d_paramName[$i] . '=<' . $d_paramName[$i] . '>';
            if($i+1 != count($d_paramName)){
                $perameters = $perameters . '&';
            }
        }
        $feed->staticParameters = json_encode($mergedArrayStat);
        $feed->dynamicParameters = json_encode($mergedArrayDy);

        $feed->perameters = $perameters;

        $feed->update();
        $feedId = $feed->id;

        $feedIntegration = FeedIntegrationGuide::where('feed_id', $feedId)->firstOrFail();
        $feedIntegration->guideUrl = $request->guideUrl;
        $feedIntegration->subids = $request->subids;
        $oldDailyCap = $feedIntegration->dailyCap;
        $oldDailyIpCap = $feedIntegration->dailyIpCap;
        $feedIntegration->dailyCap = $request->dailyCap;
        $feedIntegration->dailyIpCap = $request->dailyIpCap;
        $feedIntegration->acceptedGeos = $request->acceptedGeos;
        $feedIntegration->searchEngine = $request->searchEngine;
        $feedIntegration->feedType = $request->feedType;
        $feedIntegration->trafficType = $request->trafficType;
        $feedIntegration->trafficSources = $request->trafficSources;
        $feedIntegration->platform = $request->platform;
        $feedIntegration->browsers = $request->browsers;
        $feedIntegration->otherRequirements = $request->otherRequirements;

        $feedIntegration->update();

        foreach (Channel::all() as $key => $channel) {
            # code..
            foreach (explode(',' ,$channel->feed_ids) as $channelFeedId)
            {
                if ((int)$channelFeedId == $feed->id) {
                    // return $feedIntegration->dailyCap;
                    $channelIntegration = ChannelIntegrationGuide::where('channel_id', $channel->id)->firstOrFail();
                    Log::info('channelIntegration = ' . $channelIntegration->c_dailyCap . ' - ' . $feedIntegration->dailyCap . ' + '.$request->dailyCap);
                    $channelIntegration->c_dailyCap = ($channelIntegration->c_dailyCap - $oldDailyCap) + $request->dailyCap; //$request->c_dailyCap;
                    $channelIntegration->c_dailyIpCap = ($channelIntegration->c_dailyIpCap - $oldDailyIpCap) + $request->dailyIpCap;
                    $channelIntegration->save();
                }
            }
        }
        return redirect()->route('feeds.index')->with('success', 'Feed Form Data Has Been Updated Successfuly:');
    }

    public function view(Feed $feed)
    {
        // dd($feed);
        $feedId = $feed->feedId;
        // $parts = explode("_", $feedId);
        // $partfirst = $parts[0];
        // $partsecond= $parts[1];
        $underscorePos = strpos($feedId, "_");
        $partfirst = substr($feedId, 0, $underscorePos + 1);
        $partsecond = substr($feedId, $underscorePos + 1);
        $advertisers = Advertiser::all();
        $countries = Country::all();
        $banks = Bank::all();
        $selectedAdv = $feed->advertiser_id;
        $advertisers = Advertiser::all();
        $advertiserIds = $advertisers->pluck('id')->toArray();
        // $assignedAdvertisers = Feed::whereIn('advertiser_id', $advertiserIds)->get();
        $assignedAdvertisers = Feed::whereIn('advertiser_id', $advertiserIds)
            ->whereNotIn('advertiser_id', [$selectedAdv])
            ->get();
        $assignedAdvertiserIds = $assignedAdvertisers->pluck('advertiser_id')->toArray();
        $availableAdvertisers = Advertiser::whereNotIn('id', $assignedAdvertiserIds)->get();
        return view('feeds.create', compact('feed', 'availableAdvertisers', 'advertisers', 'selectedAdv', 'countries', 'banks', 'partfirst', 'partsecond'));
    }

    public function enable(Feed $feed)
    {
        if (auth()->user()->role === 'Admin') {
            $feed->state = 'enabled';
            $feed->status = 'available';
            $feed->save();
        }
        return redirect()->back();
    }

    public function disable(Feed $feed)
    {
        if (auth()->user()->role === 'Admin') {
            $feed->state = 'disabled';
            $feed->status = 'disabled';
            $feed->save();
            $channel = $feed->channel()->first();
            if($channel!= Null)
            {
                $channel->feed_ids = NULL;
                $channel->save();
            }
        }

        return redirect()->back();
    }

    public function makeDefault(Feed $feed)
    {
        Feed::where('id', '<>', $feed->id)->update(['is_default' => false]);
        $feed->is_default = true;
        $feed->save();
        return redirect()->back();
    }

    public function checkUniqueFeedId(Request $request)
    {
        // $inputfeild = $request->test;
        // $prefixedValue = 'fd_' . input_field;
        $validator = Validator::make($request->all(), [

            'input_field' => 'unique:feeds,feedId',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The value is not unique.']);
        }

        return response()->json(['status' => 'success']);
    }


}
