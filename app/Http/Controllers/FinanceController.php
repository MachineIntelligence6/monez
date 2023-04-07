<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('finance.index');
    }
}
