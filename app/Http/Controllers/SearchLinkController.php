<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchLinkController extends Controller
{
    public function index()
    {
        return view('settings.search-link.index');
    }
}
