<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\User;
use App\Bank;
use App\City;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session()->forget('publisher');
        // session()->forget('pubActiveTab');
        $publishers = Publisher::orderBy('created_at', 'asc')->get();
        return view('publisher.index', compact('publishers'));
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

        $lastId = Publisher::latest()->first() ? Publisher::latest()->first()->id : 0;
        $counter = $lastId + 1;
        $availableTeamMembers = User::where('role', 'Team Member')->get();
        $pubActiveTab = session()->get('pubActiveTab') ?? 'accountInfoTab';
        return view('publisher.create', compact('countries', 'availableTeamMembers', 'states', 'cities', 'banks', 'pubActiveTab', 'counter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertiserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$validatedData = $request->validate([
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
         
         */
        // as other section removed now we store and validate contact inof here along with putting default values
        $validatedData = $request->validate([
            'acc_mng_first_name' => 'required',
            'acc_mng_last_name' => 'required',
            'acc_mng_email' => 'required',
            'acc_mng_phone' => 'nullable',
            'acc_mng_skype' => 'nullable',
            'acc_mng_linkedin' => 'nullable|url',
            'country_code' => 'nullable',
        ]);
        
        $publisher = $request->session()->get('publisher');

        $publisher->acc_mng_first_name = $request->acc_mng_first_name;
        $publisher->acc_mng_last_name = $request->acc_mng_last_name;
        $publisher->acc_mng_email = $request->acc_mng_email;
        $publisher->acc_mng_phone = $request->acc_mng_phone;
        $publisher->acc_mng_skype = $request->acc_mng_skype;
        $publisher->acc_mng_linkedin = $request->acc_mng_linkedin;
        $publisher->country_code = $request->country_code;
        $publisher->billing_email = $publisher->account_email;
        $publisher->payment_terms = config('constant.PAYMENT_TERMS_DEFAULT_VALUE');
        $publisher->revenue_share = config('constant.REVENUE_SHARE_DEFAULT_VALUE'); // as discussed for default
        $publisher->reporting_email = $publisher->account_email;
        

        // $publisher->report_coloumns = $publisher->report_coloumns;

        $publisher->save();
        $publisher->publisher_id = 'P' . $publisher->id . '_' . $publisher->publisher_id;
        $password = Hash::make($publisher->account_password);
        $user = User::create([
            'name' => $publisher->company_name,
            'email' => $publisher->account_email,
            'password' => $password,
            'role' => 'Publisher',
        ]);
        $publisher->account_password = $password;
        $publisher->user_id = $user->id;
        $publisher->save();

        session()->forget('publisher');
        session()->forget('pubActiveTab');

        return redirect()->route('publisher.index');
    }

    public function storeAccountInSession(Request $request)
    {
        $validatedData = $request->validate([
            'publisher_id' => 'required',
            'company_name' => 'required',
            'team_member_id' => 'required',
            'reg_id' => 'nullable',
            'vat_id' => 'nullable',
            'website_url' => 'required|url',
            'account_email' => 'required|unique:publishers,account_email',
            'account_email' => 'required|unique:users,email',
            'account_password' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'zipcode' => 'nullable',
            'country' => 'required',
            //'document_files' => 'nullable|max:10240', move to operation info section
            //'io_files' => 'nullable|max:10240',
        ]);

        $publisher = new Publisher();
        $publisher->publisher_id = $request->publisher_id;
        $publisher->company_name = $request->company_name;
        $publisher->team_member_id = $request->team_member_id;
        $publisher->reg_id = $request->reg_id;
        $publisher->vat_id = $request->vat_id;
        $publisher->website_url = $request->website_url;
        $publisher->account_email = $request->account_email;
        $publisher->account_password = $request->account_password;
        $publisher->address1 = $request->address1;
        $publisher->address2 = $request->address2;
        $publisher->city = $request->city;
        $publisher->state = $request->state;
        $publisher->zipcode = $request->zipcode;
        $publisher->country = $request->country;
        $publisher->state = $request->state;

       /* if ($request->hasFile('document_files')) {
            $documentFilePaths = array();
            $documentFiles = $request->file('document_files');
            foreach ($documentFiles as $key => $file) {
                $path = $file->store('user/files');
                array_push($documentFilePaths, array('name' => 'doc' . ($key+1) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' .Carbon::now() . '.' . $file->getClientOriginalExtension(), 'path' => $path));
            }
            $publisher->documents_path = json_encode($documentFilePaths);
        }
        if ($request->hasFile('io_files')) {
            $ioFilePaths = array();
            $ioFiles = $request->file('io_files');
            foreach ($ioFiles as $key => $file) {
                $path = $file->store('user/files');
                array_push($ioFilePaths, array('name' => 'io' . ($key+1) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' .Carbon::now() . '.' . $file->getClientOriginalExtension(), 'path' => $path));
            }
            $publisher->io_path = json_encode($ioFilePaths);
        }*/

        session()->put('publisher', $publisher);
        session()->put('pubActiveTab', 'contactInfoTab');
    }

   /* public function storeContactInSession(Request $request)
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

        $publisher = $request->session()->get('publisher');

        $publisher->acc_mng_first_name = $request->acc_mng_first_name;
        $publisher->acc_mng_last_name = $request->acc_mng_last_name;
        $publisher->acc_mng_email = $request->acc_mng_email;
        $publisher->acc_mng_phone = $request->acc_mng_phone;
        $publisher->acc_mng_skype = $request->acc_mng_skype;
        $publisher->acc_mng_linkedin = $request->acc_mng_linkedin;
        $publisher->country_code = $request->country_code;

        session()->put('publisher', $publisher);
        session()->put('pubActiveTab', 'operationsInfoTab');
    }
    * 
    */

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

        $publisher = $request->session()->get('publisher');

        $publisher->revenue_share = $request->revenue_share;
        $publisher->payment_terms = $request->payment_terms;
        $publisher->reporting_email = $request->reporting_email;
        $publisher->team_member_id = $request->team_member_id;
        $publisher->report_type = $request->report_type;
        $publisher->api_key = $request->api_key;
        $publisher->dashboard_path = $request->dashboard_path;
        $publisher->email = $request->email;
        $publisher->password = $request->password;
        $publisher->gdrive_email = $request->gdrive_email;
        $publisher->gdrive_password = $request->gdrive_password;

        session()->put('publisher', $publisher);
        session()->put('pubActiveTab', 'financeInfoTab');
    }

    public function storeReportInSession(Request $request)
    {
        if ($request->has('edit_form')) {
            $reportColoumns = [
                'date' => $request->dateColValue,
                'feed' => $request->feedColValue,
                'subid' => $request->subidColValue,
                'country' => $request->countryColValue,
                'total_searches' => $request->totalSearchesColValue,
                'monitized_searches' => $request->monitizedSearchesColValue,
                'paid_clicks' => $request->paidClicksColValue,
                'revenue' => $request->revenueColValue,
            ];
            session()->put('reportColoumns', $reportColoumns);
        } else {
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

            if(session()->has('advertiser')){
                $publisher = $request->session()->get('publisher');
            } else {
                $publisher = new Publisher();
            }
            $publisher->report_type = $request->report_type;
            $publisher->api_key = $request->api_key;
            $publisher->dashboard_path = $request->dashboard_path;
            $publisher->email = $request->email;
            $publisher->password = $request->password;
            $publisher->gdrive_email = $request->gdrive_email;
            $publisher->gdrive_password = $request->gdrive_password;

            $publisher->report_coloumns = json_encode([
                'date' => $request->dateColValue,
                'feed' => $request->feedColValue,
                'subid' => $request->subidColValue,
                'country' => $request->countryColValue,
                'total_searches' => $request->totalSearchesColValue,
                'monitized_searches' => $request->monitizedSearchesColValue,
                'paid_clicks' => $request->paidClicksColValue,
                'revenue' => $request->revenueColValue,
            ]);

            session()->put('publisher', $publisher);
        }
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

        if(session()->has('advertiser')){
            $publisher = $request->session()->get('publisher');
        } else {
            $publisher = new Publisher();
        }

        $publisher->bank_beneficiary_name = $request->bank_beneficiary_name;
        $publisher->bank_beneficiary_address = $request->bank_beneficiary_address;
        $publisher->bank_name = $request->bank_name;
        $publisher->bank_address = $request->bank_address;
        $publisher->bank_account_number = $request->bank_account_number;
        $publisher->bank_routing_number = $request->bank_routing_number;
        $publisher->bank_iban = $request->bank_iban;
        $publisher->bank_swift = $request->bank_swift;
        $publisher->bank_currency = $request->bank_currency;

        session()->put('publisher', $publisher);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        // return $publisher;
        $countries = Country::all();
        $banks = Bank::all();
        $availableTeamMembers = User::where('role', 'Team Member')->get();

        return view('publisher.edit', compact('publisher', 'countries', 'banks', 'availableTeamMembers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Publisher $publisher, $currentedit)
    {
        $countries = Country::all();
        $banks = Bank::all();
        $availableTeamMembers = User::where('role', 'Team Member')->get();
        $selectedcountry = $publisher->country_id;
        $selectedcountrycode = $publisher->country_code;
        return view('publisher.edit', compact('publisher', 'selectedcountry', 'selectedcountrycode', 'availableTeamMembers', 'countries', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertiserRequest  $request
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher, $currentedit)
    {
        $message = "";

        switch ($currentedit) {
            case 'accountinfo':
                $request->validate([
                    'publisher_id' => 'required',
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
                    //'document_files' => 'nullable',
                    //'io_files' => 'nullable',
                ]);

                $publisher->publisher_id = $request->publisher_id;
                $publisher->company_name = $request->company_name;
                $publisher->reg_id = $request->reg_id;
                $publisher->vat_id = $request->vat_id;
                $publisher->website_url = $request->website_url;
                if($publisher->account_email != $request->account_email){
                    $user = $publisher->user;
                    $user->email = $request->account_email;
                    $user->save();
                }
                $publisher->account_email = $request->account_email;
                if ($request->filled('account_password')) {
                    $publisher->account_password = $request->account_password;
                    $user = $publisher->user;
                    $user->password = Hash::make($request->account_password);
                    $user->save();
                }
                $publisher->address1 = $request->address1;
                $publisher->address2 = $request->address2;
                $publisher->city = $request->city;
                $publisher->state = $request->state;
                $publisher->zipcode = $request->zipcode;
                $publisher->country = $request->country;
                $publisher->state = $request->state;

                /*if ($request->hasFile('document_files')) {
                    $documentFilePaths = array();
                    $documentFiles = $request->file('document_files');
                    foreach ($documentFiles as $key => $file) {
                        $path = $file->store('user/files');
                        array_push($documentFilePaths, array('name' => 'doc' . ($key+1) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' .Carbon::now() . '.' . $file->getClientOriginalExtension(), 'path' => $path));
                    }
                    $publisher->documents_path = json_encode($documentFilePaths);
                }
                if ($request->hasFile('io_files')) {
                    $ioFilePaths = array();
                    $ioFiles = $request->file('io_files');
                    foreach ($ioFiles as $key => $file) {
                        $path = $file->store('user/files');
                        array_push($ioFilePaths, array('name' => 'io' . ($key+1) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' .Carbon::now() . '.' . $file->getClientOriginalExtension(), 'path' => $path));
                    }
                    $publisher->io_path = json_encode($ioFilePaths);
                }
                 * 
                 */
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

                $publisher->acc_mng_first_name = $request->acc_mng_first_name;
                $publisher->acc_mng_last_name = $request->acc_mng_last_name;
                $publisher->acc_mng_email = $request->acc_mng_email;
                $publisher->acc_mng_phone = $request->acc_mng_phone;
                $publisher->acc_mng_skype = $request->acc_mng_skype;
                $publisher->acc_mng_linkedin = $request->acc_mng_linkedin;
                $publisher->country_code = $request->country_code;

                $message = "Contact";
                break;
            case 'operationinfo':
                $request->validate([
                    'revenue_share' => 'required',
                    'payment_terms' => 'required',
                    'reporting_email' => 'required',
                    //'team_member_id' => 'required', //move to account info section
                   /* 'report_type'  => 'nullable',
                    'api_key'  => 'nullable',
                    'dashboard_path'  => 'nullable',
                    'email'  => 'nullable',
                    'password'  => 'nullable',
                    'gdrive_email'  => 'nullable',
                    'gdrive_password'  => 'nullable',
                    * 
                    */
                ]);

                //$reportsColomns = $request->session()->get('reportsColomns');

                $publisher->revenue_share = $request->revenue_share;
                $publisher->payment_terms = $request->payment_terms;
                $publisher->reporting_email = $request->reporting_email;
                if ($request->hasFile('document_files')) {
                    $documentFilePaths = array();
                    $documentFiles = $request->file('document_files');
                    foreach ($documentFiles as $key => $file) {
                        $path = $file->store('user/files');
                        array_push($documentFilePaths, array('name' => 'doc' . ($key+1) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' .Carbon::now() . '.' . $file->getClientOriginalExtension(), 'path' => $path));
                    }
                    $publisher->documents_path = json_encode($documentFilePaths);
                }
                if ($request->hasFile('io_files')) {
                    $ioFilePaths = array();
                    $ioFiles = $request->file('io_files');
                    foreach ($ioFiles as $key => $file) {
                        $path = $file->store('user/files');
                        array_push($ioFilePaths, array('name' => 'io' . ($key+1) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' .Carbon::now() . '.' . $file->getClientOriginalExtension(), 'path' => $path));
                    }
                    $publisher->io_path = json_encode($ioFilePaths);
                }
                
                
                
                //$publisher->team_member_id = $request->team_member_id;
                //$publisher->report_type = $request->report_type;
                // $publisher->api_key = $request->api_key;
                // $publisher->dashboard_path = $request->dashboard_path;
                // $publisher->email = $request->email;
                // $publisher->password = $request->password;
                // $publisher->gdrive_email = $request->gdrive_email;
                // $publisher->gdrive_password = $request->gdrive_password;
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

                $publisher->billing_email = $request->billing_email;
                $publisher->payoneer = $request->payoneer;
                $publisher->paypal = $request->paypal;
                if(session()->has('publisher')){
                    $publisherInSession = $request->session()->get('publisher');
                    $publisher->bank_beneficiary_name = $publisherInSession->bank_beneficiary_name;
                    $publisher->bank_beneficiary_address = $publisherInSession->bank_beneficiary_address;
                    $publisher->bank_name = $publisherInSession->bank_name;
                    $publisher->bank_address = $publisherInSession->bank_address;
                    $publisher->bank_account_number = $publisherInSession->bank_account_number;
                    $publisher->bank_routing_number = $publisherInSession->bank_routing_number;
                    $publisher->bank_iban = $publisherInSession->bank_iban;
                    $publisher->bank_swift = $publisherInSession->bank_swift;
                    $publisher->bank_currency = $publisherInSession->bank_currency;
                    session()->forget('publisher.bank_beneficiary_name');
                    session()->forget('publisher.bank_beneficiary_address');
                    session()->forget('publisher.bank_name');
                    session()->forget('publisher.bank_address');
                    session()->forget('publisher.bank_account_number');
                    session()->forget('publisher.bank_routing_number');
                    session()->forget('publisher.bank_iban');
                    session()->forget('publisher.bank_swift');
                    session()->forget('publisher.bank_currency');
                }
                // $publisher->report_coloumns = $publisher->report_coloumns;

                $message = "Finance";
                break;
            default:
                # code...
                break;
        }

        $publisher->update();

        return redirect()->route('publisher.show', compact('publisher'))->with('success', 'Publisher ' . $message . ' Info Has Been Updated Successfuly:');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        //
    }

    public function checkUniqueAdvertiserId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:publishers,publisher_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The value is not unique.']);
        }

        return response()->json(['status' => 'success']);
    }

    public function checkUniqueAccountEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:publishers,account_email',
            'input_field' => 'unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The email is already used.'])->setStatusCode(400);
        }

        return response()->json(['status' => 'success']);
    }

    public function downloadFile(Publisher $publisher, $fileNo, $type){
        if($type == 'io'){
            $file = $publisher->io_path[$fileNo];
        } else {
            $file = $publisher->documents_path[$fileNo];
        }
        return Storage::download($file->path, $file->name);
    }
}
