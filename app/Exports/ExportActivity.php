<?php

namespace App\Exports;

use App\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportActivity implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Activity::select('activity_date', 'channel', 'publisher', 'revenue_share', 'feed', 'advertiser')->get();
    }
}
