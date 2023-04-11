<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertiser;
use App\Feed;
use App\FeedIntegrationGuide;
use App\Country;
use App\Bank;
use Illuminate\Http\Request;
class FeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::orderBy('id', 'desc')->get();
        $feedss = FeedIntegrationGuide::all();
        // dd($feeds);
        // $data =$feeds[2]->staticParameters;
        // $array = json_decode($data, true);
        // foreach ($array as $key => $value) {
        //     $parts = explode(' , ', $value);
        //     ${"variable" . ($key + 1) . "a"} = $parts[0];
        //     ${"variable" . ($key + 1) . "b"} = $parts[1];
        // }
        
        // Output the variables
        // echo $variable1a; // Output: 1st
        // echo $variable1b; // Output: st1
        // echo $variable2a; // Output: 2nd
        // echo $variable2b; // Output: st2
        // dd($array);
        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisers = Advertiser::all();
        return view('feeds.create', compact('advertisers'));
    }

    public function store(Request $request)
    {

        // dd('test');
        $validatedData = $request->validate([
            'advertiser' => 'required',
            'feedId'  => 'required',
            'feedPath' => 'required',
            'keywordParameter' => 'required',
        ]);
        $feedId = "fd_" . $request->feedId;
        $feed = new Feed;

        $feed->advertiser_id = $request->advertiser;
        $feed->feedId = $feedId;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        $feed->is_active= true;
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
        $FeedInegration->guideUrl = $request->guideUrl;
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
        return view('feeds.create', compact('feed','advertisers','selectedAdv', 'countries', 'banks'));
    }

    public function update(Request $request, Feed $feed)
    {
        $validatedData = $request->validate([
            'advertiser' => 'required',
            'feedPath' => 'required',
            'keywordParameter' => 'required',
        ]);
        $feedId = "fd_" . $request->feedId;

        $feed->advertiser_id = $request->advertiser;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        $feed->is_active= true;
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
        return view('feeds.create', compact('feed','advertisers','selectedAdv', 'countries', 'banks'));
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
}
