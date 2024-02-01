<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelIntegrationGuide;
use App\ChannelPath;
use App\ChannelSearch;
use App\Events\ChannelSearched;
use App\Feed;
use App\FeedIntegrationGuide;
use App\Listeners\ChannelStateChanged;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
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

        return view('channels.index', compact('channels', 'assignedfeeds'));
    }

    public function store(Request $request)
    {

        $channel = new Channel;
        $channel->publisher_id = $request->publisher;
        $latestChannel = Channel::latest()->first('channelId');

        //Generate New Channel ID
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

        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i];
            $perameters = $perameters . $d_paramName[$i] . '=<query>';
            if ($i + 1 != count($d_paramName)) {
                $perameters = $perameters . '&';
            }
        }

        for ($i = 0; $i < count($assign_feed); $i++) {
            $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . ($daily_cap[$i] ?? 0);
            $ids[] = (string)$assign_feed[$i];
        }
        $feedIds = $ids; // Array of feed IDs

        $channel->feed_ids = implode(',', $feedIds);
        $channel->c_staticParameters = json_encode($mergedArrayStat);
        $channel->c_dynamicParameters = json_encode($mergedArrayDy);
        $channel->c_assignedFeeds = json_encode($mergeArrayFeed);
        $channel->perameters = $perameters;
        $channel->save();

        $c_dailyCap = 0;
        $c_dailyIpCap = 0;

        $highestDailyCapFeed = null;
        $highestDailyCapValue = -1;

        foreach ($feedIds as $feedId) {
            $feed = Feed::where('id', $feedId)->with('feedintegration')->first(); // Eager load the 'feedintegration' relationship

            if ($feed != null) {
                $feed->status = 'paused';
                $feed->save();

                $dailyCap = $feed->feedintegration->dailyCap ?? 0;

                if ($dailyCap > $highestDailyCapValue) {
                    $highestDailyCapFeed = $feed;
                    $highestDailyCapValue = $dailyCap;
                }
            }
        }

        if ($highestDailyCapFeed != null) {
            $c_dailyIpCap = $highestDailyCapFeed->feedintegration->dailyIpCap;
            $c_subids = $highestDailyCapFeed->feedintegration->subids;
            $c_acceptedGeos = $highestDailyCapFeed->feedintegration->acceptedGeos;
            $c_searchEngine = $highestDailyCapFeed->feedintegration->searchEngine;
            $c_feedType = $highestDailyCapFeed->feedintegration->feedType;
            $c_trafficType = $highestDailyCapFeed->feedintegration->trafficType;
            $c_trafficSources = $highestDailyCapFeed->feedintegration->trafficSources;
            $c_platform = $highestDailyCapFeed->feedintegration->platform;
            $c_browsers = $highestDailyCapFeed->feedintegration->browsers;
            $c_otherRequirements = $highestDailyCapFeed->feedintegration->otherRequirements;
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
        $channelInegration->c_dailyCap = $highestDailyCapValue; //$request->c_dailyCap;
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

        $feedids = $channel->feed_ids;
        $feed_ids_array = array_map('intval', explode(',', $feedids));
        $feeds = Feed::whereIn("feeds.id", $feed_ids_array)
            ->join('feeds_integration_guide', 'feeds.id', '=', 'feeds_integration_guide.feed_id')
            ->orderBy('feeds_integration_guide.dailyCap', 'asc')->get();

        $channelpaths = ChannelPath::all();
        $maxDailyCap = $feeds->max('dailyCap');
        return view('channels.create', compact('channel', 'selectedpublisher', 'selectedchannelpath', 'channelpaths', 'publishers', 'feeds', 'channelId', 'maxDailyCap'));
    }

    public function edit(Channel $channel)
    {
        $channelId = $channel->channelId;
        $publishers = Publisher::all();

        $selectedpublisher = $channel->publisher_id;
        $selectedchannelpath = $channel->channel_path_id;
        $feedids = $channel->feed_ids;
        $feed_ids_array = array_map('intval', explode(',', $feedids));
        $feeds = Feed::whereIn("feeds.id", $feed_ids_array)->orWhere('status', 'available')
            ->join('feeds_integration_guide', 'feeds.id', '=', 'feeds_integration_guide.feed_id')
            ->orderBy('feeds_integration_guide.dailyCap', 'asc')->get();
        $channelpaths = ChannelPath::where('status', 1)->get();
        $maxDailyCap = $feeds->max('dailyCap');
        return view('channels.create', compact('channel', 'channelpaths', 'selectedchannelpath', 'selectedpublisher', 'publishers', 'feeds', 'channelId', 'maxDailyCap'));
    }

    public function update(Request $request, Channel $channel)
    {
        $channel->publisher_id = $request->publisher;
        $channel->channel_path_id = $request->channel_path_id;
        $channel->c_priorityScore = $request->c_priorityScore;
        $channel->c_comments = $request->c_comments;

        if ($request->status == null) {
            $channel->status = $channel->status;
        }

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

        for ($i = 0; $i < count($d_paramName); $i++) {
            $mergedArrayDy[] = $d_paramName[$i];
        }

        $c_dailyCap = 0;
        $c_dailyIpCap = 0;

        $removedFeeds = [];
        if ($request->has('feed')) {
            for ($i = 0; $i < count($assign_feed); $i++) {
                $mergeArrayFeed[] = $assign_feed[$i] . ' , ' . ($daily_cap[$i] ?? 0);
                $ids[] = (string)$assign_feed[$i];

                $feed = Feed::where('id', $assign_feed[$i])->first();

                if ($feed != null) {
                    $feed->status = 'paused';
                    $c_dailyCap = $c_dailyCap + ($feed->feedintegration->dailyCap);
                    $c_dailyIpCap = $c_dailyIpCap + ($feed->feedintegration->dailyIpCap ?? 0);
                    $feed->save();
                }
            }

            # code...
//            foreach (explode(',', $channel->feed_ids) as $channelFeed) {
//                foreach ($assign_feed as $feed) {
//                    if ((int)$channelFeed !== (int)$feed) {
//                        $removedFeeds [] = $channelFeed;
//                    }
//                }
//            }
            $channelFeedIds = explode(',', $channel->feed_ids);
            $assignFeedIds = $assign_feed;
            foreach ($channelFeedIds as $channelFeed) {
                if (!in_array((int)$channelFeed, $assignFeedIds)) {
                    $removedFeeds[] = (int)$channelFeed;
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
            }
        }

        $newFeeds = explode(',', $channel->feed_ids);

        $highestDailyCapFeed = null;
        $highestDailyCapValue = -1;
        $c_subids = null;
        $c_acceptedGeos = null;
        $c_searchEngine = null;
        $c_feedType = null;
        $c_trafficType = null;
        $c_trafficSources = null;
        $c_platform = null;
        $c_browsers = null;
        $c_otherRequirements = null;

        foreach ($newFeeds as $feedId) {
            $feed = Feed::where('id', $feedId)->with('feedintegration')->first(); // Eager load the 'feedintegration' relationship

            if ($feed != null) {
                // Calculate $c_dailyCap
                $c_dailyCap += $feed->feedintegration->dailyCap ?? 0;
                // Check if the current feed has a higher dailyCap value
                if (($feed->feedintegration->dailyCap ?? 0) > $highestDailyCapValue) {
                    $highestDailyCapFeed = $feed;
                    $highestDailyCapValue = $feed->feedintegration->dailyCap ?? 0;
                }
            }
        }

        if ($highestDailyCapFeed != null) {
            // Assign other values based on the feed with the highest dailyCap
            $c_dailyIpCap = $highestDailyCapFeed->feedintegration->dailyIpCap;
            $c_subids = $highestDailyCapFeed->feedintegration->subids;
            $c_acceptedGeos = $highestDailyCapFeed->feedintegration->acceptedGeos;
            $c_searchEngine = $highestDailyCapFeed->feedintegration->searchEngine;
            $c_feedType = $highestDailyCapFeed->feedintegration->feedType;
            $c_trafficType = $highestDailyCapFeed->feedintegration->trafficType;
            $c_trafficSources = $highestDailyCapFeed->feedintegration->trafficSources;
            $c_platform = $highestDailyCapFeed->feedintegration->platform;
            $c_browsers = $highestDailyCapFeed->feedintegration->browsers;
            $c_otherRequirements = $highestDailyCapFeed->feedintegration->otherRequirements;
        }

        $channelId = $channel->id;

        $channelIntegration = ChannelIntegrationGuide::where('channel_id', $channelId)->firstOrFail();
        $channelIntegration->channel_id = $channelId;
        $channelIntegration->c_guideUrl = $request->c_guideUrl;
        $channelIntegration->c_subids = $c_subids;
        $channelIntegration->c_dailyCap = $highestDailyCapValue; //$request->c_dailyCap;
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
        $channel->makeFeedAvailable();
        $channel->is_active = false;
        $channel->status = 'disable';
        $channel->feed_ids = Null;
        $channel->c_assignedFeeds = '[","]';
        $channel->save();
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

        $screenResolution = null;

        if ($cahnnel) {
            $channelSearchId = null;
            $dPerameters = json_decode($cahnnel->c_dynamicParameters);

            foreach ($dPerameters as $key => $dPerameter) {

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
                        $feedIntegration = FeedIntegrationGuide::where('feed_id', $feedTemp->id)->get()->first();
                        if (($feedTemp->daily_search_cap_count < intval($feedIntegration->dailyCap)) || isset($feedIntegration->dailyCap)) {
                            $feed = Feed::find($feedTemp->id);
                            $feed->daily_search_cap_count = $feed->daily_search_cap_count + 1;
                            $redirectToFeedURL = $feed->feedPath . $feed->perameters;
                            $feed->save();
                            $channelSearch->feed_id = $feed->id;
                            $channelSearch->feed = $feed->feedId;
                            $channelSearch->save();
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

        $channelpaths = ChannelPath::where('status', 1)->get();

        $channels = Channel::all();

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

        $feeds = Feed::where('status', 'available')->join('feeds_integration_guide', 'feeds.id', '=', 'feeds_integration_guide.feed_id')
            ->orderBy('feeds_integration_guide.dailyCap', 'asc')->get();

        return view('channels.create', compact('publishers', 'channelpaths', 'feeds'));
    }

    public function saveScreenResolution(Request $request)
    {

        $channelSearch = ChannelSearch::find($request->channelSearchId);
        $channelSearch->screen_resolution = $request->width . ' x ' . $request->height;
        $channelSearch->save();
        // You can now work with $screenResolutionData, which contains the width and height of the screen resolution
        return response()->json(['message' => 'Screen resolution saved successfully']);
    }

    public function checkUniqueAccountEmail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:publishers,account_email',
            'input_field' => 'unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The email is already used.']);
        }

        return response()->json(['status' => 'success']);
    }
}
