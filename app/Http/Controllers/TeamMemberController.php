<?php

namespace App\Http\Controllers;

use App\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teamMembers = DB::table('team_members')
            ->leftJoin('advertisers', 'team_members.id', '=', 'advertisers.team_member_id')->get();
        return view('teammembers.index',compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'password'=> 'required',
            'skype'=> 'required',
            'linkedin'=> 'required',
        ]);
        $teamMember = new TeamMember();
        $teamMember->create($validatedData);
        return redirect()->route('team-members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = TeamMember::query()->where('id',$id)->first();
        return view('teammembers.edit',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $members = TeamMember::query()->where('id',$id)->first();
        $members->name = $request->name;
        $members->email = $request->email;
        $members->skype = $request->skype;
        $members->linkedin = $request->linkedin;
        $members->save();
        return redirect()->route('team-members.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->delete();
        return redirect()->route('team-members.index');


    }
}
