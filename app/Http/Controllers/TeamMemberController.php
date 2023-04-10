<?php

namespace App\Http\Controllers;

use App\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\State;
use App\City;
use App\Bank;
class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $teamMembers = DB::table('team_members')
        //     ->leftJoin('advertisers', 'team_members.id', '=', 'advertisers.team_member_id')->get();
        $teamMembers= TeamMember::all();
            // dd($teamMembers);
        return view('teammembers.index',compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $banks = Bank::all();

        return view('teammembers.create', compact('countries', 'states', 'cities', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('test');
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'password'=> 'required',
            'skype'=> 'required',
            'linkedin'=> 'required',
        ]);
        // dd($validatedData);
        $teamMember = new TeamMember();
        // dd($validatedData);
        $teamMember->name = $request->name;
        $teamMember->email = $request->email;
        $teamMember->password = $request->password;
        $teamMember->skype = $request->skype;
        $teamMember->linkedin = $request->linkedin;
        $teamMember->amPhone = $request->amPhone;
        $teamMember->country_code = $request->country_code;
        // dd($teamMember);
        $teamMember->save();
        // $teamMember->create($validatedData);
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
        $countries = Country::all();
        $banks = Bank::all();
        return view('teammembers.create', compact('teamMember', 'countries', 'banks'));
    }

    public function view(TeamMember $teamMember)
    {
        $currentUrl = url()->current();
        $segments = request()->segments();
        $lastSegment = last($segments);
        $teamMember = TeamMember::where('id', $lastSegment)->firstOrFail();
        // dd($teamMember);
        // $teamMember = TeamMember::all();
        // dd($id);
        $countries = Country::all();
        $banks = Bank::all();
        $selectedcountry = $teamMember->country_code;
        return view('teammembers.create', compact('teamMember','selectedcountry', 'countries', 'banks'));
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
