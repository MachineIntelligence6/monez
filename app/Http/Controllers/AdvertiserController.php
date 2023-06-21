<?php

namespace App\Http\Controllers;

use App\Advertiser;
use App\Bank;
use App\City;
use App\Country;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $advertiser = session()->get('advertiser');
        // return $advertiser->report_coloumns;
        // session()->forget('advertiser');
        // session()->forget('advActiveTab');
        $advertisers = Advertiser::orderBy('created_at', 'asc')->get();
        return view('advertiser.index', compact('advertisers'));
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

        $lastId = Advertiser::latest()->first() ? Advertiser::latest()->first()->id : 0;
        $counter = $lastId + 1;
        $availableTeamMembers = User::where('role', 'Team Member')->get();
        $advActiveTab = session()->get('advActiveTab') ?? 'accountInfoTab';
        return view('advertiser.create', compact('countries', 'availableTeamMembers', 'states', 'cities', 'banks', 'advActiveTab', 'counter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertiserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'billing_email' => 'required',
            'payoneer' => 'nullable',
            'paypal' => 'nullable',
            'bank_beneficiary_name' => 'nullable',
            'bank_beneficiary_address' => 'nullable',
            'bank_name' => 'nullable',
            'bank_address' => 'nullable',
            'bank_account_number' => 'nullable',
            'bank_routing_number' => 'nullable',
            'bank_iban' => 'nullable',
            'bank_swift' => 'nullable',
            'bank_currency' => 'nullable',
        ]);

        $advertiser = $request->session()->get('advertiser');

        $advertiser->billing_email = $request->billing_email;
        $advertiser->payoneer = $request->payoneer;
        $advertiser->paypal = $request->paypal;

        // $advertiser->report_coloumns = $advertiser->report_coloumns;

        $advertiser->save();
        $advertiser->advertiser_id = 'A' . $advertiser->id . '_' . $advertiser->advertiser_id;
        $password = Hash::make($advertiser->account_password);
        $user = User::create([
            'name' => $advertiser->company_name,
            'email' => $advertiser->account_email,
            'password' => $password,
            'role' => 'Advertiser',
        ]);
        $advertiser->account_password = $password;
        $advertiser->user_id = $user->id;
        $advertiser->save();

        session()->forget('advertiser');
        session()->forget('advActiveTab');

        return redirect()->route('advertiser.index');
    }

    public function storeAccountInSession(Request $request)
    {
        $validatedData = $request->validate([
            'advertiser_id' => 'required',
            'company_name' => 'required',
            'reg_id' => 'nullable',
            'vat_id' => 'nullable',
            'website_url' => 'required',
            'account_email' => 'required|unique:advertisers,account_email',
            'account_email' => 'required|unique:users,email',
            'account_password' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'zipcode' => 'nullable',
            'country' => 'required',
            'document_files' => 'nullable|max:10240',
            'io_files' => 'nullable|max:10240',
        ]);

        $advertiser = new Advertiser;
        $advertiser->advertiser_id = $request->advertiser_id;
        $advertiser->company_name = $request->company_name;
        $advertiser->reg_id = $request->reg_id;
        $advertiser->vat_id = $request->vat_id;
        $advertiser->website_url = $request->website_url;
        $advertiser->account_email = $request->account_email;
        $advertiser->account_password = $request->account_password;
        $advertiser->address1 = $request->address1;
        $advertiser->address2 = $request->address2;
        $advertiser->city = $request->city;
        $advertiser->state = $request->state;
        $advertiser->zipcode = $request->zipcode;
        $advertiser->country = $request->country;
        $advertiser->state = $request->state;

        if ($request->hasFile('document_files')) {
            $documentFilePaths = array();
            $documentFiles = $request->file('document_files');
            foreach ($documentFiles as $key => $file) {
                $path = $file->store('user/files');
                array_push($documentFilePaths, array('name' => 'doc' . ($key+1), 'path' => $path));
            }
            $advertiser->documents_path = json_encode($documentFilePaths);
        }
        if ($request->hasFile('io_files')) {
            $ioFilePaths = array();
            $ioFiles = $request->file('io_files');
            foreach ($ioFiles as $key => $file) {
                $path = $file->store('user/files');
                array_push($ioFilePaths, array('name' => 'io' . ($key+1), 'path' => $path));
            }
            $advertiser->io_path = json_encode($ioFilePaths);
        }

        session()->put('advertiser', $advertiser);
        session()->put('advActiveTab', 'contactInfoTab');
    }

    public function storeContactInSession(Request $request)
    {
        $validatedData = $request->validate([
            'acc_mng_first_name' => 'required',
            'acc_mng_last_name' => 'required',
            'acc_mng_email' => 'required',
            'acc_mng_phone' => 'nullable',
            'acc_mng_skype' => 'nullable',
            'acc_mng_linkedin' => 'nullable',
            'country_code' => 'nullable',
        ]);

        $advertiser = $request->session()->get('advertiser');

        $advertiser->acc_mng_first_name = $request->acc_mng_first_name;
        $advertiser->acc_mng_last_name = $request->acc_mng_last_name;
        $advertiser->acc_mng_email = $request->acc_mng_email;
        $advertiser->acc_mng_phone = $request->acc_mng_phone;
        $advertiser->acc_mng_skype = $request->acc_mng_skype;
        $advertiser->acc_mng_linkedin = $request->acc_mng_linkedin;
        $advertiser->country_code = $request->country_code;

        session()->put('advertiser', $advertiser);
        session()->put('advActiveTab', 'operationsInfoTab');
    }

    public function storeOperationInSession(Request $request)
    {
        $validatedData = $request->validate([
            'revenue_share' => 'required',
            'payment_terms' => 'required',
            'reporting_email' => 'required',
            'team_member_id' => 'required',
            'report_type'  => 'nullable',
            'api_key'  => 'nullable',
            'dashboard_path'  => 'nullable',
            'email'  => 'nullable',
            'password'  => 'nullable',
            'gdrive_email'  => 'nullable',
            'gdrive_password'  => 'nullable',
        ]);

        $advertiser = $request->session()->get('advertiser');

        $advertiser->revenue_share = $request->revenue_share;
        $advertiser->payment_terms = $request->payment_terms;
        $advertiser->reporting_email = $request->reporting_email;
        $advertiser->team_member_id = $request->team_member_id;
        $advertiser->report_type = $request->report_type;
        $advertiser->api_key = $request->api_key;
        $advertiser->dashboard_path = $request->dashboard_path;
        $advertiser->email = $request->email;
        $advertiser->password = $request->password;
        $advertiser->gdrive_email = $request->gdrive_email;
        $advertiser->gdrive_password = $request->gdrive_password;

        session()->put('advertiser', $advertiser);
        session()->put('advActiveTab', 'financeInfoTab');
    }

    public function storeReportInSession(Request $request)
    {
        // if ($request->has('edit_form')) {
        //     $reportColoumns = [
        //         'date' => $request->dateColValue,
        //         'feed' => $request->feedColValue,
        //         'subid' => $request->subidColValue,
        //         'country' => $request->countryColValue,
        //         'total_searches' => $request->totalSearchesColValue,
        //         'monitized_searches' => $request->monitizedSearchesColValue,
        //         'paid_clicks' => $request->paidClicksColValue,
        //         'revenue' => $request->revenueColValue,
        //     ];
        //     session()->put('reportColoumns', $reportColoumns);
        // } else {
        $validatedData = $request->validate([
            'report_type' => 'nullable',
            'api_key' => 'nullable',
            'dashboard_path' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'gdrive_email' => 'nullable',
            'gdrive_password' => 'nullable',
            'report_coloumns' => 'nullable',
        ]);

        if (session()->has('advertiser')) {
            $advertiser = $request->session()->get('advertiser');
        } else {
            $advertiser = new Advertiser();
        }

        $advertiser->report_type = $request->report_type;
        $advertiser->api_key = $request->api_key;
        $advertiser->dashboard_path = $request->dashboard_path;
        $advertiser->email = $request->email;
        $advertiser->password = $request->password;
        $advertiser->gdrive_email = $request->gdrive_email;
        $advertiser->gdrive_password = $request->gdrive_password;

        $advertiser->report_coloumns = json_encode([
            'date' => $request->dateColValue,
            'feed' => $request->feedColValue,
            'subid' => $request->subidColValue,
            'country' => $request->countryColValue,
            'total_searches' => $request->totalSearchesColValue,
            'monitized_searches' => $request->monitizedSearchesColValue,
            'paid_clicks' => $request->paidClicksColValue,
            'revenue' => $request->revenueColValue,
        ]);

        session()->put('advertiser', $advertiser);
        // }
    }

    public function storeBankInSession(Request $request)
    {
        $request->validate([
            'bank_beneficiary_name' => 'nullable',
            'bank_beneficiary_address' => 'nullable',
            'bank_name' => 'nullable',
            'bank_address' => 'nullable',
            'bank_account_number' => 'nullable',
            'bank_routing_number' => 'nullable',
            'bank_iban' => 'nullable',
            'bank_swift' => 'nullable',
            'bank_currency' => 'nullable',
        ]);

        if (session()->has('advertiser')) {
            $advertiser = $request->session()->get('advertiser');
        } else {
            $advertiser = new Advertiser();
        }

        $advertiser->bank_beneficiary_name = $request->bank_beneficiary_name;
        $advertiser->bank_beneficiary_address = $request->bank_beneficiary_address;
        $advertiser->bank_name = $request->bank_name;
        $advertiser->bank_address = $request->bank_address;
        $advertiser->bank_account_number = $request->bank_account_number;
        $advertiser->bank_routing_number = $request->bank_routing_number;
        $advertiser->bank_iban = $request->bank_iban;
        $advertiser->bank_swift = $request->bank_swift;
        $advertiser->bank_currency = $request->bank_currency;

        session()->put('advertiser', $advertiser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(Advertiser $advertiser)
    {
        // return $advertiser;
        $countries = Country::all();
        $banks = Bank::all();
        $availableTeamMembers = User::where('role', 'Team Member')->get();

        return view('advertiser.edit', compact('advertiser', 'countries', 'banks', 'availableTeamMembers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Advertiser $advertiser, $currentedit)
    {
        $countries = Country::all();
        $banks = Bank::all();
        $availableTeamMembers = User::where('role', 'Team Member')->get();
        $selectedcountry = $advertiser->country_id;
        $selectedcountrycode = $advertiser->country_code;
        return view('advertiser.edit', compact('advertiser', 'selectedcountry', 'selectedcountrycode', 'availableTeamMembers', 'countries', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertiserRequest  $request
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertiser $advertiser, $currentedit)
    {
        $message = "";

        switch ($currentedit) {
            case 'accountinfo':
                $request->validate([
                    'advertiser_id' => 'required',
                    'company_name' => 'required',
                    'reg_id' => 'nullable',
                    'vat_id' => 'nullable',
                    'website_url' => 'required',
                    'account_email' => 'required',
                    'account_password' => 'nullable',
                    'address1' => 'required',
                    'address2' => 'nullable',
                    'city' => 'required',
                    'state' => 'nullable',
                    'zipcode' => 'nullable',
                    'country' => 'required',
                    'document_files' => 'nullable',
                    'io_files' => 'nullable',
                ]);

                $advertiser->advertiser_id = $request->advertiser_id;
                $advertiser->company_name = $request->company_name;
                $advertiser->reg_id = $request->reg_id;
                $advertiser->vat_id = $request->vat_id;
                $advertiser->website_url = $request->website_url;
                if($advertiser->account_email != $request->account_email){
                    $user = $advertiser->user;
                    $user->email = $request->account_email;
                    $user->save();
                }
                $advertiser->account_email = $request->account_email;
                if ($request->filled('account_password')) {
                    $advertiser->account_password = $request->account_password;
                    $user = $advertiser->user;
                    $user->password = Hash::make($request->account_password);
                    $user->save();
                }
                $advertiser->address1 = $request->address1;
                $advertiser->address2 = $request->address2;
                $advertiser->city = $request->city;
                $advertiser->state = $request->state;
                $advertiser->zipcode = $request->zipcode;
                $advertiser->country = $request->country;
                $advertiser->state = $request->state;

                if ($request->hasFile('document_files')) {
                    $documentFilePaths = array();
                    $documentFiles = $request->file('document_files');
                    foreach ($documentFiles as $key => $file) {
                        $path = $file->store('user/files');
                        array_push($documentFilePaths, array('name' => 'doc' . ($key+1), 'path' => $path));
                    }
                    $advertiser->documents_path = json_encode($documentFilePaths);
                }
                if ($request->hasFile('io_files')) {
                    $ioFilePaths = array();
                    $ioFiles = $request->file('io_files');
                    foreach ($ioFiles as $key => $file) {
                        $path = $file->store('user/files');
                        array_push($ioFilePaths, array('name' => 'io' . ($key+1), 'path' => $path));
                    }
                    $advertiser->io_path = json_encode($ioFilePaths);
                }
                $message = "Account";
                break;
            case 'contactinfo':
                $request->validate([
                    'acc_mng_first_name' => 'required',
                    'acc_mng_last_name' => 'required',
                    'acc_mng_email' => 'required',
                    'acc_mng_phone' => 'nullable',
                    'acc_mng_skype' => 'nullable',
                    'acc_mng_linkedin' => 'nullable',
                    'country_code' => 'nullable',
                ]);

                $advertiser->acc_mng_first_name = $request->acc_mng_first_name;
                $advertiser->acc_mng_last_name = $request->acc_mng_last_name;
                $advertiser->acc_mng_email = $request->acc_mng_email;
                $advertiser->acc_mng_phone = $request->acc_mng_phone;
                $advertiser->acc_mng_skype = $request->acc_mng_skype;
                $advertiser->acc_mng_linkedin = $request->acc_mng_linkedin;
                $advertiser->country_code = $request->country_code;

                $message = "Contact";
                break;
            case 'operationinfo':
                $request->validate([
                    'revenue_share' => 'required',
                    'payment_terms' => 'required',
                    'reporting_email' => 'required',
                    'team_member_id' => 'required',
                    'report_type'  => 'nullable',
                    'api_key'  => 'nullable',
                    'dashboard_path'  => 'nullable',
                    'email'  => 'nullable',
                    'password'  => 'nullable',
                    'gdrive_email'  => 'nullable',
                    'gdrive_password'  => 'nullable',
                ]);

                $reportsColomns = $request->session()->get('reportsColomns');

                $advertiser->revenue_share = $request->revenue_share;
                $advertiser->payment_terms = $request->payment_terms;
                $advertiser->reporting_email = $request->reporting_email;
                $advertiser->team_member_id = $request->team_member_id;
                $advertiser->report_type = $request->report_type;
                // $advertiser->api_key = $request->api_key;
                // $advertiser->dashboard_path = $request->dashboard_path;
                // $advertiser->email = $request->email;
                // $advertiser->password = $request->password;
                // $advertiser->gdrive_email = $request->gdrive_email;
                // $advertiser->gdrive_password = $request->gdrive_password;
                $message = "Operationnal";
                break;
            case 'financeinfo':
                $request->validate([
                    'billing_email' => 'required',
                    'payoneer' => 'nullable',
                    'paypal' => 'nullable',
                    'bank_beneficiary_name' => 'nullable',
                    'bank_beneficiary_address' => 'nullable',
                    'bank_name' => 'nullable',
                    'bank_address' => 'nullable',
                    'bank_account_number' => 'nullable',
                    'bank_routing_number' => 'nullable',
                    'bank_iban' => 'nullable',
                    'bank_swift' => 'nullable',
                    'bank_currency' => 'nullable',
                ]);

                $advertiser->billing_email = $request->billing_email;
                $advertiser->payoneer = $request->payoneer;
                $advertiser->paypal = $request->paypal;
                if (session()->has('advertiser')) {
                    $advertiserInSession = $request->session()->get('advertiser');
                    $advertiser->bank_beneficiary_name = $advertiserInSession->bank_beneficiary_name;
                    $advertiser->bank_beneficiary_address = $advertiserInSession->bank_beneficiary_address;
                    $advertiser->bank_name = $advertiserInSession->bank_name;
                    $advertiser->bank_address = $advertiserInSession->bank_address;
                    $advertiser->bank_account_number = $advertiserInSession->bank_account_number;
                    $advertiser->bank_routing_number = $advertiserInSession->bank_routing_number;
                    $advertiser->bank_iban = $advertiserInSession->bank_iban;
                    $advertiser->bank_swift = $advertiserInSession->bank_swift;
                    $advertiser->bank_currency = $advertiserInSession->bank_currency;
                    session()->forget('advertiser.bank_beneficiary_name');
                    session()->forget('advertiser.bank_beneficiary_address');
                    session()->forget('advertiser.bank_name');
                    session()->forget('advertiser.bank_address');
                    session()->forget('advertiser.bank_account_number');
                    session()->forget('advertiser.bank_routing_number');
                    session()->forget('advertiser.bank_iban');
                    session()->forget('advertiser.bank_swift');
                    session()->forget('advertiser.bank_currency');
                }
                // $advertiser->report_coloumns = $advertiser->report_coloumns;

                $message = "Finance";
                break;
            default:
                # code...
                break;
        }

        $advertiser->update();

        return redirect()->route('advertiser.show', compact('advertiser'))->with('success', 'Advertiser ' . $message . ' Info Has Been Updated Successfuly:');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertiser $advertiser)
    {
        //
    }

    public function checkUniqueAdvertiserId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:advertisers,advertiser_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The value is not unique.']);
        }

        return response()->json(['status' => 'success']);
    }

    public function checkUniqueAccountEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:advertisers,account_email',
            'input_field' => 'unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The email is already used.'])->setStatusCode(400);
        }

        return response()->json(['status' => 'success']);
    }

    public function downloadFile(Advertiser $advertiser, $fileNo, $type)
    {
        if ($type == 'io') {
            $file = $advertiser->io_path[$fileNo];
        } else {
            $file = $advertiser->documents_path[$fileNo];
        }
        return Storage::download($file->path, $file->name);
    }
}
