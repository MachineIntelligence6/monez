
<div id="btnwizard">
    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
        <li class="nav-item">
            <a data-target="#accountInfoTab" data-toggle="tab" id="accountInfoTabbutton" style="pointer-events: none; user-select: none;" class="nav-link rounded-0 {{ $activeTab == 'accountInfoTab' ? 'active' : '' }} pt-2 pb-2">
                <i class="mdi mdi-office-building mr-2"></i>
                Account Info
            </a>
        </li>
        <li class="nav-item">
            <a data-target="#contactInfoTab" data-toggle="tab" id="contactInfoTabbutton" style="pointer-events: none; user-select: none;" class="nav-link rounded-0 {{ $activeTab == 'contactInfoTab' ? 'active' : '' }} pt-2 pb-2">
                <i class="mdi mdi-account-circle mr-2"></i>
                Contact Info (Account Manager)
            </a>
        </li>
        <li class="nav-item">
            <a data-target="#operationsInfoTab" data-toggle="tab" id="operationInfoTabbutton" style="pointer-events: none; user-select: none;" class="nav-link rounded-0 {{ $activeTab == 'operationsInfoTab' ? 'active' : '' }} pt-2 pb-2">
                <i class="mdi mdi-office-building mr-2"></i>
                Operations Info
            </a>
        </li>
        <li class="nav-item">
            <a data-target="#financeInfoTab" data-toggle="tab" id="financeInfoTabbutton" style="pointer-events: none; user-select: none;" class="nav-link rounded-0 {{ $activeTab == 'financeInfoTab' ? 'active' : '' }} pt-2 pb-2">
                <i class="mdi mdi-office-building mr-2"></i>
                Finance Info
            </a>
        </li>
    </ul>

    <div class="tab-content mb-0 b-0 pt-0">
        {{-- {{ \Session::get('activeTab') == 'accountInfoTab' ? 'active show' : '' }} --}}
        <!-- Account Info Tab Start  -->
        <div class="tab-pane {{ $activeTab == 'accountInfoTab' ? 'active show' : '' }} fade" id="accountInfoTab">
            <form class="needs-validation" id="accountInfoform" method="post" action="{{ route('advertiser.store.account') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dbaId" class="form-label">Advertiser ID</label><label class="text-danger">*</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-append">
                                    {{-- <div class="input-group-text">
                                        <span>A{{$counter}}_</span>
                                    </div> --}}
                                </div>
                                <input type="text" class="form-control" id="dbaId" name="advertiser_id" data-check-unique="oninput" data-invalid-message="Advertiser ID already registered." data-unique-path="{{ route('advertiser.check-unique-id') }}" placeholder="Enter Advertiser ID" required value="{{ session()->get('advertiser.advertiser_id') }}" />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback" id="dba-invalid">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company / Legal Name</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Enter Company / Legal Name" required value="{{ session()->get('advertiser.company_name') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="regId" class="form-label">Registration / National ID</label>
                            <input type="text" class="form-control" id="regId" name="reg_id" placeholder="Enter Registration / National ID" value="{{ session()->get('advertiser.reg_id') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="vat" class="form-label">VAT ID</label>
                            <input type="text" class="form-control" id="vat" name="vat_id" placeholder="Enter VAT" value="{{ session()->get('advertiser.vat_id') }}">
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="url" class="form-label">Website</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="website-url-input" name="website_url" placeholder="Enter website url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" required value="{{ session()->get('advertiser.website_url') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="accEmail" class="form-label">Account Email</label><label class="text-danger">*</label>
                            <input type="email" class="form-control" id="accEmail" name="account_email" placeholder="Enter account email" oninput="confirmEmail()" data-check-unique="oninput" data-invalid-message="Email already registered." data-unique-path="{{ route('advertiser.check-unique-email') }}" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required value="{{ session()->get('advertiser.account_email') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div id="accEmail-invalid" class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="confemail" class="form-label">Confirm Email</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="" data-autovalidate="false" placeholder="Enter confirm account email" required id="confemail" oninput="confirmEmail()" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required value="{{ session()->get('advertiser.account_email') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                Email and confirm email should be same.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-input-field" class="form-control" name="account_password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" value="{{ session()->get('advertiser.account_password') }}" required>
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text btn">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <div class="btn btn-secondary" onclick="generateRandomPassword(this)">Regenerate
                                    </div>
                                </div>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    Your password must contain least 8 characters, at least one number and one uppercase
                                    and lowercase
                                    letter.
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="address1" class="form-label">Address</label><label class="text-danger">*</label>
                            <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                            <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter address line 1" required value="{{ session()->get('advertiser.address1') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="address1" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter address line 2" value="{{ session()->get('advertiser.address2') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="address1" class="form-label">City</label><label class="text-danger">*</label>
                            <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required value="{{ session()->get('advertiser.city') }}">
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
                            <input type="text" class="form-control" id="state_id" name="state" placeholder="Enter state / province" value="{{ session()->get('advertiser.state') }}">
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
                            <input type="text" class="form-control" id="zipCode" name="zipcode" placeholder="Enter zip / code" value="{{ session()->get('advertiser.zipcode') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label><label class="text-danger">*</label>
                        <select class="form-control" name="country" id="country-dropdown" data-toggle="select2" required>
                            <option>Select Country</option>
                            @foreach ($countries as $key => $country)
                            <option value="{{ $country->title }}" @if ( session()->has('advertiser.country') && $country->id == session()->get('advertiser.country')) selected @endif
                                phone-code="{{ $country->countryCode }}">{{ $country->title }}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div> <!-- end row -->
                <div class="row mb-3">
                    <div class="col-md-6 h-100 mb-3">
                        <label for="io" class="form-label">IO</label>
                        <input type="file" name="io_files[]" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" multiple />
                    </div>
                    <div class="col-md-6 h-100 mb-3">
                        <label for="documents" class="form-label">Documents</label>
                        <input type="file" name="document_files[]" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" multiple />
                    </div>
                </div>
                <div class="row px-2 justify-content-between">
                    <a href="{{ route('advertiser.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
                    <button class="btn btn-primary" id="accountInfobtn" type="submit">Next</button>
                </div>
            </form> <!-- end row -->
        </div>
        <!-- Account Info Tab End  -->

        <!-- Contact Info Tab Start  -->
        <div class="tab-pane {{ $activeTab == 'contactInfoTab' ? 'active show' : '' }} fade" id="contactInfoTab">

            <form class="needs-validation" id="contactInfoform" method="post" action="{{ route('advertiser.store.contact') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="amFirstName" class="form-label">First Name </label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="amFirstName" name="acc_mng_first_name" placeholder="Enter first name" required value="{{ session()->get('advertiser.acc_mng_first_name') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="amLastName" class="form-label">Last Name</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="amLastName" name="acc_mng_last_name" placeholder="Enter last name" required value="{{ session()->get('advertiser.acc_mng_last_name') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="amEmail" class="form-label"> Email</label><label class="text-danger">*</label>
                            <input type="email" class="form-control" id="amEmail" name="acc_mng_email" placeholder="Enter email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required value="{{ session()->get('advertiser.acc_mng_email') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="amPhone" class="form-label">Phone</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend" style="min-width: 150px;">
                                    <select class="form-control " name="country_code" id="phone-code-dropdown" data-toggle="select2">

                                        @foreach ($countries as $key => $country)
                                        <option value="{{ $country->id }}" {{ $country->countryCode == '1' ? 'selected' : '' }}>
                                            {{ $country->countryCode }} ({{ $country->title }})
                                        </option>
                                        <!-- <option value="{{ $country->countryCode }}">{{ $country->countryCode }} ({{ $country->title }})</option> -->
                                        @endforeach
                                    </select>
                                </div>
                                <input type="number" class="form-control ml-2" id="amPhone" name="acc_mng_phone" placeholder="Enter phone number" value="{{ session()->get('advertiser.acc_mng_phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="amSkype" class="form-label">Skype</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                <input type="text" class="form-control" id="amSkype" name="acc_mng_skype" placeholder="@username" value="{{ session()->get('advertiser.acc_mng_skype') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="amLinkedIn" class="form-label">Linkedin</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                <input type="url" class="form-control" id="amLinkedIn" name="acc_mng_skype" placeholder="Url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ session()->get('advertiser.acc_mng_skype') }}">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <div class="row px-2 justify-content-between">
                    <button class="btn btn-secondary ml-1 previous-tab-btn" type="button">Previous</button>
                    <button class="btn btn-primary" type="submit">Next</button>
                </div>
            </form>
        </div>
        <!-- Contact Info Tab End  -->


        <!-- Operations Info Tab Start  -->
        <div class="tab-pane {{ $activeTab == 'operationsInfoTab' ? 'active show' : '' }} fade" id="operationsInfoTab">
            <form class="needs-validation" id="operationInfoform" method="post" action="{{ route('advertiser.store.operation') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="revSharePer" class="form-label">Revenue Share (%)</label><label class="text-danger">*</label>
                            <input type="number" class="form-control" onchange="this.value = Math.min(this.value, 100)" id="revSharePer" name="revenue_share" placeholder="Enter Revenue Share (%)" required value="{{ session()->get('advertiser.revenue_share') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="paymentTerms" class="form-label">Payment Terms </label><label class="text-danger">*</label>
                            <div class="input-group">
                                <select class="form-control" data-toggle="select2" id="paymentTerms" name="payment_terms" required>
                                    <option value="" selected>Select Payment Term</option>
                                    <option {{session()->get('advertiser.payment_terms') == 'SH1' ? 'selected' : '' }} value="SH1">Net 15</option>
                                    <option {{session()->get('advertiser.payment_terms') == 'SH2' ? 'selected' : '' }} value="SH2">Net 30</option>
                                    <option {{session()->get('advertiser.payment_terms') == 'SH3' ? 'selected' : '' }} value="SH3">Net 45</option>
                                    <option {{session()->get('advertiser.payment_terms') == 'SH4' ? 'selected' : '' }} value="SH4">Net 60</option>
                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                            <!-- <input type="text" class="form-control" id="paymentTerms" name="paymentTerms" placeholder="Enter Payment Terms here ..."> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="reportEmail" class="form-label">Reporting Email</label><label class="text-danger">*</label>
                            <input type="email" class="form-control" id="reportEmail" name="reporting_email" placeholder="Enter reporting email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required value="{{ session()->get('advertiser.reporting_email') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4 mb-3">
                        <label for="reportColumns" class="form-label">Report Details</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" style="pointer-events: none;" id="reportColumns" name="reportColumns" placeholder="Define report details">
                            <input type="text" class="form-control d-none" id="reportColumnsId" name="report_columns_id" value="{{ session()->get('advertiser.report_columns_id') }}">
                            <div class="input-group-append">
                                <button type="button" data-trigger="modal" data-target="report-details-modal" class="btn btn-secondary">
                                    <span class="dripicons-document-edit"></span>
                                </button>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="successManager" class="form-label">Success Manager</label><label class="text-danger">*</label>
                        <select class="form-control" data-toggle="select2" id="successManager" name="user_id" required>
                            <option value="" selected disabled>Select Success Manager</option>
                            @foreach ($availableTeamMembers as $key => $teamMember)
                            <option value="{{ $teamMember->id }}" @if ( session()->get('advertiser.user_id') == $teamMember->id) selected @endif>
                                {{ $teamMember->name }}
                            </option>
                            @endforeach
                            <!-- <option value="1">Success Manager</option> -->
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>

                </div>
                <div class="row px-2 justify-content-between">
                    <button class="btn btn-secondary ml-1 previous-tab-btn" type="button">Previous</button>
                    <button class="btn btn-primary" type="submit">Next</button>
                </div>
            </form>
        </div>
        <!-- Operations Info Tab End  -->


        <!-- Finance Info Tab Start -->
        <div class="tab-pane {{ $activeTab == 'financeInfoTab' ? 'active show' : '' }}" id="financeInfoTab">

            <form class="needs-validation" id="financeInfoform" method="post" action="{{ route('advertiser.store.all') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="billEmail" class="form-label">Billing / Finance Email</label><label class="text-danger">*</label>
                            <input type="email" class="form-control" id="billEmail" name="billing_email" placeholder="Enter billing / financial email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required value="{{ session()->get('advertiser.billing_email') }}">
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
                                <input type="text" style="pointer-events: none;" tabindex="-1" class="form-control" id="bank" name="bank" placeholder="Enter Bank account" value="{{ session()->get('advertiser.bank') }}">
                                <input type="text" class="form-control d-none" id="bankId" name="bank_id">
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
                            <input type="text" class="form-control" id="paypal" name="paypal" placeholder="Enter Paypal account" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" value="{{ session()->get('advertiser.paypal') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid email format
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="payoneer" class="form-label">Payoneer</label>
                            <input type="text" class="form-control" id="payoneer" name="payoneer" placeholder="Enter payoneer account" value="{{ session()->get('advertiser.payoneer') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid email format
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <div class="row px-2 justify-content-between">
                    <button class="btn btn-secondary ml-1 previous-tab-btn" type="button">Previous</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <!-- Finance Info Tab End -->


    </div> <!-- tab-content -->
</div>
