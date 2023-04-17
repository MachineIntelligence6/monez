<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertiser;
use App\Feed;
use App\FeedIntegrationGuide;
use App\Country;
use App\Bank;
use Illuminate\Http\Request;
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
        return view("feeds.redirect-test");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisers = Advertiser::all();
        $advertiserIds = $advertisers->pluck('id')->toArray();
        $assignedAdvertisers = Feed::whereIn('advertiser_id', $advertiserIds)->get();
        $assignedAdvertiserIds = $assignedAdvertisers->pluck('advertiser_id')->toArray();
        $availableAdvertisers = Advertiser::whereNotIn('id', $assignedAdvertiserIds)->get();
        return view('feeds.create', compact('availableAdvertisers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'advertiser' => 'required',
            'feedId'  => 'required',
            'feedPath' => 'required',
            'keywordParameter' => 'required',
        ]);
        // $feedId = "fd_" . $request->feedId;
        $feed = new Feed;

        $lastId = Feed::orderBy('feedId', 'desc')->first();
        if ($lastId !== null) {
            $lastId = $lastId->feedId;
            $str = $lastId;
            $numericPart = substr($str, 3, -1);
            if (is_numeric($numericPart)) {
                $numericPart++;
            } else {
                $numericPart= 'fd_1';
            }
            
            $newId = 'fd_' . $numericPart; 
            echo $newId; 
        } else {
            $newId ='fd_1';
        }


        $feed->advertiser_id = $request->advertiser;
        $feed->feedId = $newId;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        $feed->is_active = true;
        $feed->is_default = false;
        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal);
        $mergedArrayStat = [];
        $mergedArrayDy = [];
        for ($i = 0; $i < count($s_paramName); $i++) {
            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        }
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        }
        $feed->staticParameters = json_encode($mergedArrayStat);
        $feed->dynamicParameters = json_encode($mergedArrayDy);
        $feed->save();
        $feedId = $feed->id;
        $FeedInegration = new FeedIntegrationGuide;
        $FeedInegration->feed_id = $feedId;
        $FeedInegration->guideUrl = $request->feedUrl;
        $FeedInegration->subids = $request->subids;
        $FeedInegration->dailyCap = $request->dailyCap;
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
        $advertisers = Advertiser::all();
        $countries = Country::all();
        $banks = Bank::all();
        $selectedAdv = $feed->advertiser_id;
        $advertisers = Advertiser::all();
        $advertiserIds = $advertisers->pluck('id')->toArray();
        $assignedAdvertisers = Feed::whereIn('advertiser_id', $advertiserIds)
            ->whereNotIn('advertiser_id', [$selectedAdv])
            ->get();
        // dd($assignedAdvertisers);
        $assignedAdvertiserIds = $assignedAdvertisers->pluck('advertiser_id')->toArray();
        $availableAdvertisers = Advertiser::whereNotIn('id', $assignedAdvertiserIds)->get();
        return view('feeds.create', compact('feed', 'availableAdvertisers', 'advertisers', 'selectedAdv', 'countries', 'banks'));
    }

    public function update(Request $request, Feed $feed)
    {
        $validatedData = $request->validate([
            'advertiser' => 'required',
            'feedPath' => 'required',
            'phone' => 'required',
            'keywordParameter' => 'required',
        ]);
        $feedId = "fd_" . $request->feedId;

        $feed->advertiser_id = $request->advertiser;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        $feed->is_active = true;
        $feed->is_default = false;
        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        // dd($s_paramName,$s_paramVal,$d_paramName,$d_paramVal);
        $mergedArrayStat = [];
        $mergedArrayDy = [];
        for ($i = 0; $i < count($s_paramName); $i++) {
            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        }
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        }
        $feed->staticParameters = json_encode($mergedArrayStat);
        $feed->dynamicParameters = json_encode($mergedArrayDy);
        $feed->update();
        $feedId = $feed->id;

        $feedIntegration = FeedIntegrationGuide::where('feed_id', $feedId)->firstOrFail();

        $feedIntegration->guideUrl = $request->guideUrl;
        $feedIntegration->subids = $request->subids;
        $feedIntegration->dailyCap = $request->dailyCap;
        $feedIntegration->acceptedGeos = $request->acceptedGeos;
        $feedIntegration->searchEngine = $request->searchEngine;
        $feedIntegration->feedType = $request->feedType;
        $feedIntegration->trafficType = $request->trafficType;
        $feedIntegration->trafficSources = $request->trafficSources;
        $feedIntegration->platform = $request->platform;
        $feedIntegration->browsers = $request->browsers;
        $feedIntegration->otherRequirements = $request->otherRequirements;

        $feedIntegration->update();
        return redirect()->route('feeds.index')->with('success', 'Feed Form Data Has Been Updated Successfuly:');
    }

    public function view(Feed $feed)
    {
        // dd($feed);
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
        return view('feeds.create', compact('feed', 'availableAdvertisers', 'advertisers', 'selectedAdv', 'countries', 'banks'));
    }

    public function enable(Feed $feed)
    {
        $feed->is_active = true;
        $feed->save();
        return redirect()->back();
    }

    public function disable(Feed $feed)
    {
        $feed->is_active = false;
        $feed->save();
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
