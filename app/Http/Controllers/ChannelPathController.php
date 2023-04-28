<?php

namespace App\Http\Controllers;

use App\ChannelPath;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelPathController extends Controller
{
    //
    
    public function index()
    {
        $channelpaths = ChannelPath::orderBy('created_at', 'asc')->get();
        return view('settings.channelpaths.index',compact('channelpaths'));
    }
    public function create()
    {       
        return view('settings.channelpaths.create');
    }

    public function store(Request $request)
    {
        // dd($request->channel_name,$request->channel_path);
        $validatedData = $request->validate([
            'channel_name' => 'required',
            'channel_path'  => 'required',
        ]);
        $channelPath = new ChannelPath;
        $channelPath->channel_name = $request->channel_name;
        $channelPath->channel_path = $request->channel_path;
        
        $channelPath->save();
        return redirect()->route('channelpaths.index')->with('success', 'channelPath Form Data Has Been Inserted Successfuly');
    }

    public function edit(ChannelPath $channelpath)
    {
       
        return view('settings.channelpaths.create', compact('channelpath'));
    }

    public function update(Request $request, ChannelPath $channelpath)
    {
        $channelpath->channel_name = $request->channel_name;
        $channelpath->channel_path = $request->channel_path;
        

        $channelpath->update();
        return redirect()->route('channelpaths.index')->with('success', 'channelPath Form Data Has Been Updated Successfuly:');
    }

    public function view(ChannelPath $channelpath)
    {
        // dd($channelpath);
    
        return view('settings.channelpaths.create', compact('channelpath'));
    }
}
