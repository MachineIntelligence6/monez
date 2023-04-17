<?php

namespace App\Http\Controllers;

use App\AdvertiserBankDetail;
use App\AdvertiserReportColumn;
use App\AdvertiserReportType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Advertiser;
use App\Country;
use App\State;
use App\City;
use App\Bank;
use App\TeamMember;
use Illuminate\Support\Facades\Validator;

class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisers = Advertiser::orderBy('created_at', 'asc')->get();
        // dd($advertisers);
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
        $teamMembers = TeamMember::all();
        $advertisers = Advertiser::all();

        $teamMemberIds = $teamMembers->pluck('id')->toArray();
        $assignedAdvertisers = Advertiser::whereIn('team_member_id', $teamMemberIds)->get();
        $assignedTeamMemberIds = $assignedAdvertisers->pluck('team_member_id')->toArray();
        $availableTeamMembers = TeamMember::whereNotIn('id', $assignedTeamMemberIds)->get();

        // dd($availableTeamMembers);
        return view('advertiser.create', compact('countries','availableTeamMembers', 'states', 'cities', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dfd('test');
        $validatedData = $request->validate([
            'dbaId' => 'required',
            'companyName'  => 'required',
            'url' => 'required',
            'accEmail' => 'required',
            'password' => 'required',
            'address1' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'amFirstName' => 'required',
            'amLastName' => 'required',
            'amEmail' => 'required',
            'revSharePer' => 'required',
            'paymentTerms' => 'required',
            //            'reportEmail' => 'required',
            //            'agreementDoc' => 'required|max:2048|mimes:pdf,pdf',
            //            'document' => 'required|max:2048|mimes:pdf,pdf',
        ]);
        $Ios = [];
        if ($request->hasFile('ios')) {
            $i = 1; // initialize a counter for io files
            foreach ($request->file('ios') as $io) {
                $ioName = $io->getClientOriginalName();
                $dbaId = $request->dbaId;
                $agreementDoc = "io" . $i . "." . $io->getClientOriginalExtension(); 
                // $agreementDoc = $dbaId . "-" . time() . "-io" . $i . "." . $io->getClientOriginalExtension();
                $io->move(public_path('assets/files/uploads/ios/' . $dbaId . ''), $agreementDoc);
                // dd($io->move(public_path('assets/files/uploads/ios/' . $dbaId . ''), $agreementDoc));
                $Ios[] = $agreementDoc;
                $i++; // increment the io counter
            }
        } else {
            $agreementDoc = "Not Delivered";
        }
        $Documents = [];
        if ($request->hasFile('documents')) {
            $j = 1; // initialize a counter for document files
            foreach ($request->file('documents') as $document) {
                $documentName = $document->getClientOriginalName();
                $dbaId = $request->dbaId;
                $documentFile = "doc" . $j . "." . $document->getClientOriginalExtension(); 
                $document->move(public_path('assets/files/uploads/document/' . $dbaId . ''), $documentFile);
                // dd($document->move(public_path('assets/files/uploads/document/' . $dbaId . ''), $documentFile));
                $Documents[] = $documentFile;
                $j++; // increment the document counter
            }
        } else {
            $document = "Not Delivered";
        }

        $adv = new Advertiser;

        $adv->dbaId = $request->dbaId;
        $adv->companyName = $request->companyName;
        $adv->regId = $request->regId;
        $adv->vat = $request->vat;
        $adv->url = $request->url;
        $adv->accEmail = $request->accEmail;
        $adv->password = $request->password;
        $adv->billEmail = $request->billEmail;
        $adv->reportEmail = $request->form_reportEmail;
        $adv->address1 = $request->address1;
        $adv->address2 = $request->address2;
        $adv->city_id = $request->city_id;
        $adv->state_id = $request->state_id;
        $adv->country_id = $request->country_id;
        $adv->country_code = $request->country_code;
        $adv->zipCode = $request->zipCode;
        $adv->amFirstName = $request->amFirstName;
        $adv->amLastName = $request->amLastName;
        $adv->amEmail = $request->amEmail;
        $adv->amPhone = $request->amPhone;
        $adv->amSkype = $request->amSkype;
        $adv->amLinkedIn = $request->amLinkedIn;
        $adv->agreementDoc = implode(",", $Ios);
        $adv->revSharePer = $request->revSharePer;
        $adv->paymentTerms = $request->paymentTerms;
        $adv->payoneer = $request->payoneer;
        $adv->paypal = $request->paypal;
        $adv->document = implode(',', $Documents);
        $adv->notes = $request->notes;
        $adv->agreement_start_date = $request->AgreementStartDate;
        $adv->team_member_id = $request->team_member_id;
        // dd($adv);
        $adv->save();

        $bankDetails = new AdvertiserBankDetail;
        $bankDetails->advertiser_id = $adv->id;
        $bankDetails->beneficiary_name = $request->beneficiaryName;
        $bankDetails->beneficiary_address = $request->beneficiaryAddress;
        $bankDetails->bank_name = $request->bankName;
        $bankDetails->bank_address = $request->bankAddress;
        $bankDetails->account_number = $request->accountNumber;
        $bankDetails->routing_number = $request->routingNumber;
        $bankDetails->iban = $request->iban;
        $bankDetails->swift = $request->swift;
        $bankDetails->currency = $request->currency;
        $bankDetails->save();


        //updating bank id
        $lastId = $bankDetails->id;
        $advertiser =Advertiser::where('id', $adv->id)->first();
        $advertiser->bank_id = $lastId;

        $advertiser->update();
        // dd($advertiser);


        $advertiserReportColumn = new AdvertiserReportColumn;
        $advertiserReportColumn->advertiser_id = $adv->id;
        $advertiserReportColumn->date = $request->dateColValue;
        $advertiserReportColumn->feed = $request->feedColValue;
        $advertiserReportColumn->subid = $request->subidColValue;
        $advertiserReportColumn->country = $request->countryColValue;
        $advertiserReportColumn->total_searches = $request->totalSearchesColValue;
        $advertiserReportColumn->monitized_searches = $request->monitizedSearchesColValue;
        $advertiserReportColumn->paid_clicks = $request->paidClicksColValue;
        $advertiserReportColumn->revenue = $request->revenueColValue;
        $advertiserReportColumn->save();

        $advertiserReportType = new AdvertiserReportType();
        $advertiserReportType->advertiser_id = $adv->id;
        $advertiserReportType->report_type = $request->reportType;
        $advertiserReportType->api_key = $request->apiKey;
        $advertiserReportType->dashboard_path = $request->dashboardPath;
        $advertiserReportType->email = $request->email;
        $advertiserReportType->password = $request->password;
        $advertiserReportType->gdriveEmail = $request->gdriveEmail;
        $advertiserReportType->gdrivePassword = $request->gdrivePassword;
        $advertiserReportType->save();
        return redirect()->route('advertiser.index')->with('success', 'Advertiser Form Data Has Been Inserted Successfuly:');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function view(Advertiser $advertiser)
    {
        $countries = Country::all();
        $banks = Bank::all();
        $teamMembers = TeamMember::all();
        $selectedteam = $advertiser->team_member_id;
        $teamMemberIds = $teamMembers->pluck('id')->toArray();
        $assignedAdvertisers = Advertiser::whereIn('team_member_id', $teamMemberIds)
            ->whereNotIn('team_member_id', [$selectedteam])
            ->get();
        $assignedTeamMemberIds = $assignedAdvertisers->pluck('team_member_id')->toArray();
        $availableTeamMembers = TeamMember::whereNotIn('id', $assignedTeamMemberIds)->get();
        $selectedcountry = $advertiser->country_id;
        $selectedcountrycode=$advertiser->country_code;
        // dd($selectedteam,$availableTeamMembers);
        return view('advertiser.edit', compact('advertiser','selectedcountrycode','selectedcountry','availableTeamMembers', 'countries', 'banks','selectedteam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertiser $advertiser)
    {
        $countries = Country::all();
        $banks = Bank::all();
        $selectedteam = $advertiser->team_member_id;
        $selectedcountry = $advertiser->country_id;
        $selectedcountrycode=$advertiser->country_code;
        return view('advertiser.edit', compact('advertiser','selectedcountrycode','selectedcountry', 'countries', 'banks','selectedteam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Advertiser $advertiser)
    // {

    //     $validatedData = $request->validate([
    //         'dbaId' => 'required',

    //     ]);

    //     $advertiser->dbaId = $request->dbaId;
    //     $advertiser->companyName = $request->companyName;
    //     $advertiser->regId = $request->regId;
    //     $advertiser->vat = $request->vat;
    //     $advertiser->url = $request->url;
    //     $advertiser->accEmail = $request->accEmail;
    //     $advertiser->password = $request->password;
    //     $advertiser->billEmail = $request->billEmail;
    //     $advertiser->reportEmail = $request->form_reportEmail;
    //     $advertiser->address1 = $request->address1;
    //     $advertiser->address2 = $request->address2;
    //     $advertiser->city_id = $request->city_id;
    //     $advertiser->state_id = $request->state_id;
    //     if ($request->has('country_id') && $request->input('country_id') !== $advertiser->country_id) {
    //         $advertiser->country_id = $request->country_id;
    //     }
        
    //     $advertiser->country_id = $request->country_id;
    //     $advertiser->zipCode = $request->zipCode;
    //     $advertiser->amFirstName = $request->amFirstName;
    //     $advertiser->amLastName = $request->amLastName;
    //     $advertiser->amEmail = $request->amEmail;
    //     $advertiser->amPhone = $request->amPhone;
    //     $advertiser->amSkype = $request->amSkype;
    //     $advertiser->amLinkedIn = $request->amLinkedIn;

    //     //old data
    //     $oldIos = $advertiser->agreementDoc;
    //     $oldDocuments = $advertiser->document;
    //     $Ios = [];
    //     if ($request->hasFile('ios')) {
    //         $i = 1; // initialize a counter for io files
    //         foreach ($request->file('ios') as $io) {
    //             $ioName = $io->getClientOriginalName();
    //             $dbaId = $request->dbaId;
    //             $agreementDoc = "io" . $i . "." . $io->getClientOriginalExtension(); 
    //             // $agreementDoc = $dbaId . "-" . time() . "-io" . $i . "." . $io->getClientOriginalExtension();
    //             $io->move(public_path('assets/files/uploads/ios/' . $dbaId . ''), $agreementDoc);
    //             $Ios[] = $agreementDoc;
    //             $i++; // increment the io counter
    //         }
    //     } else {
    //         $agreementDoc = "Not Delivered";
    //     }
    //     $Documents = [];
    //     if ($request->hasFile('documents')) {
    //         $j = 1; // initialize a counter for document files
    //         foreach ($request->file('documents') as $document) {
    //             $documentName = $document->getClientOriginalName();
    //             $dbaId = $request->dbaId;
    //             $documentFile = "doc" . $j . "." . $document->getClientOriginalExtension(); 
    //             $document->move(public_path('assets/files/uploads/document/' . $dbaId . ''), $documentFile);
    //             $Documents[] = $documentFile;
    //             $j++; // increment the document counter
    //         }
    //     } else {
    //         $document = "Not Delivered";
    //     }
    //     $advertiser->agreementDoc = implode(',', array_merge(explode(',', $oldIos), $Ios));
    //     $advertiser->document = implode(',', array_merge(explode(',', $oldDocuments), $Documents));
    //     // $advertiser->agreementDoc = implode(',', $Ios);
    //     $advertiser->revSharePer = $request->revSharePer;
    //     if ($request->filled('paymentTerms')) {
    //         $advertiser->paymentTerms = $request->paymentTerms;
    //     }
    //     $advertiser->payoneer = $request->payoneer;
    //     $advertiser->paypal = $request->paypal;
    //     // $advertiser->document = implode(',', $Documents);
    //     $advertiser->notes = $request->notes;
    //     $advertiser->agreement_start_date = $request->AgreementStartDate;

    //     // dd($advertiser);
    //     $advertiser->update();
    //     $advertiserId = $advertiser->id;
    //     $bankDetails = AdvertiserBankDetail::where('advertiser_id', $advertiserId)->firstOrFail();
    //     $bankDetails->beneficiary_name = $request->beneficiaryName;
    //     $bankDetails->beneficiary_address = $request->beneficiaryAddress;
    //     $bankDetails->bank_name = $request->bankName;
    //     $bankDetails->bank_address = $request->bankAddress;
    //     $bankDetails->account_number = $request->accountNumber;
    //     $bankDetails->routing_number = $request->routingNumber;
    //     $bankDetails->iban = $request->iban;
    //     $bankDetails->swift = $request->swift;
    //     $bankDetails->currency = $request->currency;
    //     $bankDetails->update();


    //     //updating bank id
    //     $lastId = $bankDetails->id;
    //     $advertiser =Advertiser::where('id', $advertiser->id)->first();
    //     $advertiser->bank_id = $lastId;

    //     $advertiser->update();
    //     // dd($advertiser);
    //     // if ($request->filled('email')) {
    //     //     $user->email = $request->input('email');
    //     // }
    //     $advertiserReportColumn = AdvertiserReportColumn::where('advertiser_id', $advertiserId)->firstOrFail();
    //     $advertiserReportColumn = new AdvertiserReportColumn;
    //     $advertiserReportColumn->advertiser_id = $advertiser->id;
    //     $advertiserReportColumn->date = $request->dateColValue;
    //     $advertiserReportColumn->feed = $request->feedColValue;
    //     $advertiserReportColumn->subid = $request->subidColValue;
    //     $advertiserReportColumn->country = $request->countryColValue;
    //     $advertiserReportColumn->total_searches = $request->totalSearchesColValue;
    //     $advertiserReportColumn->monitized_searches = $request->monitizedSearchesColValue;
    //     $advertiserReportColumn->paid_clicks = $request->paidClicksColValue;
    //     $advertiserReportColumn->revenue = $request->revenueColValue;
    //     $advertiserReportColumn->update();

    //     $advertiserReportType = AdvertiserReportType::where('advertiser_id', $advertiserId)->firstOrFail();
    //     $advertiserReportType->advertiser_id = $advertiser->id;
    //     $advertiserReportType->report_type = $request->reportType;
    //     $advertiserReportType->api_key = $request->apiKey;
    //     $advertiserReportType->dashboard_path = $request->dashboardPath;
    //     $advertiserReportType->email = $request->email;
    //     $advertiserReportType->password = $request->password;
    //     $advertiserReportType->gdriveEmail = $request->gdriveEmail;
    //     $advertiserReportType->gdrivePassword = $request->gdrivePassword;
    //     $advertiserReportType->update();


    //     return redirect()->route('advertiser.view',compact('advertiser'))->with('success', 'Advertiser Form Data Has Been Updated Successfuly:');
    // }

    public function storeAccountInfo(Request $request){
        $validatedData = $request->validate([
            'dbaId' => 'required',
            'companyName'  => 'required',
            'url' => 'required',
            'accEmail' => 'required',
            'password' => 'required',
            'address1' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            
        ]);
        $advertiser = new Advertiser;
        $advertiser->dbaId = $request->dbaId;
        $advertiser->companyName = $request->companyName;
        $advertiser->regId = $request->regId;
        $advertiser->vat = $request->vat;
        $advertiser->url = $request->url;
        $advertiser->accEmail = $request->accEmail;
        $advertiser->password = $request->password;
        $advertiser->address1 = $request->address1;
        $advertiser->address2 = $request->address2;
        $advertiser->city_id = $request->city_id;
        $advertiser->state_id = $request->state_id;
        if ($request->has('country_id') && $request->input('country_id') !== $advertiser->country_id) {
            $advertiser->country_id = $request->country_id;
        }
        $advertiser->zipCode = $request->zipCode;
        $oldIos = $advertiser->agreementDoc;
        $oldDocuments = $advertiser->document;
        
        $names = $advertiser->agreementDoc;
        $nameArray = explode(",", $names);
        $iosCount = count($nameArray);
        $docnames = $advertiser->document;
        $docnameArray = explode(",", $docnames);
        $doccount = count($docnameArray);
        // dd($ioscount,$doccount);
        $iosCount += 1;;
        $doccount += 1;
        // dd($iosCount,$doccount);
        $Ios = [];
        if ($request->hasFile('ios')) {
            $i = $iosCount; // initialize a counter for io files
            foreach ($request->file('ios') as $io) {
                $ioName = $io->getClientOriginalName();
                $dbaId = $request->dbaId;
                $agreementDoc = "io" . $i . "." . $io->getClientOriginalExtension(); 
                // $agreementDoc = $dbaId . "-" . time() . "-io" . $i . "." . $io->getClientOriginalExtension();
                $io->move(public_path('assets/files/uploads/ios/' . $dbaId . ''), $agreementDoc);
                $Ios[] = $agreementDoc;
                $i++; // increment the io counter
            }
        } else {
            $agreementDoc = "Not Delivered";
        }
        
        $Documents = [];
        if ($request->hasFile('documents')) {
            $j = $doccount; // initialize a counter for document files
            foreach ($request->file('documents') as $document) {
                $documentName = $document->getClientOriginalName();
                $dbaId = $request->dbaId;
                $documentFile = "doc" . $j . "." . $document->getClientOriginalExtension(); 
                $document->move(public_path('assets/files/uploads/document/' . $dbaId . ''), $documentFile);
                $Documents[] = $documentFile;
                $j++; // increment the document counter
            }
        } else {
            $document = "Not Delivered";
        }
        $advertiser->agreementDoc = implode(',', array_merge(explode(',', $oldIos), $Ios));
        $advertiser->document = implode(',', array_merge(explode(',', $oldDocuments), $Documents));
        $advertiser->save();
        return redirect()->route('advertiser.create',compact('advertiser'));
    }
    public function storeContactInfo(Request $request, Advertiser $advertiser){
        $validatedData = $request->validate([
        'amFirstName' => 'required',
            'amLastName' => 'required',
            'amEmail' => 'required',
        ]);
        $advertiser->amFirstName = $request->amFirstName;
        $advertiser->amLastName = $request->amLastName;
        $advertiser->amEmail = $request->amEmail;
        $advertiser->amPhone = $request->amPhone;
        $advertiser->amSkype = $request->amSkype;
        $advertiser->amLinkedIn = $request->amLinkedIn;
        $advertiser->country_code = $request->country_code;
        $advertiser->update();
        return redirect()->route('advertiser.create',compact('advertiser'));
    }
    public function storeOperationInfo(Request $request, Advertiser $advertiser){
        $validatedData = $request->validate([
            'revSharePer' => 'required',
            'paymentTerms' => 'required',
            'form_reportEmail' => 'required',
            ]);
        $advertiser->revSharePer = $request->revSharePer;
        if ($request->filled('paymentTerms')) {
            $advertiser->paymentTerms = $request->paymentTerms;
        }
        $advertiserId = $advertiser->id;
        $advertiser->reportEmail = $request->form_reportEmail;
        $advertiser->update();
        $advertiserReportColumn = new AdvertiserReportColumn;
        $advertiserReportColumn->advertiser_id = $advertiser->id;
        $advertiserReportColumn->date = $request->dateColValue;
        $advertiserReportColumn->feed = $request->feedColValue;
        $advertiserReportColumn->subid = $request->subidColValue;
        $advertiserReportColumn->country = $request->countryColValue;
        $advertiserReportColumn->total_searches = $request->totalSearchesColValue;
        $advertiserReportColumn->monitized_searches = $request->monitizedSearchesColValue;
        $advertiserReportColumn->paid_clicks = $request->paidClicksColValue;
        $advertiserReportColumn->revenue = $request->revenueColValue;
        $advertiserReportColumn->save();
        

        $advertiserReportType = new AdvertiserReportType();
        $advertiserReportType->advertiser_id = $advertiser->id;
        $advertiserReportType->report_type = $request->reportType;
        $advertiserReportType->api_key = $request->apiKey;
        $advertiserReportType->dashboard_path = $request->dashboardPath;
        $advertiserReportType->email = $request->email;
        $advertiserReportType->password = $request->password;
        $advertiserReportType->gdriveEmail = $request->gdriveEmail;
        $advertiserReportType->gdrivePassword = $request->gdrivePassword;
        $advertiserReportType->save();
        
        
        return redirect()->route('advertiser.view',compact('advertiser'));
    }
    public function storeFinanceInfo(Request $request, Advertiser $advertiser){
        $advertiser->billEmail = $request->billEmail;
        $advertiser->payoneer = $request->payoneer;
        $advertiser->paypal = $request->paypal;
        $advertiser->update();
        $advertiserId = $advertiser->id;
        $bankDetails = new AdvertiserBankDetail;
        $bankDetails->advertiser_id = $advertiserId->id;
        $bankDetails->beneficiary_name = $request->beneficiaryName;
        $bankDetails->beneficiary_address = $request->beneficiaryAddress;
        $bankDetails->bank_name = $request->bankName;
        $bankDetails->bank_address = $request->bankAddress;
        $bankDetails->account_number = $request->accountNumber;
        $bankDetails->routing_number = $request->routingNumber;
        $bankDetails->iban = $request->iban;
        $bankDetails->swift = $request->swift;
        $bankDetails->currency = $request->currency;
        $bankDetails->save();
                return redirect()->route('advertiser.create',compact('advertiser'));
    }

    public function updateAccountInfo(Request $request, Advertiser $advertiser){
        $advertiser->dbaId = $request->dbaId;
        $advertiser->companyName = $request->companyName;
        $advertiser->regId = $request->regId;
        $advertiser->vat = $request->vat;
        $advertiser->url = $request->url;
        $advertiser->accEmail = $request->accEmail;
        $advertiser->password = $request->password;
        $advertiser->address1 = $request->address1;
        $advertiser->address2 = $request->address2;
        $advertiser->city_id = $request->city_id;
        $advertiser->state_id = $request->state_id;
        if ($request->has('country_id') && $request->input('country_id') !== $advertiser->country_id) {
            $advertiser->country_id = $request->country_id;
        }
        $advertiser->zipCode = $request->zipCode;
        $oldIos = $advertiser->agreementDoc;
        $oldDocuments = $advertiser->document;
        
        $names = $advertiser->agreementDoc;
        $nameArray = explode(",", $names);
        $iosCount = count($nameArray);
        $docnames = $advertiser->document;
        $docnameArray = explode(",", $docnames);
        $doccount = count($docnameArray);
        // dd($ioscount,$doccount);
        $iosCount += 1;;
        $doccount += 1;
        // dd($iosCount,$doccount);
        $Ios = [];
        if ($request->hasFile('ios')) {
            $i = $iosCount; // initialize a counter for io files
            foreach ($request->file('ios') as $io) {
                $ioName = $io->getClientOriginalName();
                $dbaId = $request->dbaId;
                $agreementDoc = "io" . $i . "." . $io->getClientOriginalExtension(); 
                // $agreementDoc = $dbaId . "-" . time() . "-io" . $i . "." . $io->getClientOriginalExtension();
                $io->move(public_path('assets/files/uploads/ios/' . $dbaId . ''), $agreementDoc);
                $Ios[] = $agreementDoc;
                $i++; // increment the io counter
            }
        } else {
            $agreementDoc = "Not Delivered";
        }
        
        $Documents = [];
        if ($request->hasFile('documents')) {
            $j = $doccount; // initialize a counter for document files
            foreach ($request->file('documents') as $document) {
                $documentName = $document->getClientOriginalName();
                $dbaId = $request->dbaId;
                $documentFile = "doc" . $j . "." . $document->getClientOriginalExtension(); 
                $document->move(public_path('assets/files/uploads/document/' . $dbaId . ''), $documentFile);
                $Documents[] = $documentFile;
                $j++; // increment the document counter
            }
        } else {
            $document = "Not Delivered";
        }
        $advertiser->agreementDoc = implode(',', array_merge(explode(',', $oldIos), $Ios));
        $advertiser->document = implode(',', array_merge(explode(',', $oldDocuments), $Documents));
        $advertiser->update();
        return redirect()->route('advertiser.view',compact('advertiser'))->with('success', 'Advertiser Account Info Has Been Updated Successfuly:');
    }
    public function updateContactInfo(Request $request, Advertiser $advertiser){
        $advertiser->amFirstName = $request->amFirstName;
        $advertiser->amLastName = $request->amLastName;
        $advertiser->amEmail = $request->amEmail;
        $advertiser->amPhone = $request->amPhone;
        $advertiser->amSkype = $request->amSkype;
        $advertiser->amLinkedIn = $request->amLinkedIn;
        $advertiser->country_code = $request->country_code;
        $advertiser->update();
        return redirect()->route('advertiser.view',compact('advertiser'))->with('success', 'Advertiser Contact Info Has Been Updated Successfuly:');
    }
    public function updateOperationInfo(Request $request, Advertiser $advertiser){
        $advertiser->revSharePer = $request->revSharePer;
        if ($request->filled('paymentTerms')) {
            $advertiser->paymentTerms = $request->paymentTerms;
        }
        $advertiserId = $advertiser->id;
        $advertiser->reportEmail = $request->form_reportEmail;
        
        $advertiserReportColumn = AdvertiserReportColumn::where('advertiser_id', $advertiserId)->firstOrFail();
        $advertiserReportColumn->advertiser_id = $advertiser->id;
        $advertiserReportColumn->date = $request->dateColValue;
        $advertiserReportColumn->feed = $request->feedColValue;
        $advertiserReportColumn->subid = $request->subidColValue;
        $advertiserReportColumn->country = $request->countryColValue;
        $advertiserReportColumn->total_searches = $request->totalSearchesColValue;
        $advertiserReportColumn->monitized_searches = $request->monitizedSearchesColValue;
        $advertiserReportColumn->paid_clicks = $request->paidClicksColValue;
        $advertiserReportColumn->revenue = $request->revenueColValue;
        

        $advertiserReportType = AdvertiserReportType::where('advertiser_id', $advertiserId)->firstOrFail();
        $advertiserReportType->advertiser_id = $advertiser->id;
        $advertiserReportType->report_type = $request->reportType;
        $advertiserReportType->api_key = $request->apiKey;
        $advertiserReportType->dashboard_path = $request->dashboardPath;
        $advertiserReportType->email = $request->reportEmail;
        $advertiserReportType->password = $request->reportPassword;
        $advertiserReportType->gdriveEmail = $request->gdriveEmail;
        $advertiserReportType->gdrivePassword = $request->gdrivePassword;
        $advertiser->update();
        $advertiserReportColumn->update();
        $advertiserReportType->update();
        return redirect()->route('advertiser.view',compact('advertiser'))->with('success', 'Advertiser Operation Info Has Been Updated Successfuly:');
    }
    public function updateFinanceInfo(Request $request, Advertiser $advertiser){
        $advertiser->billEmail = $request->billEmail;
        $advertiser->payoneer = $request->payoneer;
        $advertiser->paypal = $request->paypal;
        // $advertiser->update();
        $advertiserId = $advertiser->id;
        $bankDetails = AdvertiserBankDetail::where('advertiser_id', $advertiserId)->firstOrFail();
        $bankDetails->beneficiary_name = $request->beneficiaryName;
        $bankDetails->beneficiary_address = $request->beneficiaryAddress;
        $bankDetails->bank_name = $request->bankName;
        $bankDetails->bank_address = $request->bankAddress;
        $bankDetails->account_number = $request->accountNumber;
        $bankDetails->routing_number = $request->routingNumber;
        $bankDetails->iban = $request->iban;
        $bankDetails->swift = $request->swift;
        $bankDetails->currency = $request->currency;
        // dd($bankDetails);
        // dd($request->beneficiaryName);
        $advertiser->update();
        $bankDetails->update();
                return redirect()->route('advertiser.view',compact('advertiser'))->with('success', 'Advertiser Finance Info Has Been Updated Successfuly:');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertiser $advertiser)
    {
        $advertiser->delete();

        return redirect()->route('advertiser.index');
    }

    public function checkUniqueDbId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:advertisers,dbaId',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The value is not unique.']);
        }

        return response()->json(['status' => 'success']);
    }

    public function checkUniqueaccEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_field' => 'unique:advertisers,accEmail',
        ]);
        // $validator = Validator::make($request->all(), [
            //     'input_field' => [
            //         'email',
            //         Rule::unique('advertisers', 'accEmail')->ignore(Auth::id())
            //     ]
            // ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'The email is already used.']);
        }

        return response()->json(['status' => 'success']);
    }
    public function advertiserBankDetails(Request $request)
    {
        try {
            $bankDetails = new AdvertiserBankDetail;
            $bankDetails->advertiser_id = null;
            $bankDetails->beneficiary_name = $request->beneficiaryName;
            $bankDetails->beneficiary_address = $request->beneficiaryAddress;
            $bankDetails->bank_name = $request->bankName;
            $bankDetails->bank_address = $request->bankAddress;
            $bankDetails->account_number = $request->accountNumber;
            $bankDetails->routing_number = $request->routingNumber;
            $bankDetails->iban = $request->iban;
            $bankDetails->swift = $request->swift;
            $bankDetails->currency = $request->currency;
            
            $bankDetails->save();
            // dd($bankDetails);
            $bankId =$bankDetails->id;
            $succeed = !is_null($bankId);
            return response()->json(['succeed' => $succeed,'id'=>$bankId]);

        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return response()->json(['succeed' => 'false']);
        }
       
    }
    public function advertiserReportColumns(Request $request)
    {
        try {
            $advertiserReportColumn = new AdvertiserReportColumn;
            $advertiserReportColumn->advertiser_id = null;
            $advertiserReportColumn->date = $request->dateColValue;
            $advertiserReportColumn->feed = $request->feedColValue;
            $advertiserReportColumn->subid = $request->subidColValue;
            $advertiserReportColumn->country = $request->countryColValue;
            $advertiserReportColumn->total_searches = $request->totalSearchesColValue;
            $advertiserReportColumn->monitized_searches = $request->monitizedSearchesColValue;
            $advertiserReportColumn->paid_clicks = $request->paidClicksColValue;
            $advertiserReportColumn->revenue = $request->revenueColValue;
            $advertiserReportColumn->save();
            // dd($bankDetails);
            $reportColumnId =$advertiserReportColumn->id;
            $succeed = !is_null($reportColumnId);
            return response()->json(['succeed' => $succeed,'id'=>$reportColumnId]);

        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return response()->json(['succeed' => 'false']);
        }
       
    }

    public function advertiserReportType(Request $request)
    {
        try {
            $advertiserReportType = new AdvertiserReportType();
            $advertiserReportType->advertiser_id = null;
            $advertiserReportType->report_type = $request->reportType;
            $advertiserReportType->api_key = $request->apiKey;
            $advertiserReportType->dashboard_path = $request->dashboardPath;
            $advertiserReportType->email = $request->email;
            $advertiserReportType->password = $request->password;
            $advertiserReportType->gdriveEmail = $request->gdriveEmail;
            $advertiserReportType->gdrivePassword = $request->gdrivePassword;
            $advertiserReportType->save();
            $reportTypeId =$advertiserReportType->id;
            $succeed = !is_null($reportTypeId);
            return response()->json(['succeed' => $succeed,'id'=>$reportTypeId]);

        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return response()->json(['succeed' => 'false']);
        }
       
    }

    public function DownloadPdf(Request $request, $id, $pdf, $name)
    {
        $advertiser = Advertiser::where('id', $id)->first();
        $document = $advertiser->document;
        $dbaId = $advertiser->dbaId;
        if($pdf=='document'){
            $filePath = public_path('assets/files/uploads/document/' . $dbaId . '/' . $name);
        }else{
            $filePath = public_path('assets/files/uploads/ios/' . $dbaId . '/' . $name);
        }
        // dd($filePath);
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    public function accountInfo(Request $request,Advertiser $advertiser , $currentedit){
        // dd($currentedit);
        $countries = Country::all();
        $banks = Bank::all();
        $teamMembers = TeamMember::all();
        $selectedteam = $advertiser->team_member_id;
        $teamMemberIds = $teamMembers->pluck('id')->toArray();
        $assignedAdvertisers = Advertiser::whereIn('team_member_id', $teamMemberIds)
            ->whereNotIn('team_member_id', [$selectedteam])
            ->get();
        $assignedTeamMemberIds = $assignedAdvertisers->pluck('team_member_id')->toArray();
        $availableTeamMembers = TeamMember::whereNotIn('id', $assignedTeamMemberIds)->get();
        $selectedcountry = $advertiser->country_id;
        $selectedcountrycode=$advertiser->country_code;
        return view('advertiser.edit', compact('advertiser','selectedcountry','selectedcountrycode','availableTeamMembers', 'countries', 'banks'));
    }
   
}
