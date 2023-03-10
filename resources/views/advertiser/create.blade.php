@extends('layouts.app')

@section('title', 'Advertiser Profile')

@section('content')
    <div class="container mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <!-- Check the following errors :( -->
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('advertiser.store') }}">
        @csrf
        @method('POST')
        <h1>Advertiser Profile</h1>
        <div class="container mt-4">

            <div class="row">
                <div class="col-sm-3"><input type="text" name="dbaId" placeholder="Wrtite DBA">
                    @if($errors->has('dbaId'))
                        <div class="error" style="color: red;">{{ $errors->first('dbaId') }}</div>
                    @endif</div>

                <div class="col-sm-3"><input type="text" name="companyName" placeholder="Company / Legal Name"></div>
                <div class="col-sm-3"><input type="text" name="regId" placeholder="Registration / National ID"></div>
                <div class="col-sm-3"><input type="date" name="startDate" style="width: 200px;"></div>

            </div>


            <div class="row" style="margin-top: 8px;">

                <div class="col-sm-3"><input type="text" name="vat" placeholder="VAT"></div>
                <div class="col-sm-3"><input type="text" name="url" placeholder="Website"></div>
                <div class="col-sm-3"><input type="text" name="accEmail" placeholder="Account Email">
                    @if($errors->has('accEmail'))
                        <div class="error">{{ $errors->first('accEmail') }}</div>
                    @endif
                </div>

                <div class="col-sm-3"><input type="text" name="password" placeholder="Password"></div>

            </div>

            <div class="row" style="margin-top: 8px;">

                <div class="col-sm-3"><input type="text" name="billEmail" placeholder="Billing/Finance email"></div>
                <div class="col-sm-3"><input type="text" name="reportEmail" placeholder="Reporting Email"></div>
                <div class="col-sm-3"><textarea type="text" rows="2" cols="100" name="address1" class="form-control"
                                                id="address1" style="resize:none"
                                                placeholder="Address1 in multiple lines...."></textarea></div>
                <div class="col-sm-3"><textarea type="text" rows="2" cols="100" name="address2" class="form-control"
                                                id="address1" style="resize:none"
                                                placeholder="Address2 in multiple lines...."></textarea></div>
                <div>

                    <div class="row" style="margin-top: 8px;">

                        <div class="col-sm-3"><select name="country" style="width: 200px;">
                                @foreach ($countries as $key => $country)
                                    <option value="{{ $country->id }}">{{ $country->title }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-sm-3"><select name="state" style="width: 200px;">
                                @foreach ($states as $key => $state)
                                    <option value="{{ $state->id }}">{{ $state->title }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-sm-3"><select name="city" style="width: 200px;">
                                @foreach ($cities as $key => $city)
                                    <option value="{{ $city->id }}">{{ $city->title }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-sm-3"><input type="text" name="zipCode" placeholder="Zip / Postal Code"></div>

                    </div>

                    <div class="row" style="margin-top: 8px;">

                        <h6>Account Manager Contact Info:</h6>
                        <div class="col-sm-3"><input type="text" name="amFirstName" placeholder="AM first name"></div>
                        <div class="col-sm-3"><input type="text" name="amLastName" placeholder="AM last name"></div>
                        <div class="col-sm-3"><input type="text" name="amEmail" placeholder="AM email"></div>
                        <div class="col-sm-3"><input type="text" name="amPhone" placeholder="AM phone"></div>
                        <div>

                            <div class="row" style="margin-top: 8px;">

                                <div class="col-sm-3"><input type="text" name="amSkype" placeholder="AM skype"></div>
                                <div class="col-sm-3"><input type="text" name="amLinkedIn" placeholder="AM linkedin">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 8px;">

                                <h6>Payment Methods:</h6>
                                <div class="col-sm-3"><select name="bank" style="width: 200px;">
                                        @foreach ($banks as $key => $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->title }}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col-sm-3"><input type="text" name="payoneer" placeholder="Payoneer"></div>
                                <div class="col-sm-3"><input type="text" name="paypal" placeholder="Paypal"></div>

                                <h5>Document Download:</h5>
                                <div class="col-sm-3"><input type="text" name="document"
                                                             placeholder="Documents (file name, file format - pdf or jpg, max file size-5mb)">
                                </div>
                                <div class="col-sm-3"><input type="text" name="notes" placeholder="Write notes here...">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 8px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection







