<?php

namespace App\Imports;

use App\Activity;
use App\Advertiser;
use App\Channel;
use App\Feed;
use App\Publisher;
use App\Revenue;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class RevenueImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $feed = Feed::where('reportId', $row[2])->first();
        if ($feed) {
            $channel = null;
            foreach (Channel::all() as $key => $value) {
                $feedIds = explode(',', $value->feed_ids);
                if (in_array($feed->id, $feedIds)) {
                    $channel = $value;
                    break;
                }
            }
            if ($channel) {
                $publisher = Publisher::find($channel->publisher_id)->first();
                $advertiser = Advertiser::where('advertiser_id', $row[1])->first();
                if ($advertiser) {
                    $revenueDate = date('Y-m-d', strtotime($row[0]));
                    $totalSearches = $row[5];
                    $monetizedSearches = $row[6];
                    $paidClicks = $row[7];
                    $grossRevenue = $row[8];
                    $geo = $row[4];
                    $netRevenue = ($publisher->revenue_share * 100) / $grossRevenue;
                    $coverage = ($monetizedSearches / $totalSearches) * 100;
                    $ctr = ($paidClicks / $monetizedSearches) * 100;
                    $rpm = ($netRevenue / $totalSearches) * 100;
                    $monetized_rpm = ($monetizedSearches / $totalSearches) * 100;
                    $epc = ($netRevenue / $totalSearches) * 100;

                    $revenue = Revenue::where('revenue_date', $revenueDate)
                        ->where('advertiser_id', $advertiser ? $advertiser->id : null)
                        ->where('report_id', $row[2])
                        ->first();

                    if ($revenue) {
                        $revenue->geo = $geo;
                        $revenue->total_searches = $totalSearches;
                        $revenue->monetized_searches = $monetizedSearches;
                        $revenue->paid_clicks = $paidClicks;
                        $revenue->gross_revenue = $grossRevenue;
                        $revenue->net_revenue = $netRevenue;
                        $revenue->coverage = $coverage;
                        $revenue->ctr = $ctr;
                        $revenue->rpm = $rpm;
                        $revenue->monetized_rpm = $monetized_rpm;
                        $revenue->epc = $epc;
                        $revenue->daily_reports_status = 'available';
                        $revenue->save();
                    } else {
                        return new Revenue([
                            'revenue_date' => $revenueDate,
                            'channel_id' => $channel->id,
                            'advertiser_id' => $advertiser->id,
                            'publisher_id' => $channel->publisher_id,
                            'feed_id' => $feed->id,
                            'channel' => $channel->channelId,
                            // 'advertiser' => $row[0],˝
                            // 'publisher' => $row[0],
                            'report_id' => $row[2],
                            'feed' => $feed->feedId,
                            'sub_id' => $row[3],
                            'geo' => $row[4],
                            'total_searches' => $totalSearches,
                            'monetized_searches' => $row[6],
                            'paid_clicks' => $paidClicks,
                            'gross_revenue' => $grossRevenue,
                            // 'advertiser_revenue' => $row[0],
                            // 'search_monez_revenue' => $row[0],
                            'net_revenue' => $netRevenue,
                            'coverage' => $coverage,
                            'ctr' => $ctr,
                            'rpm' => $rpm,
                            'monetized_rpm' => $monetized_rpm,
                            'epc' => $epc,
                        ]);
                    }
                }
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
