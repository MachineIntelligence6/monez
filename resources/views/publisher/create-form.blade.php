<div id="btnwizard">
    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
        <li class="nav-item">
            <a data-target="#accountInfoTab" data-toggle="tab" id="accountInfoTabbutton"
                style="pointer-events: none; user-select: none;"
                class="nav-link rounded-0 {{ $pubActiveTab == 'accountInfoTab' ? 'active' : '' }} pt-2 pb-2">
                <i class="mdi mdi-office-building mr-2"></i>
                Account Info
            </a>
        </li>
        <li class="nav-item">
            <a data-target="#contactInfoTab" data-toggle="tab" id="contactInfoTabbutton"
                style="pointer-events: none; user-select: none;"
                class="nav-link rounded-0 {{ $pubActiveTab == 'contactInfoTab' ? 'active' : '' }} pt-2 pb-2">
                <i class="mdi mdi-account-circle mr-2"></i>
                Contact Info (Account Manager)
            </a>
        </li>
    </ul>

    <div class="tab-content mb-0 b-0 pt-0">
        <!-- Account Info Tab Start  -->
        <div class="tab-pane {{ $pubActiveTab == 'accountInfoTab' ? 'active show' : '' }} fade" id="accountInfoTab">
            <form class="needs-validation" id="accountInfoform" method="post"
                action="{{ route('publisher.store.account') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dbaId" class="form-label">Publisher ID</label><label
                                class="text-danger">*</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-append">
                                </div>
                                <input type="text" class="form-control" id="dbaId" name="publisher_id"
                                    data-check-unique="oninput" data-invalid-message="publisher ID already registered."
                                    data-unique-path="{{ route('publisher.check-unique-id') }}"
                                    placeholder="Enter publisher ID" required
                                    value="{{ session()->get('publisher.publisher_id') }}" />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback" id="dba-invalid">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company / Legal Name</label><label
                                class="text-danger">*</label>
                            <input type="text" class="form-control" id="companyName" name="company_name"
                                placeholder="Enter Company / Legal Name" required
                                value="{{ session()->get('publisher.company_name') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="regId" class="form-label">Registration / National ID</label>
                            <input type="text" class="form-control" id="regId" name="reg_id"
                                placeholder="Enter Registration / National ID"
                                value="{{ session()->get('publisher.reg_id') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="vat" class="form-label">VAT ID</label>
                            <input type="text" class="form-control" id="vat" name="vat_id"
                                placeholder="Enter VAT" value="{{ session()->get('publisher.vat_id') }}">
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="website_url" class="form-label">Website</label><label class="text-danger">*</label>
                            <input type="url" class="form-control" id="website-url-input" name="website_url"
                                placeholder="Enter website url"
                                pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})"
                                required value="{{ session()->get('publisher.website_url') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="accEmail" class="form-label">Account Email</label><label
                                class="text-danger">*</label>
                            <input type="email" class="form-control" id="accEmail" name="account_email"
                                placeholder="Enter account email" oninput="confirmEmail()"
                                data-check-unique="oninput" data-invalid-message="Email already registered."
                                data-unique-path="{{ route('publisher.check-unique-email') }}"
                                pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                required value="{{ session()->get('publisher.account_email') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div id="accEmail-invalid" class="invalid-feedback">
                                You must enter valid or unique input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="confemail" class="form-label">Confirm Email</label><label
                                class="text-danger">*</label>
                            <input type="text" class="form-control" name="" data-autovalidate="false"
                                placeholder="Enter confirm account email" required id="confemail"
                                oninput="confirmEmail()"
                                pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                required value="{{ session()->get('publisher.account_email') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                Email and confirm email should be same.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label><label
                                class="text-danger">*</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-input-field" class="form-control"
                                    name="account_password" placeholder="Enter password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                                    value="{{ session()->get('publisher.account_password') }}" required>
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
                            <label for="address1" class="form-label">Address</label><label
                                class="text-danger">*</label>
                            <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                            <input type="text" class="form-control" id="address1" name="address1"
                                placeholder="Enter address line 1" required
                                value="{{ session()->get('publisher.address1') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="address1" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="address2" name="address2"
                                placeholder="Enter address line 2"
                                value="{{ session()->get('publisher.address2') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="address1" class="form-label">City</label><label class="text-danger">*</label>
                            <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                            <input type="text" class="form-control" id="city" name="city"
                                placeholder="Enter city" required value="{{ session()->get('publisher.city') }}">
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
                            <input type="text" class="form-control" id="state_id" name="state"
                                placeholder="Enter state / province" value="{{ session()->get('publisher.state') }}">
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
                            <input type="text" class="form-control" id="zipCode" name="zipcode"
                                placeholder="Enter zip / code" value="{{ session()->get('publisher.zipcode') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label><label class="text-danger">*</label>
                        <select class="form-control" name="country" id="country-dropdown" data-toggle="select2"
                            required>
                            <option>Select Country</option>
                            @foreach ($countries as $key => $country)
                                <option value="{{ $country->title }}"
                                    @if (session()->has('publisher.country') && $country->id == session()->get('publisher.country')) selected @endif
                                    phone-code="{{ $country->countryCode }}">{{ $country->title }}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="successManager" class="form-label">Success Manager</label><label
                            class="text-danger">*</label>
                        <select class="form-control" data-toggle="select2" id="successManager" name="team_member_id"
                            required>
                            <option value="" selected disabled>Select Success Manager</option>
                            @foreach ($availableTeamMembers as $key => $teamMember)
                                <option value="{{ $teamMember->id }}"
                                    @if (session()->get('publisher.team_member_id') == $teamMember->id) selected @endif>
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
                    <div class="row px-2 justify-content-between" style="width: 100%;">
                        <a href="{{ route('publisher.index') }}" class="btn btn-secondary ml-1"
                            type="button">Cancel</a>
                        <button class="btn btn-primary" id="accountInfobtn" type="submit">Next</button>
                    </div>
            </form>
        </div>
    </div>
    <!-- Account Info Tab End  -->

    <!-- Contact Info Tab Start  -->
    <div class="tab-pane {{ $pubActiveTab == 'contactInfoTab' ? 'active show' : '' }} fade" id="contactInfoTab">

        <form class="needs-validation" id="contactInfoform" method="post"
            action="{{ route('publisher.store.all') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="amFirstName" class="form-label">First Name </label><label
                            class="text-danger">*</label>
                        <input type="text" class="form-control" id="amFirstName" name="acc_mng_first_name"
                            placeholder="Enter first name" required
                            value="{{ session()->get('publisher.acc_mng_first_name') }}">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="amLastName" class="form-label">Last Name</label><label
                            class="text-danger">*</label>
                        <input type="text" class="form-control" id="amLastName" name="acc_mng_last_name"
                            placeholder="Enter last name" required
                            value="{{ session()->get('publisher.acc_mng_last_name') }}">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="amEmail" class="form-label"> Email</label><label class="text-danger">*</label>
                        <input type="email" class="form-control" id="amEmail" name="acc_mng_email"
                            placeholder="Enter email"
                            pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                            required value="{{ session()->get('publisher.acc_mng_email') }}">
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
                                <select class="form-control " name="country_code" id="phone-code-dropdown"
                                    data-toggle="select2">

                                    @foreach ($countries as $key => $country)
                                        <option value="{{ $country->countryCode }}"
                                            {{ $country->countryCode == '1' ? 'selected' : '' }}>
                                            {{ $country->title }} ({{ $country->countryCode }})
                                        </option>
                                        <!-- <option value="{{ $country->countryCode }}">{{ $country->title }} ({{ $country->countryCode }})</option> -->
                                    @endforeach
                                </select>
                            </div>
                            <input type="number" class="form-control ml-2" id="amPhone" name="acc_mng_phone"
                                placeholder="Enter phone number"
                                value="{{ session()->get('publisher.acc_mng_phone') }}"
                                onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="amSkype" class="form-label">Skype</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-skype"></i></span>
                            <input type="text" class="form-control" id="amSkype" name="acc_mng_skype"
                                placeholder="@username" value="{{ session()->get('publisher.acc_mng_skype') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="amLinkedIn" class="form-label">Linkedin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                            <input type="url" class="form-control" id="amLinkedIn" name="acc_mng_linkedin"
                                placeholder="Url"
                                pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})"
                                value="{{ session()->get('publisher.acc_mng_linkedin') }}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <div class="row px-2 justify-content-between">
                <button class="btn btn-secondary ml-1 previous-tab-btn" id="previous-tab" type="button">Previous</button>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <!-- Contact Info Tab End  -->
</div>
