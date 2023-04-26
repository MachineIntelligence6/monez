<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class ReportsController extends Controller
{
    public function activity()
    {
        return view("reports.activity");
    }


    public function revenue()
    {
        return view("reports.revenue");
    }
}
