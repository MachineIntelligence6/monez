<?php

namespace App\Http\Controllers;

use App\Advertiser;
use App\ChannelSearch;
use App\AdvertiserReportColumn;
use App\Http\Controllers\Controller;
use App\Publisher;
use Carbon\Carbon;
use App\Channel;
use App\ChannelPath;
use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportsController extends Controller
{
    public function activity(Request $request)
    {
        $advertisers = Advertiser::all();
        $publishers = Publisher::all();

        if ($request != '' && $request['partnerType'] != '') {
            $feeds = $request['feeds'];
            $partners = $request['partners'];
            $partnerType = $request['partnerType'];
            $date = $request['date'];
            $range = '';
            if ($request['range'] != '') {
                $range = $request['range'];
                $string = explode(' to ', $range);

                $date1 = $string[0];
                $date2 = $string[1];

                $date1 = Carbon::parse($date1)->toDatetimeString();
                $date2 = Carbon::parse($date2)->toDatetimeString();

            }

            if ($partnerType == 'publishers') {
                $feed_id = 'channel_id';
                $advertiser_id = 'publisher_id';
            } else {
                $feed_id = 'feed_id';
                $advertiser_id = 'advertiser_id';
            }



            if ($partners == 'all' && $feeds == 'all') {
                if ($date == 'today') {
                    $date = Carbon::now()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereDate('created_at', 'like', "%{$date}%")
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')->get();
                } elseif ($date == 'yesterday') {
                    $date = Carbon::yesterday()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereDate('created_at', 'like', "%{$date}%")
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'md') {
                    $date = Carbon::now()->month;
                    $channelSearchs = ChannelSearch::whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'prevmonth') {
                    $date = Carbon::now()->subMonth()->month;
                    $channelSearchs = ChannelSearch::whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'range') {
                    $channelSearchs = ChannelSearch::whereBetween('created_at', [$date1, $date2])
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                }

                // print_r($channelSearchs);
                return response()->json(['data' => $channelSearchs]);
                // return view("reports.activity", compact('channelSearchs','advertisers','publishers'));
            } elseif ($partners == 'all' && $feeds != 'all') {
                $feeds = substr($feeds, 1);
                $feeds = explode(",", $feeds);

                if ($date == 'today') {
                    $date = Carbon::now()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->with('advertiser')
                        ->with('channel')
                        ->whereDate('created_at', 'like', "%{$date}%")
                        ->orderBy('created_at', 'DESC')->get();
                } elseif ($date == 'yesterday') {
                    $date = Carbon::yesterday()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereDate('created_at', 'like', "%{$date}%")
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'md') {
                    $date = Carbon::now()->month;
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'prevmonth') {
                    $date = Carbon::now()->subMonth()->month;
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'range') {
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereBetween('created_at', [$date1, $date2])
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                }
            } elseif ($partners != 'all' && $feeds == 'all') {
                $partners = substr($partners, 1);
                $partners = explode(",", $partners);

                if ($date == 'today') {
                    $date = Carbon::now()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereIn($advertiser_id, $partners)
                        ->with('advertiser')
                        ->with('channel')
                        ->whereDate('created_at', 'like', "%{$date}%")
                        ->orderBy('created_at', 'DESC')->get();

                } elseif ($date == 'yesterday') {
                    $date = Carbon::yesterday()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereIn($advertiser_id, $partners)
                        ->whereDate('created_at', 'like', "%{$date}%")
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'md') {
                    $date = Carbon::now()->month;
                    $channelSearchs = ChannelSearch::whereIn($advertiser_id, $partners)
                        ->whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'prevmonth') {
                    $date = Carbon::now()->subMonth()->month;
                    $channelSearchs = ChannelSearch::whereIn($advertiser_id, $partners)
                        ->whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'range') {
                    $channelSearchs = ChannelSearch::whereIn($advertiser_id, $partners)
                        ->whereBetween('created_at', [$date1, $date2])
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                }
            } else {
                $feeds = substr($feeds, 1);
                $feeds = explode(",", $feeds);

                $partners = substr($partners, 1);
                $partners = explode(",", $partners);

                // print_r($request['partnerType']);

                if ($date == 'today') {
                    $date = Carbon::now()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereIn($advertiser_id, $partners)
                        ->whereDate('created_at', 'like', "%{$date}%")
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'yesterday') {
                    $date = Carbon::yesterday()->format('Y-m-d');
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereIn($advertiser_id, $partners)
                        ->whereDate('created_at', 'like', "%{$date}%")
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'md') {
                    $date = Carbon::now()->month;
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereIn($advertiser_id, $partners)
                        ->whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'prevmonth') {
                    $date = Carbon::now()->subMonth()->month;
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereIn($advertiser_id, $partners)
                        ->whereMonth('created_at', $date)
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($date == 'range') {
                    $channelSearchs = ChannelSearch::whereIn($feed_id, $feeds)
                        ->whereIn($advertiser_id, $partners)
                        ->whereBetween('created_at', [$date1, $date2])
                        ->with('advertiser')
                        ->with('channel')
                        ->orderBy('created_at', 'DESC')
                        ->get();
                }
            }
            return response()->json(['data' => $channelSearchs]);

        } else {

            $channelSearchs = ChannelSearch::orderBy('created_at', 'DESC')->get();
            return view("reports.activity", compact('channelSearchs', 'advertisers', 'publishers'));
        }
    }


    public function revenue()
    {
        $advertisers = Advertiser::all();
        $publishers = Publisher::all();
        $reports = AdvertiserReportColumn::all();
        return view("reports.revenue", compact('reports','advertisers', 'publishers'));
    }


    public function getRevenueReportApi(Request $request)
    {
        $user = $request->user();

        $publisher_id = Publisher::where('user_id', $user->id)->pluck('id');


        $feeds = $request['channels'];
        // $partners = $request['partners'];
        $date = $request['date'];
        $range = '';
        $columns = $request['columns'];

        if($columns == 'all' || $columns == '')
        $columns = '';

        if ($request['range'] != '') {
            $range = $request['range'];
            $string = explode(' to ', $range);

            $date1 = $string[0];
            $date2 = $string[1];

            $date1 = Carbon::parse($date1)->toDatetimeString();
            $date2 = Carbon::parse($date2)->toDatetimeString();
        }

        if ($feeds != 'all') {
            $first = substr($feeds, 0, 1);
            if($first == ',')
            $feeds = substr($feeds, 1);
            $feeds = explode(",", $feeds);

            if ($date == 'today') {
                $date = Carbon::now()->format('Y-m-d');
                $channelSearchs = AdvertiserReportColumn::whereIn('channel_id', $feeds)
                    ->where('publisher_id', $publisher_id)
                    ->whereDate('date', 'like', "%{$date}%")
                    ->with('advertiser')
                    ->with('channel')
                    ->orderBy('date', 'DESC')
                    ->get($columns);
            } elseif ($date == 'yesterday') {
                $date = Carbon::yesterday()->format('Y-m-d');
                $channelSearchs = AdvertiserReportColumn::whereIn('channel_id', $feeds)
                    ->where('publisher_id', $publisher_id)
                    ->whereDate('date', 'like', "%{$date}%")
                    ->with('advertiser')
                    ->with('channel')
                    ->orderBy('date', 'DESC')
                    ->get($columns);
            } elseif ($date == 'md') {
                $date = Carbon::now()->month;
                $channelSearchs = AdvertiserReportColumn::whereIn('channel_id', $feeds)
                    ->where('publisher_id', $publisher_id)
                    ->whereMonth('date', $date)
                    ->with('advertiser')
                    ->with('channel')
                    ->orderBy('date', 'DESC')
                    ->get($columns);
            } elseif ($date == 'prevmonth') {
                $date = Carbon::now()->subMonth()->month;
                $channelSearchs = AdvertiserReportColumn::whereIn('channel_id', $feeds)
                    ->where('publisher_id', $publisher_id)
                    ->whereMonth('date', $date)
                    ->with('advertiser')
                    ->with('channel')
                    ->orderBy('date', 'DESC')
                    ->get($columns);
            } elseif ($date == 'range') {
                $channelSearchs = AdvertiserReportColumn::whereIn('channel_id', $feeds)
                    ->where('publisher_id', $publisher_id)
                    ->whereBetween('date', [$date1, $date2])
                    ->with('advertiser')
                    ->with('channel')
                    ->orderBy('date', 'DESC')
                    ->get($columns);
            }
        }
        $channelSearchs = AdvertiserReportColumn::orderBy('date', 'DESC')->get();

        return response()->json(['data' => $channelSearchs]);        
    }
}
