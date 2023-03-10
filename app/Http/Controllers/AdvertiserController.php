<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Advertiser;
use App\Country;
use App\State;
use App\City;
use App\Bank;

class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisers = Advertiser::paginate(10);
        return view('advertiser.index', compact('advertisers'));

//        return view('forms.validation');
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

        return view('crm.advertiser.create', compact('countries', 'states', 'cities', 'banks'));

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
            'dbaId' => 'required',
          ]);

          $adv = new Advertiser;

          $adv->dbaId = $request->dbaId;
          $adv->companyName = $request->companyName;
          $adv->regId = $request->regId;
          $adv->vat = $request->vat;
          $adv->url = $request->url;
          $adv->accEmail = $request->accEmail;
          $adv->password = $request->password;
          $adv->billEmail = $request->billEmail;
          $adv->reportEmail = $request->reportEmail;
          $adv->address1 = $request->address1;
          $adv->address2 = $request->address2;
          $adv->city_id = $request->city_id;
          $adv->state_id = $request->state_id;
          $adv->country_id = $request->country_id;
          $adv->zipCode = $request->zipCode;
          $adv->amFirstName = $request->amFirstName;
          $adv->amLastName = $request->amLastName;
          $adv->amEmail = $request->amEmail;
          $adv->amPhone = $request->amPhone;
          $adv->amSkype = $request->amSkype;
          $adv->amLinkedIn = $request->amLinkedIn;
          $adv->agreementDoc = $request->agreementDoc;
          $adv->revSharePer = $request->revSharePer;
          $adv->paymentTerms = $request->paymentTerms;
          $adv->bank_id = $request->bank;
          $adv->payoneer = $request->payoneer;
          $adv->paypal = $request->paypal;
          $adv->document = $request->document;
          $adv->notes = $request->notes;
          $adv->agreement_start_date = $request->AgreementStartDate;

          

          $adv->save();

          return redirect()->back()->with('success', 'Advertiser Form Data Has Been Inserted Successfuly:');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(Advertiser $advertiser)
    {
        //
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
        return view('crm.advertiser.edit', compact('advertiser','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertiser $advertiser)
    {
        $validatedData = $request->validate([
            'dbaId' => 'required',

        ]);

        $advertiser->dbaId = $request->dbaId;
        $advertiser->companyName = $request->companyName;
        $advertiser->regId = $request->regId;
        $advertiser->vat = $request->vat;
        $advertiser->url = $request->url;
        $advertiser->accEmail = $request->accEmail;
        $advertiser->password = $request->password;
        $advertiser->billEmail = $request->billEmail;
        $advertiser->reportEmail = $request->reportEmail;
        $advertiser->address1 = $request->address1;
        $advertiser->address2 = $request->address2;
        $advertiser->city_id = $request->city_id;
        $advertiser->state_id = $request->state_id;
        $advertiser->country_id = $request->country_id;
        $advertiser->zipCode = $request->zipCode;
        $advertiser->amFirstName = $request->amFirstName;
        $advertiser->amLastName = $request->amLastName;
        $advertiser->amEmail = $request->amEmail;
        $advertiser->amPhone = $request->amPhone;
        $advertiser->amSkype = $request->amSkype;
        $advertiser->amLinkedIn = $request->amLinkedIn;
        $advertiser->agreementDoc = $request->agreementDoc;
        $advertiser->revSharePer = $request->revSharePer;
        $advertiser->paymentTerms = $request->paymentTerms;
        $advertiser->bank_id = $request->bank;
        $advertiser->payoneer = $request->payoneer;
        $advertiser->paypal = $request->paypal;
        $advertiser->document = $request->document;
        $advertiser->notes = $request->notes;
        $advertiser->agreement_start_date = $request->AgreementStartDate;

        $advertiser->update();

        return redirect()->back()->with('success', 'Advertiser Form Data Has Been Updated Successfuly:');

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


}

