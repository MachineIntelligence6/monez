<?php

namespace App\Http\Controllers;

use App\ChannelPath;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelPathController extends Controller
{

    public function index()
    {
        $channelpaths = ChannelPath::with('channels')->orderByRaw("CASE WHEN is_default = 1 THEN 0 ELSE 1 END, created_at DESC")->get();
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
            'channel_path'  => 'required',
        ]);

        $channelPath = new ChannelPath;
        $channelPath->status = '1';
        if(substr($request->channel_path, -1) == "/" ){
            $channelPath->channel_path = $request->channel_path;
        } else {
            $channelPath->channel_path = $request->channel_path . '/';
        }

        $channelPath->save();
        return redirect()->route('channelpaths.index')->with('success', 'channelPath Form Data Has Been Inserted Successfuly');
    }

    public function edit(ChannelPath $channelpath)
    {

        return view('settings.channelpaths.create', compact('channelpath'));
    }

    public function update(Request $request, ChannelPath $channelpath)
    {
        if(substr($request->channel_path, -1) == "/" ){
            $channelpath->channel_path = $request->channel_path;
        } else {
            $channelpath->channel_path = $request->channel_path . '/';
        }

        $channelpath->update();
        return redirect()->route('settings.channelpaths.index')->with('success', 'channelPath Form Data Has Been Updated Successfuly:');
    }

    public function view(ChannelPath $channelpath)
    {
        // dd($channelpath);

        return view('settings.channelpaths.create', compact('channelpath'));
    }
    public function makeChannelPathDefault(ChannelPath $channelpath)
    {
        ChannelPath::where('id', '<>', $channelpath->id)->update(['is_default' => false]);
        $channelpath->is_default = true;
        $channelpath->save();
        return redirect()->back();
    }

    public function enable(ChannelPath $channelpath)
    {
        $channelpath->status = true;
        $channelpath->save();
        return redirect()->back();
    }

    public function disable(ChannelPath $channelpath)
    {
        $channelpath->status = false;
        $channelpath->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        // dd($id);
        $member = ChannelPath::findOrFail($id);
        $member->delete();
        return redirect()->route('channelpaths.index');


    }
}
