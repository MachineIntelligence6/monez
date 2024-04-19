<?php

namespace App\Imports;

use App\Advertiser;
use App\Channel;
use App\Feed;
use App\Publisher;
use App\Revenue;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RevenueImport implements ToModel, WithStartRow, WithValidation, SkipsEmptyRows, SkipsOnError, SkipsOnFailure
{
    use SkipsErrors, SkipsFailures;

    private $reportsIds;

    public function __construct()
    {
        $this->reportsIds = Feed::select('reportId')->get()->pluck('reportId')->toArray();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $feed = Feed::where('reportId', $row[2])->first();
        if ($feed === null) {
            return null;
        }

        $channel = null;
        foreach (Channel::all() as $key => $value) {
            $feedIds = explode(',', $value->feed_ids);
            if (in_array($feed->id, $feedIds)) {
                $channel = $value;
                break;
            }
        }
        if ($channel === null) {
            return null;
        }

        // Log::info($row[2]);
        $publisher = Publisher::find($channel->publisher_id)->first();
        if ($publisher === null) {
            return null;
        }

        $advertiser = Advertiser::where('advertiser_id', $row[1])->first();
        if ($advertiser === null) {
            return null;
        }

        $status = 'available';
        $revenueDate = Carbon::parse($row[0])->toDateString();
        $totalSearches = trim($row[5]);
        if ($totalSearches === '') {
            $totalSearches = 0;
            $status = 'not available';
        }
        $monetizedSearches = trim($row[6]);
        if ($monetizedSearches === '') {
            $monetizedSearches = 0;
//            $status = 'not available';
        }
        $paidClicks = trim($row[7]);
        if ($paidClicks === '') {
            $paidClicks = 0;
//            $status = 'not available';
        }

        $grossRevenue = trim($row[8]);
        if ($grossRevenue === '') {
            $grossRevenue = 0;
            $status = 'not available';
        }

        $geo = $row[4];
        $netRevenue = ($publisher->revenue_share / 100) * $grossRevenue;
        $coverage = $totalSearches == 0 ? 0 : ($monetizedSearches / $totalSearches) * 100;
        $ctr = $monetizedSearches == 0 ? 0 : ($paidClicks / $monetizedSearches) * 100;
        $rpm = $totalSearches == 0 ? 0 : ($grossRevenue / $totalSearches) * 1000;
        $monetized_rpm = $monetizedSearches == 0 ? 0 : ($grossRevenue / $monetizedSearches) * 1000;
        $epc = $paidClicks == 0 ? 0 : ($grossRevenue / $paidClicks);

        $revenue = Revenue::where('revenue_date', $revenueDate)
            ->where('advertiser_id', $advertiser ? $advertiser->id : null)
            ->where('report_id', $row[2])
            ->first();

        if ($revenue and $revenue->daily_reports_status !== 'complete') {
            $revenue->geo = $geo;
            $revenue->total_searches = $totalSearches;
            $revenue->monetized_searches = $row[6];
            $revenue->paid_clicks = $paidClicks;
            $revenue->gross_revenue = $grossRevenue;
            $revenue->net_revenue = $netRevenue;
            $revenue->coverage = $coverage;
            $revenue->ctr = $ctr;
            $revenue->rpm = $rpm;
            $revenue->monetized_rpm = $monetized_rpm;
            $revenue->epc = $epc;
            $revenue->daily_reports_status = $status;
            $revenue->sub_id = $row[3];
            $revenue->save();
        } else {
            return new Revenue([
                'revenue_date' => $revenueDate,
                'channel_id' => $channel->id,
                'advertiser_id' => $advertiser->id,
                'publisher_id' => $channel->publisher_id,
                'feed_id' => $feed->id,
                'channel' => $channel->channelId,
                // 'advertiser' => $row[0],
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
                'daily_reports_status' => $status
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            // '2' => Rule::in($this->reportsIds),
            '2' => function ($attribute, $value, $onFailure) {
                if (!in_array($value, $this->reportsIds)) {
                    $onFailure($value);
                }
            },
            '0' => 'required',
            '1' => 'required',
        ];
    }

    public function customValidationMessages(){
        return [
            '2' => 'Invalid report ID provided',
            '0' => 'Invalid date provided',
            '1' => 'Invalid advertiser provided'
        ];
    }

    public function stopOnFirstFailure(): bool
    {
        return false; // Ensure that import continues after first failure
    }

    public function batchSize(): int
    {
        return 2000; // Adjust batch size as needed
    }
}
