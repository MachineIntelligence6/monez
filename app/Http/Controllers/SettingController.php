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

class SettingController extends Controller
{
    public function financialYear(Request $request)
    {
        // dd('it is financialYear');
        return view('crm.settings.financialYear');
    }

    public function dateFormat()
    {
        return view('crm.settings.dateFormat');
    }

    public function language()
    {
        return view('crm.settings.language');
    }

    public function timezone()
    {
        return view('crm.settings.timezone');
    }

    public function searchpath()
    {
        $links = SearchPath::where('user_id', 1)->get();
        return view('crm.settings.searchpath', compact('links'));
    }

    private $def;

    public function searchPathStore(Request $request)
    {
        $userId = Auth::user()->id;
        $def = SearchPath::where('isDefault', '=', 1)
            ->where('user_Id', '=', $userId)
            ->first();
        if ($def = null) {
            return redirect()->back()->with('error', 'You are not allowed to set more than one link default');
        } else {
            $request->validate([
                'link' => 'required|unique:searchpaths|max:255',
            ]);
            $sp = new SearchPath;
            $sp->user_id = $userId;
            $sp->link = $request->link;
            $sp->isDefault = $request->isDefault;
            $sp->save();
            return redirect()->back()->with('success', 'Your link saved successfully.');
        }
    }

    public function searchpathUpDate(Request $request, SearchPath $searchpath)
    {
        // dd($request->id);
        // dd($request->all(), $request->id, $searchpath->all(), $searchpath->first()->id);
        SearchPath::where('user_id', '=', $searchpath->first()->id)
            ->update([
                'isDefault' => 0
            ]);
        SearchPath::where('id', '=', $request->id)
            ->update([
                'isDefault' => 1
            ]);
        return redirect()->back()->with('success', 'Your link updated successfully.');
    }

    public function custummessage()
    {
        return view('crm.settings.custummessage');
    }

    public function newsletters()
    {
        return view('crm.settings.newsletters');
    }

    public function notifications()
    {
        return view('crm.settings.notifications');
    }
}
