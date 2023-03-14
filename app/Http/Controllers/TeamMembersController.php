<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamMembersController extends Controller
{
    public function index()
    {
        return view('teammembers.index');
    }
}
