<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Advertiser;
use App\Channel;
use App\ChannelSearch;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Imports\ImportActivity;
use App\Exports\ExportActivity;
use App\Feed;
use App\Imports\RevenueImport;
use App\Publisher;
use App\Revenue;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function activity()
    {
        $channelSearchs = ChannelSearch::orderBy('created_at', 'DESC')->get();
        return view("reports.search", compact('channelSearchs'));
    }


    public function revenue()
    {
        return view("reports.revenue");
    }

    public function showActivity()
    {
        // return Carbon::today()->endOfDay();
        $coloumns = [
            ['Date', 'activity_data'],
            ['Channel', 'channel'],
            ['Publisher', 'publisher'],
            ['Revenue Share', 'revenue_share'],
            ['Feed Assigned', 'feed'],
            ['Advertiser', 'advertiser']
        ];
        $activityRecords = Activity::all();
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.activity", compact('activityRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }

    public function uploadFileActivity(Request $request)
    {
        if ($request->hasFile('activityReport')) {
            try {
                Excel::import(new ImportActivity, $request->file('activityReport'));
            } catch (\Throwable $th) {
                Log::error($th);
                return redirect()->back()->with('error', "File coudn't uploaded, error :  " . $th->getMessage());
            }
            return redirect()->back()->with('success', "Data successfully have been uploaded!");
        } else {
            return redirect()->back()->with('error', "Error while importing data");
        }
    }

    public function exportFileActivity()
    {
        return Excel::download(new ExportActivity, 'users.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function searchOnActivity(Request $request)
    {
        $coloumns = [
            ['Date', 'activity_data'],
            ['Channel', 'channel'],
            ['Publisher', 'publisher'],
            ['Revenue Share', 'revenue_share'],
            ['Feed Assigned', 'feed'],
            ['Advertiser', 'advertiser']
        ];
        $query = Activity::query();
        if ($request['partener-type'] == 'advertisers') {
            $query->whereNotNull('advertiser_id');
            $query->when(request('advertisers'), function ($q) {
                return $q->whereIn('advertiser_id', request('advertisers'));
            });
            $query->when(request('feeds'), function ($q) {
                return $q->whereIn('feed_id', request('feeds'));
            });
        } else if ($request['partener-type'] == 'publishers') {
            $query->whereNotNull('publisher_id');
            $query->when(request('publishers'), function ($q) {
                return $q->whereIn('publisher_id', request('publishers'));
            });
            $query->when(request('channels'), function ($q) {
                return $q->whereIn('channel_id', request('channels'));
            });
        }
        $query->when(request('period'), function ($q) {

            switch (request('period')) {
                case ('Yesterday'):
                    return $q->whereBetween('activity_date', [Carbon::now()->subDay(1)->startOfDay(), Carbon::now()->subDay(1)->endOfDay()]);
                    break;
                case ('Today'):
                    return $q->whereBetween('activity_date', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()]);
                    break;
                case ('Month to Date'):
                    return $q->whereBetween('activity_date', [Carbon::today()->startOfMonth(), Carbon::today()]);
                    break;
                case ('Previous Month'):
                    return $q->whereBetween('activity_date', [Carbon::now()->subMonth(1)->startOfMonth()->startOfDay(), Carbon::now()->subMonth(1)->endOfMonth()->endOfDay()]);
                    break;
                case ('custom-range'):
                    if (request('custom-range')) {
                        $dateRange = explode(" ", request('custom-range'));
                        return $q->whereBetween('activity_date', [Carbon::createFromFormat('Y-m-d', $dateRange[0])->startOfDay(), Carbon::createFromFormat('Y-m-d', $dateRange[2])->endOfDay()]);
                    }
                    break;
                default:
                    $msg = 'Something went wrong.';
            }
            return $q;
        });
        $activityRecords = $query->get();

        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.activity", compact('activityRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }

    public function showRevenue()
    {

        // return Carbon::today()->endOfDay();
        $coloumns = [
            ['Date', 'revenue_data'],
            ['Advertiser', 'advertiser'],
            ['Report Id', 'report_id'],
            ['SubId', 'subId'],
            ['GEO', 'geo'],
            ['Total Searches', 'total_searches'],
            ['Monetized Searches', 'monetized_searches'],
            ['Paid Clicks', 'paid_clicks'],
            ['Gross Revenue', 'gross_revenue'],
            ['Channel', 'channel'],
            ['Publisher', 'publisher'],
            ['Net Revenue ($)', 'net_revenue'],
            ['Coverage (%)', 'coverage'],
            ['CTR (%)', 'ctr'],
            ['RPM ($)', 'rpm'],
            ['Monetized RPM (%)', 'monetized_rpm'],
            ['EPC ($)', 'epc'],
            ['Daily Report Status', 'daily_report_status'],
        ];

        $revenueRecords = Revenue::all();
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.revenue", compact('revenueRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }

    public function uploadFileRevenue(Request $request)
    {
        if ($request->hasFile('revenueReport')) {
            try {
                Excel::import(new RevenueImport, $request->file('revenueReport'));
            } catch (\Throwable $th) {
                Log::error($th);
                return redirect()->back()->with('error', "File coudn't uploaded, error :  " . $th->getMessage());
            }
            return redirect()->back()->with('success', "Data successfully have been uploaded!");
        } else {
            return redirect()->back()->with('error', "Error while importing data");
        }
    }

    public function searchOnRevenue(Request $request)
    {
        $coloumns = [
            ['Date', 'revenue_data'],
            ['Advertiser', 'advertiser'],
            ['Report Id', 'report_id'],
            ['SubId', 'subId'],
            ['GEO', 'geo'],
            ['Total Searches', 'total_searches'],
            ['Monetized Searches', 'monetized_searches'],
            ['Paid Clicks', 'paid_clicks'],
            ['Gross Revenue', 'gross_revenue'],
            ['Channel', 'channel'],
            ['Publisher', 'publisher'],
            ['Net Revenue ($)', 'net_revenue'],
            ['Coverage (%)', 'coverage'],
            ['CTR (%)', 'ctr'],
            ['RPM ($)', 'rpm'],
            ['Monetized RPM (%)', 'monetized_rpm'],
            ['EPC ($)', 'epc'],
            ['Daily Report Status', 'daily_report_status'],
        ];

        $query = Revenue::query();
        if ($request['partener-type'] == 'advertisers') {
            $query->whereNotNull('advertiser_id');
            $query->when(request('advertisers'), function ($q) {
                return $q->whereIn('advertiser_id', request('advertisers'));
            });
            $query->when(request('feeds'), function ($q) {
                return $q->whereIn('feed_id', request('feeds'));
            });
        } else if ($request['partener-type'] == 'publishers') {
            $query->whereNotNull('publisher_id');
            $query->when(request('publishers'), function ($q) {
                return $q->whereIn('publisher_id', request('publishers'));
            });
            $query->when(request('channels'), function ($q) {
                return $q->whereIn('channel_id', request('channels'));
            });
        }
        $query->when(request('period'), function ($q) {

            switch (request('period')) {
                case ('Yesterday'):
                    return $q->whereBetween('revenue_date', [Carbon::now()->subDay(1)->startOfDay(), Carbon::now()->subDay(1)->endOfDay()]);
                    break;
                case ('Today'):
                    return $q->whereBetween('revenue_date', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()]);
                    break;
                case ('Month to Date'):
                    return $q->whereBetween('revenue_date', [Carbon::today()->startOfMonth(), Carbon::today()]);
                    break;
                case ('Previous Month'):
                    return $q->whereBetween('revenue_date', [Carbon::now()->subMonth(1)->startOfMonth()->startOfDay(), Carbon::now()->subMonth(1)->endOfMonth()->endOfDay()]);
                    break;
                case ('custom-range'):
                    if (request('custom-range')) {
                        $dateRange = explode(" ", request('custom-range'));
                        return $q->whereBetween('revenue_date', [Carbon::createFromFormat('Y-m-d', $dateRange[0])->startOfDay(), Carbon::createFromFormat('Y-m-d', $dateRange[2])->endOfDay()]);
                    }
                    break;
                default:
                    $msg = 'Something went wrong.';
            }
            return $q;
        });
        $revenueRecords = $query->get();

        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.activity", compact('revenueRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }
}
