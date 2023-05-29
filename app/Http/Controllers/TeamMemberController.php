<?php

namespace App\Http\Controllers;

use App\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\State;
use App\City;
use App\Bank;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers= User::whereIn('role', ['Team Member', 'Admin'])->orderBy('created_at', 'desc')->get();

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
            'phone'=>'required',
            // 'skype'=> 'required',
            // 'linkedin'=> 'required',
        ]);
        // dd($validatedData);
        $teamMember = new User();
        // dd($validatedData);
        $teamMember->name = $request->name;
        $teamMember->email = $request->email;
        $teamMember->password = Hash::make($request->password);
        $teamMember->skype = $request->skype;
        $teamMember->linkedin = $request->linkedin;
        $teamMember->phone = $request->phone;
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
        $member = User::query()->where('id',$id)->first();
        return view('teammembers.edit',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teamMember)
    {
        $countries = Country::all();
        $banks = Bank::all();
        $selectedcountry = $teamMember->country_code;
        return view('teammembers.create', compact('teamMember','selectedcountry', 'countries', 'banks'));
    }

    public function view(User $teamMember)
    {
        $currentUrl = url()->current();
        $segments = request()->segments();
        $lastSegment = last($segments);
        $teamMember = User::where('id', $lastSegment)->firstOrFail();
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
    public function checkUniqueteamEmail(Request $request)
    {
        $id = $request->teammember_id;
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:users,email',
        ]);
        // $validator = Validator::make($request->all(), [
        //     'input_field' => [
        //         'email',
        //         Rule::unique('team_members', 'email')->ignore(Auth::id())
        //     ]
        // ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The email is already used.']);
        }

        return response()->json(['status' => 'success']);


        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The email is already used.']);
        }

        return response()->json(['status' => 'success']);
    }

    public function checkUniquetephone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:users,phone',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The Phone# is already used.']);
        }

        return response()->json(['status' => 'success']);
    }
    public function update(Request $request, $id)
    {
        $members = User::find($id);
        $members->name = $request->name;
        $members->email = $request->email;
        if($request->has('password')){
            $members->password = Hash::make($request->password);
        }
        $members->skype = $request->skype;
        $members->linkedin = $request->linkedin;
        $members->phone = $request->phone;
        $members->country_code = $request->country_code;
        // dd($members);
        $members->update();
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
        $member = User::findOrFail($id);
        $member->delete();
        return redirect()->route('team-members.index');


    }


}
