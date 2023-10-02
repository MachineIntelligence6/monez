<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelIntegrationGuide;
use App\ChannelPath;
use App\ChannelSearch;
use App\Events\ChannelSearched;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publisher;
use App\Feed;
use App\FeedIntegrationGuide;
use App\Listeners\ChannelStateChanged;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Facades\Agent;
use Throwable;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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

    public function store(Request $request)
    {
        $channel = new Channel;
        // dd($channel,$channelId);
//        $channel->publisher_id = '1';
        $channel->publisher_id = $request->publisher;

        $latestChannel = Channel::latest()->first();

        if ($latestChannel) {
            $channelId = $latestChannel->channelId;
            $numericPart = (int)substr($channelId, 1);
            // Increment the numeric part
            $numericPart++;
            // Generate a new underscore part with alphabetic and numeric characters
            $newUnderscorePart = "";
            $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
            $length = 5; // desired length of the new underscore part
            for ($i = 0; $i < $length; $i++) {
                $newUnderscorePart .= $characters[rand(0, strlen($characters) - 1)];
            }
            // Update the id with the incremented numeric part and new underscore part
            $newId = "C" . $numericPart . "_" . $newUnderscorePart;
        } else {
            $newId = 'C1_d1wmd';
        }
        // dd($channelId,$newId);s
        $channelId = $newId;
        $channel->channelId = $channelId;
        $channel->channel_path_id = $request->channel_path_id;
        $channel->c_priorityScore = $request->c_priorityScore;
        $channel->c_comments = $request->c_comments;
        $channel->is_active = true;
        $channel->status = 'pause';

        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        $assign_feed = $request->input('feed');
        $daily_cap = $request->input('dailyCap');

        $mergedArrayStat = [];
        $mergedArrayDy = [];
        $mergeArrayFeed = [];
        $ids = [];
        if ($channel->channelId)
            $perameters = "search_results?channel=" . $channelId . '&';
        for ($i = 0; $i < count($s_paramName); $i++) {

            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
            $perameters = $perameters . $s_paramName[$i] . '=' . $s_paramVal[$i] . '&';
        }
        // $count = min(count($d_paramName), count($d_paramVal));
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i];
            $perameters = $perameters . $d_paramName[$i] . '=<query>';
            if ($i + 1 != count($d_paramName)) {
                $perameters = $perameters . '&';
            }
        }
        // $count = count($d_paramName);
        // for ($i = 0; $i < count($d_paramName); $i++) {
        //     if (isset($d_paramVal[$i])) {
        //         $mergedArrayStat[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        //     } else {
        //         // If $s_paramVal[$i] is null, add a null value to the merged array
        //         $mergedArrayStat[] = $d_paramName[$i] . ' , ' . 'null';
        //     }
        // }

        for ($i = 0; $i < count($assign_feed); $i++) {
            $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . $daily_cap[$i];
            $ids[] = (string)$assign_feed[$i];
        }
        $feedIds = $ids; // Array of feed IDs

        $channel->feed_ids = implode(',', $feedIds);
        // $channel->feed_ids = json_encode($ids);
        $channel->c_staticParameters = json_encode($mergedArrayStat);
        $channel->c_dynamicParameters = json_encode($mergedArrayDy);
        $channel->c_assignedFeeds = json_encode($mergeArrayFeed);
        $channel->perameters = $perameters;

        $channel->save();

        $c_dailyCap = 0;
        $c_dailyIpCap = 0;

        foreach ($feedIds as $key => $feedId) {
            $feed = Feed::where('id', $feedId)->first();
            $feed->status = 'paused';
            $c_dailyCap = $c_dailyCap + ($feed->feedintegration->dailyCap ?? 0);
            if ($key == 0) {
                $c_dailyIpCap = $feed->feedintegration->dailyIpCap;
                $c_subids = $feed->feedintegration->subids;
                $c_acceptedGeos = $feed->feedintegration->acceptedGeos;
                $c_searchEngine = $feed->feedintegration->searchEngine;
                $c_feedType = $feed->feedintegration->feedType;
                $c_trafficType = $feed->feedintegration->trafficType;
                $c_trafficSources = $feed->feedintegration->trafficSources;
                $c_platform = $feed->feedintegration->platform;
                $c_browsers = $feed->feedintegration->browsers;
                $c_otherRequirements = $feed->feedintegration->otherRequirements;
            }
            $feed->save();
        }

        $channel_Id = $channel->id;
        //generating url start
        $url = $request->c_guideUrl;

        // Get the position of the first "&" after the "channel" parameter
        $start = strpos($url, "channel=") + strlen("channel=");
        $end = strpos($url, "&", $start);

        // Split the URL into two parts
        $url1 = substr($url, 0, $start) . $channelId;
        $url2 = substr($url, $end);

        // Concatenate the two parts to form the updated URL
        $updated_url = $url1 . $url2;

        //end
        //Change Feed Status.

        $channelInegration = new ChannelIntegrationGuide;
        $channelInegration->channel_id = $channel_Id;
        $channelInegration->c_guideUrl = $updated_url;
        $channelInegration->c_subids = $c_subids;
        $channelInegration->c_dailyCap = $c_dailyCap; //$request->c_dailyCap;
        $channelInegration->c_dailyIpCap = $c_dailyIpCap; //$request->c_dailyIpCap;
        $channelInegration->c_acceptedGeos = $c_acceptedGeos;
        $channelInegration->c_searchEngine = $c_searchEngine;
        $channelInegration->c_feedType = $c_feedType;
        $channelInegration->c_trafficType = $c_trafficType;
        $channelInegration->c_trafficSources = $c_trafficSources;
        $channelInegration->c_platform = $c_platform;
        $channelInegration->c_browsers = $c_browsers;
        $channelInegration->c_otherRequirements = $c_otherRequirements;

        $channelInegration->save();

        return redirect()->route('channels.index')->with('success', 'Channel Form Data Has Been Inserted Successfuly');

        // return redirect()->back()->with('success', 'Channel Form Data Has Been Inserted Successfuly:');
    }

    public function view(Channel $channel)
    {

        $channelId = $channel->channelId;

        $publishers = Publisher::all();

        $selectedpublisher = $channel->publisher_id;
        $selectedchannelpath = $channel->channel_path_id;
//        $publisherIds = $publishers->pluck('id')->toArray();
        // $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)->get();
//        $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)
//            ->whereNotIn('publisher_id', [$selectedpublisher])
//            ->get();
//        $assignedPublisherIds = $assignedPublishers->pluck('publisher_id')->toArray();
//        $availablePublishers = Publisher::whereNotIn('id', $assignedPublisherIds)->get();
        $feedids = $channel->feed_ids;
        $feed_ids_array = json_decode($feedids, true);
        $feeds = Feed::all();
        $channelpaths = ChannelPath::all();
        // $channelpathIds = $channelpaths->pluck('id')->toArray();
        // $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)
        //     ->whereNotIn('publisher_id', [$selectedpublisher])
        //     ->get();
        // $assignedchannelpathIds = $assignedchannelpaths->pluck('channel_path_id')->toArray();
        // $availablechannelpaths = ChannelPath::whereNotIn('id', $assignedchannelpathIds)->get();
        return view('channels.create', compact('channel', 'selectedpublisher', 'selectedchannelpath', 'channelpaths', 'publishers', 'feeds', 'channelId'));
    }

    public function edit(Channel $channel)
    {
        $channelId = $channel->channelId;
        $publishers = Publisher::all();

        $selectedpublisher = $channel->publisher_id;
        $selectedchannelpath = $channel->channel_path_id;
//        $publisherIds = $publishers->pluck('id')->toArray();
//         $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)->get();
//        $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)
//            ->whereNotIn('publisher_id', [$selectedpublisher])
//            ->get();
//        $assignedPublisherIds = $assignedPublishers->pluck('publisher_id')->toArray();
//        $availablePublishers = Publisher::whereNotIn('id', $assignedPublisherIds)->get();
        $feedids = $channel->feed_ids;
        $feed_ids_array = json_decode($feedids, true);
        $feeds = Feed::where("id", $feed_ids_array)->orWhere('status', 'available')->get();

        // $feedsIds = $feeds->pluck('id')->toArray();

        $channelpaths = ChannelPath::where('status', 1)->get();
        // $channelpathIds = $channelpaths->pluck('id')->toArray();
        // $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)
        //     ->whereNotIn('publisher_id', [$selectedpublisher])
        //     ->get();
        // // $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)->get();
        // $assignedchannelpathIds = $assignedchannelpaths->pluck('channel_path_id')->toArray();
        // $availablechannelpaths = ChannelPath::whereNotIn('id', $assignedchannelpathIds)->get();

        return view('channels.create', compact('channel', 'channelpaths', 'selectedchannelpath', 'selectedpublisher', 'publishers', 'feeds', 'channelId'));
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
        if ($request->status == null) {
            $channel->status = $channel->status;
        }
        // if ($channel->status == 'disable') {
        //     $channel->status = 'disable';
        // } else {
        //     $channel->status = $request->status;
        // };

        $s_paramName = $request->input('paramName');
        $s_paramVal = $request->input('paramValue');
        $d_paramName = $request->input('dy_paramName');
        $d_paramVal = $request->input('dy_paramValue');
        $assign_feed = $request->input('feed');
        $daily_cap = $request->input('dailyCap');


        $mergedArrayStat = [];
        $mergedArrayDy = [];
        $mergeArrayFeed = [];
        $ids = [];

        for ($i = 0; $i < count($s_paramName); $i++) {
            $mergedArrayStat[] = $s_paramName[$i] . ' , ' . $s_paramVal[$i];
        }
        // for ($i = 0; $i < count($d_paramName); $i++) {
        //     $mergedArrayDy[] = $d_paramName[$i] . ' , ' . $d_paramVal[$i];
        // }
        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i];
        }

        $c_dailyCap = 0;
        $c_dailyIpCap = 0;

        $removedFeeds = [];
        if ($request->has('feed')) {
            for ($i = 0; $i < count($assign_feed); $i++) {
                $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . $daily_cap[$i];
                $ids[] = (string)$assign_feed[$i];

                $feed = Feed::where('id', $assign_feed[$i])->first();
                $feed->status = 'paused';
                $c_dailyCap = $c_dailyCap + ($feed->feedintegration->dailyCap);
                $c_dailyIpCap = $c_dailyIpCap + ($feed->feedintegration->dailyICap ?? 0);
                $feed->save();
            }

            # code...
            foreach (explode(',', $channel->feed_ids) as $channelFeed) {
                foreach ($assign_feed as $feed) {
                    if ((int)$channelFeed !== (int)$feed) {
                        $removedFeeds [] = $channelFeed;
                    }
                }
            }
            $channel->feed_ids = implode(',', $ids);
        } else {
            $removedFeeds = explode(',', $channel->feed_ids);
            $channel->feed_ids = null;
        }


        $channel->c_staticParameters = json_encode($mergedArrayStat);
        $channel->c_dynamicParameters = json_encode($mergedArrayDy);
        $channel->c_assignedFeeds = json_encode($mergeArrayFeed);
        $channel->update();


        $allChannels = Channel::all();

        $feedInChannelCount = 0;
        foreach ($allChannels as $singleChannel) {
            if (explode(',', $singleChannel->feed_ids) == $removedFeeds) {
                $feedInChannelCount = 1;
            } else {
                $feedInChannelCount = 0;
            }
        }

        if (!empty($removedFeeds) && $feedInChannelCount == 0) {
            foreach ($removedFeeds as $removedFeed) {
                $feed = Feed::where('id', $removedFeed)->first();
                if ($feed) {

                    $feed->status = 'available';
                    $feed->save();
                }
                // $c_dailyCap = $c_dailyCap - ($feed->feedintegration->dailyCap ?? 0 );
                // $c_dailyIpCap = $c_dailyIpCap - ($feed->feedintegration->dailyICap ?? 0 )

            }
        }

        $c_dailyCap = 0;

        $newFeeds = explode(',', $channel->feed_ids);
        foreach ($newFeeds as $key => $feedId) {
            $feed = Feed::where('id', $feedId)->first();
            $c_dailyCap = $c_dailyCap + ($feed->feedintegration->dailyCap ?? 0);
            if ($key == 0) {
                $c_dailyIpCap = $feed->feedintegration->dailyIpCap;
                $c_subids = $feed->feedintegration->subids;
                $c_acceptedGeos = $feed->feedintegration->acceptedGeos;
                $c_searchEngine = $feed->feedintegration->searchEngine;
                $c_feedType = $feed->feedintegration->feedType;
                $c_trafficType = $feed->feedintegration->trafficType;
                $c_trafficSources = $feed->feedintegration->trafficSources;
                $c_platform = $feed->feedintegration->platform;
                $c_browsers = $feed->feedintegration->browsers;
                $c_otherRequirements = $feed->feedintegration->otherRequirements;
            }
        }

        $channelId = $channel->id;

        $channelIntegration = ChannelIntegrationGuide::where('channel_id', $channelId)->firstOrFail();
        $channelIntegration->channel_id = $channelId;
        $channelIntegration->c_guideUrl = $request->c_guideUrl;
        $channelIntegration->c_subids = $c_subids;
        $channelIntegration->c_dailyCap = $c_dailyCap; //$request->c_dailyCap;
        $channelIntegration->c_dailyIpCap = $c_dailyIpCap; //$request->c_dailyIpCap;
        $channelIntegration->c_acceptedGeos = $c_acceptedGeos;
        $channelIntegration->c_searchEngine = $c_searchEngine;
        $channelIntegration->c_feedType = $c_feedType;
        $channelIntegration->c_trafficType = $c_trafficType;
        $channelIntegration->c_trafficSources = $c_trafficSources;
        $channelIntegration->c_platform = $c_platform;
        $channelIntegration->c_browsers = $c_browsers;
        $channelIntegration->c_otherRequirements = $c_otherRequirements;

        $channelIntegration->update();
        return redirect()->route('channels.index')->with('success', 'Channel Form Data Has Been Updated Successfuly:');
    }

    public function enable(Channel $channel)
    {
        $channel->is_active = true;
        $channel->status = 'pause';
        $channel->save();
        return redirect()->back();
    }

    public function disable(Channel $channel)
    {
        $channel->is_active = false;
        $channel->status = 'disable';
        $channel->save();
        $channel->makeFeedAvailable();

        return redirect()->back();
    }

    public function channelSearched(Request $request)
    {
        $isQueriesValid = true;
        if ($request->filled('query')) {
            $query = $request->all()['query'];
            if (strpos($request->getUri(), "<query>") !== false) {
                $query = null;
            }
        } else {
            $query = null;
        }
        $advertiser = null;
        $feed = null;
        $startTime = microtime(true);
        $cahnnel = Channel::where('channelId', $request->channel)->get()->first();

        if ($cahnnel) {
            $feeds = $cahnnel->feeds();
            if (isset($feeds[0])) {
                $advertiser = $feeds[0]->advertiser_id;
                $feed = $feeds[0];
            }
        }

        $redirectToFeedURL = 'https://www.google.com/search?q=' . $query;

        // $channelInegration = ChannelIntegrationGuide::find($cahnnel->feed_ids);
        // return $cahnnel->feed;
        if (config('app.env') == 'local') {
            $ip = '39.62.29.27';
        } else {
            $ip = $request->ip();
        }

        try {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
            $location = $details->city . ' ' . $details->region . ' ' . $details->country;
            $geo = $details->country;
        } catch (Throwable $th) {
            $location = null;
            $geo = '--';
        }
        // return 1;
        // $width = "<script>var windowWidth = screen.width;
        // document.writeln(windowWidth); </script>";
        // $height = "<script>var windowHeight = screen.height; document.writeln(windowHeight); </script>";
        $screenResolution = null;

        if ($cahnnel) {
            $channelSearchId = null;
            $dPerameters = json_decode($cahnnel->c_dynamicParameters);

            foreach ($dPerameters as $key => $dPerameter) {
                // return $dPerameter;
                // return $request->getUri();
                // return strpos($request->getUri(), "<query>");

                if (strpos($request->getUri(), "%3C" . $dPerameter . "%3E")) {
                    $isQueriesValid = false;
                    // return 1;
                }
                if ($request->filled($dPerameter)) {

                } else {
                    $isQueriesValid = false;
                }
            }

            if ($isQueriesValid) {
                $channelSearch = ChannelSearch::create([
                    'channel_id' => isset($cahnnel) ? $cahnnel->id : null,
                    'ip_address' => $ip,
                    'browser' => Agent::browser(),
                    'device' => Agent::device(),
                    'os' => Agent::platform(),
                    'user_agent' => $request->userAgent(),
                    'feed_id' => isset($feed) ? $feed->id : 1,
                    'feed' => isset($feed) ? $feed->feedId : 'F1_fallback',
                    'publisher' => $cahnnel->publisher ? $cahnnel->publisher->name : '',
                    'location' => $location,
                    'subid' => $cahnnel->channelintegration->c_subids,
                    'referer' => $request->header('referer'),
                    'no_of_redirects' => 0,
                    'alert' => '--',
                    'geo' => $geo,
                    'query' => $query,
                    'advertiser_id' => $advertiser,
                    'screen_resolution' => $screenResolution
                ]);

                ChannelSearched::dispatch($feeds);
                $cahnnel->status = 'live';
                $cahnnel->last_activity_at = Carbon::now();
                $cahnnel->save();
                $channelSearch->latency = microtime(true) - $startTime;
                $channelSearch->save();
                $channelSearchId = $channelSearch->id;

                if ($cahnnel->status != 'disable') {
                    foreach ($feeds as $key => $feedTemp) {
                        // return $feedTemp;
                        $feedIntegration = FeedIntegrationGuide::where('feed_id', $feedTemp->id)->get()->first();
                        // return isset($feedIntegration->dailyCap);
                        if (($feedTemp->daily_search_cap_count < intval($feedIntegration->dailyCap)) || isset($feedIntegration->dailyCap)) {
                            $feed = Feed::find($feedTemp->id);
                            $feed->daily_search_cap_count = $feed->daily_search_cap_count + 1;
                            $redirectToFeedURL = $feed->feedPath . $feed->perameters;
                            $feed->save();
                            break;

                        }
                    }
                }

                foreach ($dPerameters as $key => $dPerameter) {
                    $value = $request->all()[$dPerameter];
                    $redirectToFeedURL = str_replace("<" . $dPerameter . ">", $value, $redirectToFeedURL);
                }

            }
            return view('save-screen-resolution', compact('channelSearchId', 'query', 'redirectToFeedURL', 'isQueriesValid'));
        } else {
            return redirect($redirectToFeedURL);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $publishers = Publisher::all();
//        $publisherIds = $publishers->pluck('id')->toArray();
//        $assignedPublishers = Channel::whereIn('publisher_id', $publisherIds)->get();
//        $assignedPublisherIds = $assignedPublishers->pluck('publisher_id')->toArray();
//        $availablePublishers = Publisher::whereNotIn('id', $assignedPublisherIds)->get();
        $channelpaths = ChannelPath::where('status', 1)->get();

        // $channelpathIds = $channelpaths->pluck('id')->toArray();
        // $assignedchannelpaths = Channel::whereIn('channel_path_id', $channelpathIds)->get();
        // $assignedchannelpathIds = $assignedchannelpaths->pluck('channel_path_id')->toArray();
        // $availablechannelpaths = ChannelPath::whereNotIn('id', $assignedchannelpathIds)->get();

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

        $feeds = Feed::where('status', 'available')->get();
//        $feedsIds = $feeds->pluck('id')->toArray();
//        $assignedfeeds = Feed::whereIn('id', $ids)->get();
//        $assignedfeedsIds = $assignedfeeds->pluck('id')->toArray();
//        $availablefeeds = Feed::whereNotIn('id', $assignedfeedsIds)->get();
        // $latestChannel = Channel::latest()->first();

        // if ($latestChannel) {
        //     $channelId = $latestChannel->channelId;
        //     $numericPart = (int) substr($channelId, 1);
        //     // Increment the numeric part
        //     $numericPart++;
        //     // Generate a new underscore part with alphabetic and numeric characters
        //     $newUnderscorePart = "";
        //     $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
        //     $length = 5; // desired length of the new underscore part
        //     for ($i = 0; $i < $length; $i++) {
        //         $newUnderscorePart .= $characters[rand(0, strlen($characters) - 1)];
        //     }
        //     // Update the id with the incremented numeric part and new underscore part
        //     $newId = "C" . $numericPart . "_" . $newUnderscorePart;
        // } else {
        //     $newId = 'C1_d1wmd';
        // }
        // // dd($channelId,$newId);
        // $channelId = $newId;
        // dd($channelId);
        // dd($channelId,$availablefeeds);
        return view('channels.create', compact('publishers', 'channelpaths', 'feeds'));
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

    public function saveScreenResolution(Request $request)
    {
        // $screenResolutionData = $request->width;

        $channelSearch = ChannelSearch::find($request->channelSearchId);
        $channelSearch->screen_resolution = $request->width . ' x ' . $request->height;
        $channelSearch->save();
        // You can now work with $screenResolutionData, which contains the width and height of the screen resolution

        return response()->json(['message' => 'Screen resolution saved successfully']);
    }
}
