<?php

namespace App\Http\Controllers;

use App\Advertiser;
use App\CustomMessage;
use App\Publisher;
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


    public function index()
    {
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $custommessages = CustomMessage::all();
        $jsonData = json_encode(['publishers' => $publishers, 'advertisers' => $advertisers,'custommessages'=>$custommessages]);

        return view('settings.index',compact('publishers','advertisers','custommessages'), ['jsonData' => $jsonData]);

        // return view("settings.index",compact('publishers','advertisers'));
    }

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

    public function storeCustomMessage(Request $request)
    {
        // dd('test');
        $validatedData = $request->validate([
            // 'recipient_ids' => 'required',
            // 'recipient_type' => 'required',
            // 'message'  => 'required',
        ]);
        
        $message = new CustomMessage;
        $messagerecipient_type = $request->parteners;
        $message->message = $request->message;
        if ($messagerecipient_type === 'publishers' || $messagerecipient_type === 'advertisers') {
            // dd($messagerecipient_type);
            $message->recipient_type = $request->parteners;
            $message->recipient_ids = null;
        } else {
            // dd($messagerecipient_type,'custom');
            $message->recipient_type = 'custom';
            $customUsers = $request->input('custom_users');
            $ids = [];
            foreach ($customUsers as $customUser) {
                $parts = explode('_', $customUser);
                if ($parts[0] === 'p') {
                    $ids[] = 'p_' . $parts[1];
                } elseif ($parts[0] === 'a') {
                    $ids[] = 'a_' . $parts[1];
                }
            }
             $idString = implode(',', $ids);
            // dd($idString);
            $message->recipient_ids = $idString;
        }
        $message->save();
        return redirect()->route('settings.index');
        
    }

    public function updateCustomMessage(Request $request, CustomMessage $customMessage)
    {
        // dd($customMessage);
        $validatedData = $request->validate([
            'message'  => 'required',
        ]);

        $customMessage->message = $request->message;
        $messagerecipient_type = $request->parteners;
        $customMessage->message = $request->message;
        if ($messagerecipient_type === 'publishers' || $messagerecipient_type === 'advertisers' || $messagerecipient_type === 'all') {
            // dd($messagerecipient_type);
            $customMessage->recipient_type = $request->parteners;
            $customMessage->recipient_ids = null;
        } else {
            // dd($messagerecipient_type,'custom');
            $customMessage->recipient_type = 'custom';
            $customUsers = $request->input('custom_users');
            $ids = [];
            foreach ($customUsers as $customUser) {
                $parts = explode('_', $customUser);
                if ($parts[0] === 'p') {
                    $ids[] = 'p_' . $parts[1];
                } elseif ($parts[0] === 'a') {
                    $ids[] = 'a_' . $parts[1];
                }
            }
             $idString = implode(',', $ids);
            // dd($idString);
            $customMessage->recipient_ids = $idString;
        }
        $customMessage->update();
        return redirect()->route('settings.index');
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
