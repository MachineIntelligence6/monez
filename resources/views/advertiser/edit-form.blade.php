@section('css')
    <link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<form class="needs-validation" method="POST" action="{{ route('advertiser.updateAccountInfo', [$advertiser->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-category">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase">
                <i class="mdi mdi-office-building mr-2"></i>
                Account Info
            </h5>
            @if($lastSegment!='accountinfo')
                <a href="{{ route('advertiser.currentedit', ['advertiser'=>$advertiser->id ,'currentedit' => 'accountinfo']) }}" class="edit-category-btn btn btn-secondary">
                    <span class="fas fa-edit mr-1"></span>
                    Edit Info
                </a>
            @else
                <button type="submit" class=" save-category-btn btn btn-primary">
                    <span class="fas fa-check mr-1"></span>
                    Save Info
                </button>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="dbaId" class="form-label">Advertiser ID</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' || $lastSegment!='create' ) disabled @endif class="form-control" id="dbaId" name="dbaId" placeholder="Enter Advertiser ID" value="{{ $advertiser->dbaId ??  old('dbaId') }}" />
                    <div class="valid-feedback">Valid.</div>
                    <div id="dba-invalid" class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="companyName" class="form-label">Company / Legal Name</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="companyName" name="companyName" placeholder="Enter Company / Legal Name" value="{{ $advertiser->companyName ??  old('companyName') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="regId" class="form-label">Registration / National ID</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="regId" name="regId" placeholder="Enter Registration / National ID" value="{{ $advertiser->regId ??  old('regId') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="vat" class="form-label">VAT ID</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="vat" name="vat" placeholder="Enter VAT" value="{{ $advertiser->vat ??  old('vat') }}">
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="url" class="form-label">Website</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="website-url-input" name="url" placeholder="Enter website url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ $advertiser->url ??  old('website-url-input') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="accEmail" class="form-label">Account Email</label><label class="text-danger">*</label>
                    <input type="email" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="accEmail" oninput="confirmEmail()" name="accEmail" placeholder="Enter account email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $advertiser->accEmail ??  old('accEmail') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div id="accEmail-invalid" class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="confemail" class="form-label">Confirm Email</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" name="" placeholder="Enter confirm account email" id="confemail" data-autovalidate="false" oninput="confirmEmail()" value="{{ $advertiser->accEmail ??  old('accEmail') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Email and confirm email should be same.</div>
                </div>
            </div>

            <script>
                function confirmEmail() {
                    var email = document.getElementById("accEmail").value
                    var confemail = document.getElementById("confemail").value
                    $(confemail).removeClass('is-valid is-invalid')
                        .addClass(confemail.checkValidity() ? 'is-valid' : 'is-invalid');
                }
            </script>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                    <div class="input-group input-group-merge">
                        <input type="password" @if($lastSegment!='accountinfo' ) disabled @endif id="password-input-field" class="form-control" value="{{ $advertiser->password ??  old('password') }}" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                        <div class="input-group-append" data-password="false">
                            <div class="input-group-text btn">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                        <div class="pl-2">
                            <button type="button" @if($lastSegment!='accountinfo' ) disabled @endif class="btn btn-secondary can-be-disabled" onclick="generateRandomPassword(this)">Regenerate</button>
                        </div>
                    </div>

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        Your password must contain least 8 characters, at least one number and one uppercase and lowercase
                        letter.
                    </div>


                </div>
            </div> <!-- end col -->

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">Address</label><label class="text-danger">*</label>
                    <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="address1" name="address1" placeholder="Enter address line 1" value="{{ $advertiser->address1 ??  old('address1') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">Address 2</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="address2" name="address2" placeholder="Enter address line 2" value="{{ $advertiser->address2 ??  old('address2') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">City</label><label class="text-danger">*</label>
                    <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="city" name="city_id" placeholder="Enter city" value="{{ $advertiser->city_id ??  old('city_id') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">State / Province</label>
                    <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="state_id" name="state_id" placeholder="Enter state / province" value="{{ $advertiser->state_id ??  old('state_id') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">Zip Code</label>
                    <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="zipCode" name="zipCode" placeholder="Enter zip / code" value="{{ $advertiser->zipCode ??  old('zipCode') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <label for="country" class="form-label">Country{{$selectedcountry}}</label><label class="text-danger">*</label>
                <select class="form-control" name="country_id" @if($lastSegment!='accountinfo' ) disabled @endif id="country-dropdown" onchange="setCountryCodeToPhone(this.options[this.selectedIndex].getAttribute('phone-code'))" data-toggle="select2">
                    <option>Select Country</option>
                    @foreach ($countries as $key => $country)
                        <option value="{{$country->id}}" @if (isset($selectedcountry) && $country->id == $selectedcountry) selected @endif phone-code="{{$country -> countryCode}}">{{$country->title}}</option>
                    @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div> <!-- end row -->
        @if($lastSegment=='accountinfo')
            <div class="row display-on-edit">
                <div class="col-md-6 h-100">
                    <div class="mb-3">
                        <label for="io" class="form-label">IO</label>
                        <input type="file" name="ios[]" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" /><br>
                    </div>
                </div>
                <div class="col-md-6 h-100">
                    <div class="mb-3">
                        <label for="documents" class="form-label">Documents</label>
                        <input type="file" name="documents[]" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" /><br>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mb-4 display-on-view">
            <div class="col-md-6 mb-3">
                @php
                    $names = $advertiser->agreementDoc;
                    $nameArray = explode(",", $names);
                    $docnames = $advertiser->document;
                    $docnameArray = explode(",", $docnames);
                @endphp
                <div class="h-100 mb-3">
                    <label for="">Uploaded IOs</label>
                    <div class="border h-100 rounded-sm p-2">
                        @foreach ($nameArray as $name)
                            @if ($name)
                                <a href="{{ route('downloadpdf',['id'=>$advertiser->id,'pdf'=> 'agreementDoc','name'=>$name ]) }}">{{$name}}--{{date('d-m-Y', strtotime($advertiser->created_at))}}</a><br><br>
                            @else
                                <!-- <p>PDF not available</p> -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="h-100">
                    <label for="">Uploaded Documents</label>
                    <div class="border h-100 rounded-sm p-2">
                        @foreach ($docnameArray as $docnames)
                            @if ($docnames)
                                <a href="{{ route('downloadpdf', ['id'=>$advertiser->id,'pdf'=> 'document','name'=>$docnames ]) }}">
                                    {{$docnames}}--{{date('d-m-Y', strtotime($advertiser->created_at))}}
                                </a> <br><br> @else
                                <!-- <p>PDF not available</p> -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Personal Info -->
<form class="needs-validation" method="POST" action="{{ route('advertiser.updateContactInfo', [$advertiser->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-category">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-account-circle mr-2"></i> Contact Info (Account Manager)</h5>

            @if($lastSegment!='contactinfo')
                <a href="{{ route('advertiser.currentedit', ['advertiser'=>$advertiser->id ,'currentedit' => 'contactinfo']) }}" class="edit-category-btn btn btn-secondary">
                    <span class="fas fa-edit mr-1"></span>
                    Edit Info
                </a>
            @else
                <button type="submit" class=" save-category-btn btn btn-primary">
                    <span class="fas fa-check mr-1"></span>
                    Save Info
                </button>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amFirstName" class="form-label">First Name</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amFirstName" name="amFirstName" placeholder="Enter first name" value="{{ $advertiser->amFirstName ??  old('amFirstName') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amLastName" class="form-label">Last Name</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amLastName" name="amLastName" placeholder="Enter last name" value="{{ $advertiser->amLastName ??  old('amLastName') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amEmail" class="form-label"> Email</label><label class="text-danger">*</label>
                    <input type="email" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amEmail" name="amEmail" placeholder="Enter email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $advertiser->amEmail ??  old('amEmail') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
        <div class="row">
            <!-- <div class="col-md-4">
                <div class="mb-3">
                    <label for="amPhone" class="form-label">Phone</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend" style="min-width: 80px;">
                            <select class="form-control " @if($lastSegment!='contactinfo' ) disabled @endif id="phone-code-dropdown" data-toggle="select2">
                                @foreach ($countries as $key => $country)
                <option value="{{$country->countryCode}}">{{$country->countryCode}}</option>
                                @endforeach
            </select>
        </div>
        <input type="number" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control ml-2" id="amPhone" name="amPhone" value="{{ $advertiser->amPhone ??  old('amPhone') }}" placeholder="Enter phone number">
                    </div>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amPhone" class="form-label">Phone</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend" style="min-width: 150px;">
                            <select class="form-control " @if($lastSegment!='contactinfo' ) disabled @endif id="phone-code-dropdown" name="country_code" data-toggle="select2">

                                @foreach ($countries as $key => $country)
                                    <option value="{{ $country->id }}" @if (isset($selectedcountrycode) && $country->id == $selectedcountrycode) selected @endif>
                                        {{ $country->countryCode }} ({{ $country->title }})
                                    </option>
                                    <!-- <option value="{{$country->countryCode}}">{{$country->countryCode}} ({{$country -> title}})</option> -->
                                @endforeach
                            </select>
                        </div>
                        <input type="number" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control ml-2" id="amPhone" name="amPhone" value="{{ $advertiser->amPhone ??  old('amPhone') }}" placeholder="Enter phone number">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amSkype" class="form-label">Skype</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-skype"></i></span>
                        <input type="text" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amSkype" name="amSkype" placeholder="@username" value="{{ $advertiser->amSkype ??  old('amSkype') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amLinkedIn" class="form-label">Linkedin</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                        <input type="url" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amLinkedIn" name="amLinkedIn" placeholder="Url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ $advertiser->amLinkedIn ??  old('amLinkedIn') }}">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</form>

<form class="needs-validation" method="POST" action="{{ route('advertiser.updateOperationInfo', [$advertiser->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-category">
        <!-- Agreement & Terms -->
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Operations Info</h5>
            @if($lastSegment!='operationinfo')
                <a href="{{ route('advertiser.currentedit', ['advertiser'=>$advertiser->id ,'currentedit' => 'operationinfo']) }}" class="edit-category-btn btn btn-secondary">
                    <span class="fas fa-edit mr-1"></span>
                    Edit Info
                </a>
            @else
                <button type="submit" class=" save-category-btn btn btn-primary">
                    <span class="fas fa-check mr-1"></span>
                    Save Info
                </button>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="revSharePer" class="form-label">Revenue Share (%)</label><label class="text-danger">*</label>
                    <input type="number" @if($lastSegment!='operationinfo' ) disabled @endif class="form-control" onchange="this.value = Math.min(this.value, 100)" id="revSharePer" name="revSharePer" placeholder="Enter Revenue Share (%)" value="{{ $advertiser->revSharePer ??  old('revSharePer') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="paymentTerms" class="form-label">Payment Terms </label><label class="text-danger">*</label>
                    <select class="form-control" @if($lastSegment!='operationinfo' ) disabled @endif data-toggle="select2" id="paymentTerms" name="paymentTerms">
                        <option value="" disabled>Select Payment Term</option>
                        <option @if($advertiser->paymentTerms == 'net_15') selected @endif value="net_15">Net 15</option>
                        <option @if($advertiser->paymentTerms == 'net_30') selected @endif value="net_30">Net 30</option>
                        <option @if($advertiser->paymentTerms == 'net_45') selected @endif value="net_45">Net 45</option>
                        <option @if($advertiser->paymentTerms == 'net_60') selected @endif value="net_60">Net 60</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                    <!-- <input type="text" disabled class="form-control" id="paymentTerms" name="paymentTerms" placeholder="Enter Payment Terms here ..."> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="form_reportEmail" class="form-label">Reporting Email</label><label class="text-danger">*</label>
                    <input type="email" @if($lastSegment!='operationinfo' ) disabled @endif class="form-control" id="reportEmail" name="form_reportEmail" placeholder="Enter reporting email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $advertiser->reportEmail ??  old('reportEmail') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <!-- <div class="col-md-4">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <div class="input-group input-group-merge">
                        <select class="form-control" @if($lastSegment!='operationinfo' ) disabled @endif id="reportType" data-toggle="select2" name="reportType" value="{{ $advertiser->reportType ??  old('reportType') }}">
                            <option value="">Report Type</option>
                            <option @if(isset($advertiser) && optional($advertiser->reportTypes)->report_type == 'api') selected @endif value="api">API</option>
                            <option @if(isset($advertiser) && optional($advertiser->reportTypes)->report_type == 'email') selected @endif value="email">EMAIL</option>
                            <option @if(isset($advertiser) && optional($advertiser->reportTypes)->report_type == 'gdrive') selected @endif value="gdrive">Google Drive</option>
                            <option @if(isset($advertiser) && optional($advertiser->reportTypes)->report_type == 'dashboard') selected @endif value="dashboard">Dashboard</option>
                        </select>
                        <div class="input-group-append">
                            <button type="button" @if($lastSegment!='operationinfo' ) disabled @endif data-trigger="modal" data-target="report-type-modal" data-enable-target="reportType" class="btn btn-secondary d-none display-on-valid">
                                <span class="dripicons-document-edit"></span>
                            </button>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-4 mb-3">
                <label for="reportColumns" class="form-label">Report Columns</label>
                <div class="input-group input-group-merge">
                    <input type="text" @if($lastSegment!='operationinfo' ) disabled @endif class="form-control remote-form-control" data-target-input="" style="pointer-events: none;" id="reportColumns" name="reportColumns" placeholder="Define report columns">
                    <div class="input-group-append">
                        <button type="button" data-trigger="modal" data-target="report-details-modal" class="btn btn-secondary">
                            <span class="dripicons-document-edit"></span>
                        </button>
                    </div>
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="successManager" class="form-label">Success Manager</label><label class="text-danger">*</label>
                <select class="form-control" @if($lastSegment!='operationinfo' ) disabled @endif data-toggle="select2" id="successManager" name="successManager">
                    @foreach ($availableTeamMembers as $key => $teamMember)
                        <option value="{{$teamMember->id}}" @if (isset($selectedteam) && $teamMember->id == $selectedteam) selected @endif>{{$teamMember->name}}</option>
                    @endforeach
                    <option value="">Select Success Manager</option>

                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div> <!-- end row -->
    </div>
    <!-- @include('advertiser.modals.report-columns') -->
    @include('advertiser.modals.reports-modal')
</form>
<form class="needs-validation" method="POST" action="{{ route('advertiser.updateFinanceInfo', [$advertiser->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-category">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Finance Info</h5>
            @if($lastSegment!='financeinfo')
                <a href="{{ route('advertiser.currentedit', ['advertiser'=>$advertiser->id ,'currentedit' => 'financeinfo']) }}" class="edit-category-btn btn btn-secondary">
                    <span class="fas fa-edit mr-1"></span>
                    Edit Info
                </a>
            @else
                <button type="submit" class=" save-category-btn btn btn-primary">
                    <span class="fas fa-check mr-1"></span>
                    Save Info
                </button>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="billEmail" class="form-label">Billing / Finance Email</label><label class="text-danger">*</label>
                    <input type="email" @if($lastSegment!='financeinfo' ) disabled @endif class="form-control" id="billEmail" name="billEmail" placeholder="Enter billing / financial email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $advertiser->billEmail ??  old('billEmail') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="bank" class="form-label">Bank <span class="text-danger"></span></label>
                    <div class="input-group input-group-merge">
                        <!--<input type="text" @if($lastSegment!='financeinfo' ) disabled @endif style="pointer-events: none;" value="{{ $advertiser->bankDetails->bank_name ??  old('bank_name') }}" class="form-control remote-form-control" data-targetInput="bankNameInput" id="bank" name="bank" placeholder="Enter Bank account" >-->
                        <span @if($lastSegment!='financeinfo' ) disabled @endif style="pointer-events: none;" class="form-control remote-form-control" data-targetInput="bankNameInput" id="bank">{{ $advertiser->bankDetails->bank_name ?? old('bank_name') }}</span>

                        <div class="input-group-append">
                            <button type="button" data-trigger="modal" data-target="add-bank-details-modal" class="btn btn-secondary">
                                <span class="mdi mdi-bank-plus"></span>
                            </button>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>

            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="paypal" class="form-label">Paypal</label>
                    <input type="text" @if($lastSegment!='financeinfo' ) disabled @endif class="form-control" id="paypal" name="paypal" placeholder="Enter Paypal account" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $advertiser->paypal ??  old('paypal') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid email format
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="mb-3">
                    <label for="payoneer" class="form-label">Payoneer</label>
                    <input type="text" @if($lastSegment!='financeinfo' ) disabled @endif class="form-control" id="payoneer" name="payoneer" placeholder="Enter payoneer account" value="{{ $advertiser->payoneer ??  old('payoneer') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid email format
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    @include('advertiser.modals.bank-details-modal')
</form>

@if($lastSegment=='create')
    <div class="row">
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="{{ route('advertiser.index') }}" class="btn btn-secondary ml-1" type="button" disabled>Cancel</a>
    </div>
@endif


@section('script-bottom')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/dropify.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
    <script src="{{asset('assets/js/modal-init.js')}}"></script>

    <script>
        function confirmEmail() {
            if ($("#confemail").val() === "") return;
            $($("#confemail")).removeClass('is-valid is-invalid')
                .addClass(($("#accEmail").val() === $("#confemail").val()) ? ($("#confemail")[0].checkValidity() ? 'is-valid' : 'is-invalid') : 'is-invalid');
        }


        $('.dropify').dropify();



        $('#dbaId').on('input', function() {
            var inputVal = $(this).val();
            if (inputVal.length > 0) {
                $.ajax({
                    url: '{{ route("check.unique.value") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        input_field: inputVal
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'error') {
                            validateInput("#dbaId", false);
                            $("#dba-invalid").text('Advertiser ID already exists.');
                        } else {
                            console.log(response);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            } else {
                $("#dba-invalid").text('You must enter valid input.');
            }
        });
        $('#accEmail').on('input', function() {
            var inputVal = $(this).val();
            if (inputVal.length > 0) {
                $.ajax({
                    url: '{{ route("check.unique.accEmail") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        input_field: inputVal
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'error') {
                            validateInput("#accEmail", false);
                            $("#accEmail-invalid").text('Email already registered.');
                        } else {
                            console.log(response);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            } else {
                $("#accEmail-invalid").text('You must enter valid input.');
            }
        });


        function setCountryCodeToPhone(countryCode) {
            // $("#phone-code-dropdown").select2().val(countryCode).trigger("change");
        }


        document.querySelectorAll(".enable-on-valid").forEach((el) => {
            let input = document.getElementById(el.getAttribute("data-enable-target"));
            input.addEventListener("change", (e) => {
                el.disabled = e.target.value === "";
            })
        })
        document.querySelectorAll(".display-on-valid").forEach((el) => {
            let input = document.getElementById(el.getAttribute("data-enable-target"));
            input.addEventListener("change", (e) => {
                if (e.target.value !== "") el.classList.remove("d-none");
                else el.classList.add("d-none")
            })
        })


        //Report Type Popup Script
        const reportTypeModal = document.getElementById("report-details-modal");
    const reportCredsInputs = reportTypeModal.getElementsByClassName("report-creds-input");

    function showReportCredsReleventInputs(value) {
        for (let i = 0; i < reportCredsInputs.length; i++) {
            reportCredsInputs[i].classList.add("d-none");
        }
        if (value !== "") {
            reportTypeModal.getElementsByClassName(value + "-input-group")
                .forEach((inpGroup) => {
                    inpGroup.classList.remove("d-none");
                })
        }
    }

    $("#reportType").on("select2:close", function() {
        showReportCredsReleventInputs($(this).val());
    })


        function onSaveColumnsModal() {
            let allInpValid = true;
            $("#define-report-columns-modal").find("input,select").each((i, inp) => {
                if (inp.value === "") {
                    allInpValid = false;
                }
            })
            let reportColsInp = $("#reportColumns")
            reportColsInp.val("Report Columns Set");
            validateInput(reportColsInp);
        }

        $("#add-bank-details-modal").find("#bankName").on("input", (e) => {
            $("#bank").val(e.target.value)
            console.log(e.target.value);
            validateInput("#bank");
        })
    </script>

@endsection
