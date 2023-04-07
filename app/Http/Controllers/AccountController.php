<?php

namespace App\Http\Controllers;

use console;
use App\Setting;
use App\SearchPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

// use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session;

// use Session;

class AccountController extends Controller
{
    public function index()
    {
        return view("account.profiles.company");
    }
}
