@section('css')
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<form class="needs-validation" method="POST" action="{{ route('publisher.update', ['publisher'=>$publisher->id , 'currentedit' => 'accountinfo']) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-category">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase">
                <i class="mdi mdi-office-building mr-2"></i>
                Account Info
            </h5>
            @if($lastSegment!='accountinfo')
            <a href="{{ route('publisher.edit', ['publisher'=>$publisher->id , 'currentedit' => 'accountinfo']) }}" class="edit-category-btn btn btn-secondary">
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
                    <label for="dbaId" class="form-label">Publisher ID</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="dbaId" name="publisher_id" placeholder="Enter Publisher ID" value="{{ $publisher->publisher_id ??  old('publisher_id') }}" />
                    <div class="valid-feedback">Valid.</div>
                    <div id="dba-invalid" class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="companyName" class="form-label">Company / Legal Name</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="companyName" name="company_name" placeholder="Enter Company / Legal Name" value="{{ $publisher->company_name ??  old('company_name') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="regId" class="form-label">Registration / National ID</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="regId" name="reg_id" placeholder="Enter Registration / National ID" value="{{ $publisher->reg_id ??  old('reg_id') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="vat" class="form-label">VAT ID</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="vat" name="vat_id" placeholder="Enter VAT" value="{{ $publisher->vat_id ??  old('vat_id') }}">
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="url" class="form-label">Website</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="website-url-input" name="website_url" placeholder="Enter website url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ $publisher->website_url ??  old('website_url') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="accEmail" class="form-label">Account Email</label><label class="text-danger">*</label>
                    <input type="email" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="accEmail" oninput="confirmEmail()" name="account_email" placeholder="Enter account email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $publisher->account_email ??  old('account_email') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div id="accEmail-invalid" class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="confemail" class="form-label">Confirm Email</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" name="" placeholder="Enter confirm account email" id="confemail" data-autovalidate="false" oninput="confirmEmail()" value="{{ $publisher->account_email ??  old('account_email') }}">
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
                        <input type="password" @if($lastSegment!='accountinfo' ) disabled @endif id="password-input-field" class="form-control" value="{{ old('account_password') }}" name="account_password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
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
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="address1" name="address1" placeholder="Enter address line 1" value="{{ $publisher->address1 ??  old('address1') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">Address 2</label>
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="address2" name="address2" placeholder="Enter address line 2" value="{{ $publisher->address2 ??  old('address2') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">City</label><label class="text-danger">*</label>
                    <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="city" name="city" placeholder="Enter city" value="{{ $publisher->city ??  old('city') }}">
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
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="state_id" name="state" placeholder="Enter state / province" value="{{ $publisher->state ??  old('state') }}">
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
                    <input type="text" @if($lastSegment!='accountinfo' ) disabled @endif class="form-control" id="zipCode" name="zipcode" placeholder="Enter zip / code" value="{{ $publisher->zipcode ??  old('zipcode') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <label for="country" class="form-label">Country</label><label class="text-danger">*</label>
                <select class="form-control" name="country" @if($lastSegment!='accountinfo' ) disabled @endif id="country-dropdown" onchange="setCountryCodeToPhone(this.options[this.selectedIndex].getAttribute('phone-code'))" data-toggle="select2">
                    <option>Select Country</option>
                    @foreach ($countries as $key => $country)
                    <option value="{{$country->title}}" @if (isset($publisher) && $country->title == $publisher->country) selected @endif phone-code="{{$country -> countryCode}}">{{$country->title}}</option>
                    @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="successManager" class="form-label">Success Manager</label><label class="text-danger">*</label>
                <select class="form-control" @if($lastSegment!='operationinfo' ) disabled @endif data-toggle="select2" id="successManager" name="team_member_id">
                    @foreach ($availableTeamMembers as $key => $teamMember)
                    <option value="{{$teamMember->id}}" @if ($teamMember->id == $publisher->team_member_id) selected @endif>{{$teamMember->name}}</option>
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
</form>

<form class="needs-validation" method="POST" action="{{ route('publisher.update', ['publisher'=>$publisher->id , 'currentedit' => 'contactinfo']) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-category">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-account-circle mr-2"></i> Contact Info (Account Manager)</h5>

            @if($lastSegment!='contactinfo')
            <a href="{{ route('publisher.edit', ['publisher'=>$publisher->id ,'currentedit' => 'contactinfo']) }}" class="edit-category-btn btn btn-secondary">
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
                    <input type="text" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amFirstName" name="acc_mng_first_name" placeholder="Enter first name" value="{{ $publisher->acc_mng_first_name ??  old('acc_mng_first_name') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amLastName" class="form-label">Last Name</label><label class="text-danger">*</label>
                    <input type="text" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amLastName" name="acc_mng_last_name" placeholder="Enter last name" value="{{ $publisher->acc_mng_last_name ??  old('acc_mng_last_name') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amEmail" class="form-label"> Email</label><label class="text-danger">*</label>
                    <input type="email" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amEmail" name="acc_mng_email" placeholder="Enter email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $publisher->acc_mng_email ??  old('acc_mng_email') }}">
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
        <input type="number" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control ml-2" id="amPhone" name="amPhone" value="{{ $publisher->amPhone ??  old('amPhone') }}" placeholder="Enter phone number">
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
                                <option value="{{ $country->countryCode }}" @if (isset($publisher->country_code) && $country->countryCode == $publisher->country_code) selected @endif>
                                    {{ $country->title }} ({{ $country->countryCode }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="number" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control ml-2" id="amPhone" name="acc_mng_phone" value="{{ $publisher->acc_mng_phone ??  old('acc_mng_phone') }}" placeholder="Enter phone number" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amSkype" class="form-label">Skype</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-skype"></i></span>
                        <input type="text" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amSkype" name="acc_mng_skype" placeholder="@username" value="{{ $publisher->acc_mng_skype ??  old('acc_mng_skype') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amLinkedIn" class="form-label">Linkedin</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                        <input type="url" @if($lastSegment!='contactinfo' ) disabled @endif class="form-control" id="amLinkedIn" name="acc_mng_linkedin" placeholder="Url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ $publisher->acc_mng_linkedin ??  old('acc_mng_linkedin') }}">
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

<form class="needs-validation" method="POST" action="{{ route('publisher.update', ['publisher'=>$publisher->id , 'currentedit' => 'operationinfo']) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-category">
        <!-- Agreement & Terms -->
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Operations Info</h5>
            @if($lastSegment!='operationinfo')
            <a href="{{ route('publisher.edit', ['publisher'=>$publisher->id ,'currentedit' => 'operationinfo']) }}" class="edit-category-btn btn btn-secondary">
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
            @if($lastSegment=='operationinfo')
            <div class="row display-on-edit">
                <div class="col-md-6 h-100">
                    <div class="mb-3">
                        <label for="io" class="form-label">IO</label>
                        <input type="file" name="io_files[]" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" /><br>
                    </div>
                </div>
                <div class="col-md-6 h-100">
                    <div class="mb-3">
                        <label for="documents" class="form-label">Documents</label>
                        <input type="file" name="document_files[]" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" /><br>
                    </div>
                </div>
            </div>
            @endif
            <div class="row mb-4 display-on-view">
                <div class="col-md-6 mb-3">
                    <div class="h-100 mb-3">
                        <label for="">Uploaded IOs</label>
                        <div class="border h-100 rounded-sm p-2">
                            @if ($publisher->io_path)
                            @foreach ($publisher->io_path as $key => $file)
                            <a href="{{ route('publisher.download-file', ['publisher' => $publisher->id, 'fileNo' => $key, 'type'=>'io']) }}">{{ $file->name }}</a><br><br>
                            @endforeach
                            @else
                            <p>No PDF to show</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="h-100">
                        <label for="">Uploaded Documents</label>
                        <div class="border h-100 rounded-sm p-2">
                            @if ($publisher->documents_path)
                            @foreach ($publisher->documents_path as $key => $file)
                            <a href="{{ route('publisher.download-file', ['publisher' => $publisher->id, 'fileNo' => $key, 'type'=>'document']) }}">{{ $file->name}}</a><br><br>
                            @endforeach
                            @else
                            <p>No PDF to show</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="revSharePer" class="form-label">Revenue Share (%)</label><label class="text-danger">*</label>
                    <input type="number" @if($lastSegment!='operationinfo' ) disabled @endif class="form-control" onchange="this.value = Math.min(this.value, 100)" id="revSharePer" name="revenue_share" placeholder="Enter Revenue Share (%)" value="{{ $publisher->revenue_share ??  old('revenue_share') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="paymentTerms" class="form-label">Payment Terms </label><label class="text-danger">*</label>
                    <select class="form-control" @if($lastSegment!='operationinfo' ) disabled @endif data-toggle="select2" id="paymentTerms" name="payment_terms">
                        <option value="" disabled>Select Payment Term</option>
                        @foreach ($paymentTermsValues as $ptv)
                        <option value='{{$ptv}}' @if (isset($publisher) && $ptv==$publisher->payment_terms) selected @endif>Net {{$ptv}}</option>
                        @endforeach
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
                    <input type="email" @if($lastSegment!='operationinfo' ) disabled @endif class="form-control" id="reportEmail" name="reporting_email" placeholder="Enter reporting email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $publisher->reporting_email ??  old('reporting_email') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div> <!-- end col -->
            {{-- <div class="col-md-4">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <div class="input-group input-group-merge">
                        <select class="form-control" @if($lastSegment!='operationinfo' ) disabled @endif id="reportType" data-toggle="select2" name="report_type" value="{{ $publisher->report_type ??  old('report_type') }}">
            <option value="">Report Type</option>
            <option @if($publisher->report_type == 'api') selected @endif value="api">API</option>
            <option @if($publisher->report_type == 'email') selected @endif value="email">EMAIL</option>
            <option @if($publisher->report_type == 'gdrive') selected @endif value="gdrive">Google Drive</option>
            <option @if($publisher->report_type == 'dashboard') selected @endif value="dashboard">Dashboard</option>
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
    </div>
    <div class="col-md-4 mb-3">
        <label for="reportColumns" class="form-label">Report Columns</label>
        <div class="input-group input-group-merge">
            <input type="text" @if($lastSegment!='operationinfo' ) disabled @endif class="form-control remote-form-control" data-target-input="" style="pointer-events: none;" id="reportColumns" name="reportColumns" placeholder="Define report columns">
            <div class="input-group-append">
                <button type="button" data-trigger="modal" data-target="define-report-columns-modal" class="btn btn-secondary">
                    <span class="dripicons-document-edit"></span>
                </button>
            </div>
        </div>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">
            You must enter valid input
        </div>
    </div> --}}

    </div> <!-- end row -->
</form>
</div>
{{--@include('publisher.modals.report-columns')--}}
{{-- @include('publisher.modals.reports-modal') --}}

<form class="needs-validation" method="POST" action="{{ route('publisher.update', ['publisher'=>$publisher->id , 'currentedit' => 'financeinfo']) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-category">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Finance Info</h5>
            @if($lastSegment!='financeinfo')
            <a href="{{ route('publisher.edit', ['publisher'=>$publisher->id ,'currentedit' => 'financeinfo']) }}" class="edit-category-btn btn btn-secondary">
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
                    <input type="email" @if($lastSegment!='financeinfo' ) disabled @endif class="form-control" id="billEmail" name="billing_email" placeholder="Enter billing / financial email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $publisher->billing_email ??  old('billing_email') }}">
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
                        <!--<input type="text" @if($lastSegment!='financeinfo' ) disabled @endif style="pointer-events: none;" value="{{ $publisher->bankDetails->bank_name ??  old('bank_name') }}" class="form-control remote-form-control" data-targetInput="bankNameInput" id="bank" name="bank" placeholder="Enter Bank account" >-->
                        <span @if($lastSegment!='financeinfo' ) disabled @endif style="pointer-events: none;" class="form-control remote-form-control" data-targetInput="bankNameInput" id="bank">{{ $publisher->bank_name ?? old('bank_name') }}</span>

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
                    <input type="text" @if($lastSegment!='financeinfo' ) disabled @endif class="form-control" id="paypal" name="paypal" placeholder="Enter Paypal account" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ $publisher->paypal ??  old('paypal') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid email format
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="mb-3">
                    <label for="payoneer" class="form-label">Payoneer</label>
                    <input type="text" @if($lastSegment!='financeinfo' ) disabled @endif class="form-control" id="payoneer" name="payoneer" placeholder="Enter payoneer account" value="{{ $publisher->payoneer ??  old('payoneer') }}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid email format
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</form>
@include('publisher.modals.bank-details-modal')

@if($lastSegment=='create')
<div class="row">
    <button class="btn btn-primary" type="submit">Submit</button>
    <a href="{{ route('publisher.index') }}" class="btn btn-secondary ml-1" type="button" disabled>Cancel</a>
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

    $("#bankDetailsForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: (response) => {
                // $("#bankId").val(response.id);
                $(this).closest(".modal")
                    .removeClass("show")
                    .css("display", "none");
                console.log(response);
            },
            error: (error) => {
                console.log(error);
            }
        });
    });

    $("#reportColoumnsForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: (response) => {
                // $("#reportColumnsId").val(response.id);
                $(this).closest(".modal")
                    .removeClass("show")
                    .css("display", "none");
                console.log(response)
            },
            error: (error) => {
                console.log(error);
            }
        });
    });

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
                        $("#dba-invalid").text('Publisher ID already exists.');
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
    const reportTypeModal = document.getElementById("report-type-modal");
    const reportCredsInputs = reportTypeModal.getElementsByClassName("report-creds-input");

    function showReportCredsPopup(value) {
        for (let i = 0; i < reportCredsInputs.length; i++) {
            reportCredsInputs[i].classList.add("d-none");
            // reportCredsInputs[i].querySelector("input").setAttribute("required", false);
        }
        if (value !== "") {
            reportTypeModal.getElementsByClassName(value + "-input-group")
                .forEach((inpGroup) => {
                    inpGroup.classList.remove("d-none");
                    // inpGroup.querySelector("input").setAttribute("required", true);
                })
            reportTypeModal.classList.add("show");
            reportTypeModal.style.display = "block";
        }
    }

    $("#reportType").on("select2:close", function() {
        showReportCredsPopup($(this).val());
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