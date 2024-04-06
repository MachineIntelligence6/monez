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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    private $searchColoums;
    private $activityColoums;
    private $revenueColoums;
    private $rowErors;

    public function __construct()
    {
        $this->rowErors = null;
        $this->searchColoums = [
            ['Date & Time Of Search', 'date_time_of_search'],
            ['Query', 'query'],
            ['Advertiser', 'advertiser'],
            ['Feed', 'feed'],
            ['Publisher', 'publisher'],
            ['Channel', 'channel'],
            ['SubId', 'subId'],
            ['Channel Path', 'channel_path'],
            ['Referer', 'referer'],
            ['No. of redirects', 'no_of_redirects'],
            ['Alert', 'alert'],
            ['IP Address', 'ip_address'],
            ['Location', 'location'],
            ['GEO', 'geo'],
            ['Latency (Seconds)', 'latency_seconds'],
            ['UserAgent', 'UserAgent'],
            ['Screen Resolution', 'screen_resolution'],
            ['Device', 'device'],
            ['OS', 'os'],
            ['Browser', 'browser'],
        ];

        $this->activityColoums = $coloumns = [
            ['Date', 'activity_data'],
            ['Channel', 'channel'],
            ['Publisher', 'publisher'],
            ['Revenue Share', 'revenue_share'],
            ['Feed Assigned', 'feed'],
            ['Advertiser', 'advertiser'],
            ['Report ID', 'report_id'],
        ];

        $this->revenueColoums = [
            ['Date', 'revenue_data'],
            ['Advertiser', 'advertiser'],
            ['Feed', 'feed_id'],
            ['Report Id', 'report_id'],
            ['Publisher', 'publisher_id'],
            ['Channel', 'channel'],
            ['SubId', 'subId'],
            ['Daily Report Status', 'daily_report_status'],
            ['GEO', 'geo'],
            ['Total Searches', 'total_searches'],
            ['Monetized Searches', 'monetized_searches'],
            ['Paid Clicks', 'paid_clicks'],
            ['Gross Revenue', 'gross_revenue'],
            ['Coverage (%)', 'coverage'],
            ['CTR (%)', 'ctr'],
            ['RPM ($)', 'rpm'],
            ['Monetized RPM (%)', 'monetized_rpm'],
            ['EPC ($)', 'epc'],
            ['Publisher Rev Share (%)', 'publisher_rev_share'],
            ['Net Revenue ($)', 'net_revenue'],
        ];
    }

    public function activity()
    {
        $channelSearchs = ChannelSearch::orderBy('created_at', 'DESC')->get();
        return view("reports.search", compact('channelSearchs'));
    }


    public function revenue()
    {
        return view("reports.revenue");
    }


    public function showChannelSearch()
    {
        $coloumns = $this->searchColoums;
        $searchRecords = ChannelSearch::orderBy('created_at', 'DESC')->get();
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.search", compact('searchRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }

    public function searchOnChannelSearch(Request $request)
    {
        $coloumns = $this->searchColoums;
        $query = ChannelSearch::query();
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
                    return $q->whereBetween('created_at', [Carbon::now()->subDay(1)->startOfDay(), Carbon::now()->subDay(1)->endOfDay()]);
                    break;
                case ('Today'):
                    return $q->whereBetween('created_at', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()]);
                    break;
                case ('Month to Date'):
                    return $q->whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()]);
                    break;
                case ('Previous Month'):
                    return $q->whereBetween('created_at', [Carbon::now()->subMonth(1)->startOfMonth()->startOfDay(), Carbon::now()->subMonth(1)->endOfMonth()->endOfDay()]);
                    break;
                case ('custom-range'):
                    if (request('custom-range')) {
                        $dateRange = explode(" ", request('custom-range'));
                        if(count($dateRange) === 1){
                            // start and end dates are same
                            return $q->whereRaw('Date(created_at) = ?', Carbon::createFromFormat('Y-m-d', $dateRange[0])->toDateString());
                        }elseif(count($dateRange) === 2) {
                            return $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $dateRange[0])->startOfDay(), Carbon::createFromFormat('Y-m-d', $dateRange[2])->endOfDay()]);
                        }
                    }
                    break;
                default:
                    $msg = 'Something went wrong.';
            }
            return $q;
        });

        $searchRecords = $query->orderBy('created_at', 'DESC')->get();

        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.search", compact('searchRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }

    public function showActivity()
    {
        $coloumns = $this->activityColoums;
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
        $coloumns = $this->activityColoums;
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
                        if(count($dateRange) === 1){
                            // start and end dates are same
                            return $q->whereRaw('Date(created_at) = ?', Carbon::createFromFormat('Y-m-d', $dateRange[0])->toDateString());
                        }elseif(count($dateRange) === 2) {
                            return $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $dateRange[0])->startOfDay(), Carbon::createFromFormat('Y-m-d', $dateRange[2])->endOfDay()]);
                        }
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
        $coloumns = $this->revenueColoums;

        $revenueRecords = Revenue::all();
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $channels = Channel::all();
        $feeds = Feed::all();
        return view("reports.revenue", compact('revenueRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }

    public function uploadFileRevenue(Request $request)
    {
        $rowErrors = null;
        if ($request->hasFile('revenueReport')) {
            $now = now();
            // $recordBefore = Revenue::where('updated_at', $now)->count();
            try {
                Revenue::whereNot('daily_reports_status', 'complete')->update(['daily_reports_status' => 'complete']);
                Excel::import(new RevenueImport, $request->file('revenueReport'));
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();
                foreach ($failures as $failure) {
                    $rowErrors = $rowErrors . strval($failure->row()) . ', ';
                }
            } catch (\Throwable $th) {
                Log::error($th);
                return redirect()->back()->with('error', "File couldn't uploaded, error :  " . $th->getMessage());
            }

            $recordAfter = Revenue::where('updated_at','>=', $now)->count();
            $error = $rowErrors ? 'Skipped Rows for report ids, couldn\'t found feeds or channel not assigned: ' . $rowErrors : '';
            if($recordAfter == 0){
                $response = redirect()->back()->with('error', "No data uploaded");
                if($error){
                    $response->with('warning', $error);
                }

                return $response;
            }

            return redirect()->back()->with('success', "Data successfully have been uploaded!")->with('warning', $error);
        } else {
            return redirect()->back()->with('error', "Error while importing data");
        }
    }

    public function searchOnRevenue(Request $request)
    {
        $coloumns = $this->revenueColoums;

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
                        if(count($dateRange) === 1){
                            // start and end dates are same
                            return $q->whereRaw('revenue_date = ?', Carbon::createFromFormat('Y-m-d', $dateRange[0])->toDateString());
                        }elseif(count($dateRange) === 2) {
                            return $q->whereBetween('revenue_date', [Carbon::createFromFormat('Y-m-d', $dateRange[0])->startOfDay(), Carbon::createFromFormat('Y-m-d', $dateRange[2])->endOfDay()]);
                        }
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
        return view("reports.revenue", compact('revenueRecords', 'publishers', 'advertisers', 'feeds', 'channels', 'coloumns'));
    }
}
