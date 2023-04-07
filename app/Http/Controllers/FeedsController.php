<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Advertiser;
use App\Feed;
use App\FeedIntegrationGuide;
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
        $feeds = Feed::all();
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
        // $validatedData = $request->validate([
        //     'advertiser' => 'required',
        //     'feedId'  => 'required',
        //     'feedPath' => 'required',
        //     'keywordParameter' => 'required',
        //     'priorityScore' => 'required',
        //     'comments' => 'required',
        // ]);
        $feedId = "fd_" . $request->feedId;
        // dd($feedId);
        $feed = new Feed;

        $feed->advertiser_id = $request->advertiser;
        $feed->feedId = $feedId;
        $feed->feedPath = $request->feedPath;
        $feed->keywordParameter = $request->keywordParameter;
        $feed->priorityScore = $request->priorityScore;
        $feed->comments = $request->comments;
        $feed->staticParameters= 'test';
        $feed->dynamicParameters = 'test';
        
        
        // $s_paramname = $request->array();
        // $s_paramval = $request->array();

        // Serialize the array data and store it in the database
        // $feed->myField = serialize($s_paramname['paramName']);
        // $feed->myField = serialize($s_paramval['paramValue']);
        $feed->save();

        $FeedInegration = new FeedIntegrationGuide;
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
      
        return redirect()->back()->with('success', 'Feed Form Data Has Been Inserted Successfuly:');
    }
}
