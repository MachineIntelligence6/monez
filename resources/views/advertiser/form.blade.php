<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="dbaId" class="form-label">Advertiser ID</label><label class="text-danger">*</label>
            <input type="text" class="form-control" id="dbaId" name="dbaId" placeholder="Enter Advertiser ID" required pattern="[a-z0-9\.]+" value="{{ $advertiser->dbaId ??  old('dbaId') }}" />
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="companyName" class="form-label">Company / Legal Name</label><label class="text-danger">*</label>
            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter Company / Legal Name" required value="{{ $advertiser->companyName ??  old('companyName') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-md-4">
        <div class="mb-3">
            <label for="regId" class="form-label">Registration / National ID</label>
            <input type="number" class="form-control" id="regId" name="regId" placeholder="Enter Registration / National ID" value="{{ $advertiser->regId ??  old('regId') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="vat" class="form-label">VAT ID</label>
            <input type="text" class="form-control" id="vat" name="vat" placeholder="Enter VAT" value="{{ $advertiser->vat ??  old('vat') }}">
        </div>
    </div> <!-- end col -->
    <div class="col-md-4">
        <div class="mb-3">
            <label for="url" class="form-label">Website</label><label class="text-danger">*</label>
            <input type="text" class="form-control" id="website-url-input" name="url" placeholder="Enter website url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" required value="{{ $advertiser->url ??  old('website-url-input') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="accEmail" class="form-label">Account Email</label><label class="text-danger">*</label>
            <input type="email" class="form-control" id="accEmail" name="accEmail" placeholder="Enter account email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ $advertiser->accEmail ??  old('accEmail') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="confemail" class="form-label">Confirm Email</label><label class="text-danger">*</label>
            <input type="text" class="form-control" name="" placeholder="Enter confirm account email" required id="confemail" onblur="confirmEmail()" value="{{ old('vat') }}">
            <div class="invalid-feedback" id="invalidfeedback">

            </div>
        </div>
    </div>

    <script>
        function confirmEmail() {
            var email = document.getElementById("accEmail").value
            var confemail = document.getElementById("confemail").value
            if (email != confemail) {
                alert('Email Not Matching!');
                //document.getElementById('invalidfeedback').innerHTML = "Your email not match";
            }
        }
    </script>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password-input-field" class="form-control" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <div class="input-group-append" data-password="false">
                    <div class="input-group-text btn">
                        <span class="password-eye"></span>
                    </div>
                </div>
                <div class="pl-2">
                    <div class="btn btn-secondary" onclick="generateNewPassword()">Regenerate</div>
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
            <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter address line 1" required value="{{ $advertiser->address1 ??  old('address1') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-md-4">
        <div class="mb-3">
            <label for="address1" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter address line 2" value="{{ $advertiser->address2 ??  old('address2') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="address1" class="form-label">City</label><label class="text-danger">*</label>
            <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
            <input type="text" class="form-control" id="city" name="city_id" placeholder="Enter city" required value="{{ $advertiser->city_id ??  old('city_id') }}">
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
            <input type="text" class="form-control" id="state_id" name="state_id" placeholder="Enter state / province" value="{{ $advertiser->state_id ??  old('state_id') }}">
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
            <input type="number" class="form-control" id="zipCode" name="zipCode" placeholder="Enter zip / code" value="{{ $advertiser->zipCode ??  old('zipCode') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-md-4">
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <!-- <label for="product-category" class="form-label">Country <span class="text-danger"></span></label> -->
            <select id="country-code-input" class="form-control select2" id="country_id" name="country_id" required>
                <option disabled selected value="">Select Country</option>
                @foreach ($countries as $key => $country)
                <option value="{{$country->title}}" phone-code="+{{ $country->phone_code }}">{{$country->title}}</option>
                @endforeach
            </select>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- Personal Info -->
<h5 class="mb-3 text-uppercase"><i class="mdi mdi-account-circle mr-2"></i> Contact Info (Account Manager)
</h5>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="amFirstName" class="form-label">First Name</label><label class="text-danger">*</label>
            <input type="text" class="form-control" id="amFirstName" name="amFirstName" placeholder="Enter first name" required value="{{ $advertiser->amFirstName ??  old('amFirstName') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="amLastName" class="form-label">Last Name</label><label class="text-danger">*</label>
            <input type="text" class="form-control" id="amLastName" name="amLastName" placeholder="Enter last name" required value="{{ $advertiser->amLastName ??  old('amLastName') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-md-4">
        <div class="mb-3">
            <label for="amEmail" class="form-label"> Email</label><label class="text-danger">*</label>
            <input type="email" class="form-control" id="amEmail" name="amEmail" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ $advertiser->amEmail ??  old('amEmail') }}">
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
            <label for="amPhone" class="form-label">Phone:</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <select class="form-control" id="phone-code-dropdown">
                        <!-- <option disabled selected value="">Select Code</option> -->
                        @foreach ($countries as $key => $country)
                        <option value="+{{$country->phone_code}}">+{{$country->phone_code}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" class="form-control ml-2" id="phone-number-input" name="amPhone" placeholder="Enter phone number">
            </div>
            <!-- <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span> -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="amSkype" class="form-label">Skype</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fab fa-skype"></i></span>
                <input type="text" class="form-control" id="amSkype" name="amSkype" placeholder="@username" value="{{ $advertiser->amSkype ??  old('amSkype') }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="amLinkedIn" class="form-label">Linkedin</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                <input type="url" class="form-control" id="amLinkedIn" name="amLinkedIn" placeholder="Url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ $advertiser->amLinkedIn ??  old('amLinkedIn') }}">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Agreement & Terms -->
<h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Operations Info
</h5>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="AgreementStartDate" class="form-label">Start Date</label><label class="text-danger">*</label>
            <input type="text" id="basic-datepicker" class="form-control" placeholder="Basic datepicker" name="AgreementStartDate" required value="{{ $advertiser->agreement_start_date ??  old('AgreementStartDate') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must select valid date.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="revSharePer" class="form-label">Revenue Share (%)</label><label class="text-danger">*</label>
            <input type="number" class="form-control" id="revSharePer" name="revSharePer" placeholder="Enter Revenue Share (%)" required value="{{ $advertiser->revSharePer ??  old('revSharePer') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-md-4">
        <div class="mb-3">
            <!-- <label for="paymentTerms" class="form-label">Payment Terms</label> -->
            <label for="paymentTerms" class="form-label">Payment Terms </label><label class="text-danger">*</label>
            <select class="form-control select2" id="paymentTerms" name="paymentTerms" required>
                <option value="" disabled selected>Select Payment Term</option>
                <option value="SH1">Net 15 %</option>
                <option value="SH1">Net 30 %</option>
                <option value="SH1">Net 45 %</option>
                <option value="SH1">Net 60 %</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
            <!-- <input type="text" class="form-control" id="paymentTerms" name="paymentTerms" placeholder="Enter Payment Terms here ..."> -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="reportEmail" class="form-label">Reporting Email</label><label class="text-danger">*</label>
            <input type="email" class="form-control" id="reportEmail" name="reportEmail" placeholder="Enter reporting email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ $advertiser->reportEmail ??  old('reportEmail') }}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end col -->
    <!-- <div class="col-md-4">
            <div class="mb-3">
                <label for="notes" class="form-label">Notes / Comments</label>
                <textarea rows="5" type="text" class="form-control" id="notes" name="notes"
                       placeholder="Enter notes / comments"></textarea>
            </div>
        </div>  -->
    <!-- end col -->

    <div class="col-md-4 mb-3">
        <label for="reportType" class="form-label">Report Type</label><label class="text-danger">*</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control" disabled id="reportType" name="reportType" placeholder="Add report type" required value="{{ $advertiser->reportType ??  old('reportType') }}">
            <div class="input-group-append">
                <button type="button" data-trigger="modal" data-target="report-type-modal" class="btn btn-secondary">
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
        <label for="reportColumns" class="form-label">Report Columns</label><label class="text-danger">*</label>
        <div class="input-group input-group-merge">
            <input type="text" class="form-control" disabled id="reportColumns" name="reportColumns" placeholder="Define report columns" required value="{{ $advertiser->reportColumns ??  old('reportColumns') }}">
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
    </div>
    <div class="col-md-4 mb-3">
        <label for="successManager" class="form-label">Success Manager</label><label class="text-danger">*</label>
        <select class="form-control" id="successManager" name="successManager" required>
            <option selected>Select Success Manager</option>
        </select>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">
            You must enter valid input
        </div>
    </div>

</div> <!-- end row -->

<h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Finance Info
</h5>
<div class="row">


    <div class="col-md-4">
        <div class="mb-3">
            <label for="billEmail" class="form-label">Billing / Finance Email</label><label class="text-danger">*</label>
            <input type="email" class="form-control" id="billEmail" name="billEmail" placeholder="Enter billing / financial email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ $advertiser->billEmail ??  old('billEmail') }}">
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
                <input type="text" disabled class="form-control" id="bank" name="bank" placeholder="Enter Bank account" value="{{ $advertiser->bank ??  old('bank') }}">
                <div class="input-group-append">
                    <button type="button" data-trigger="modal" data-target="add-bank-details-modal" class="btn btn-secondary">
                        <span class="mdi mdi-bank-plus"></span>
                    </button>
                </div>
            </div>
            <!-- <select class="form-control select2" id="product-category">
                                <option>Select Bank</option>
                                @foreach ($banks as $key => $bank)
                <option value="{{ $bank->id }}">{{ $bank->title }}</option>


            @endforeach
            </select> -->
        </div>

    </div> <!-- end col -->
    <div class="col-md-4">
        <div class="mb-3">
            <label for="paypal" class="form-label">Paypal</label>
            <input type="text" class="form-control" id="paypal" name="paypal" placeholder="Enter Paypal account" value="{{ $advertiser->paypal ??  old('paypal') }}">
        </div>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">
            You must enter valid email format
        </div>
    </div>


    <div class="col-md-4">
        <div class="mb-3">
            <label for="payoneer" class="form-label">Payoneer</label>
            <input type="text" class="form-control" id="payoneer" name="payoneer" placeholder="Enter payoneer account" value="{{ $advertiser->payoneer ??  old('payoneer') }}">
        </div>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">
            You must enter valid email format
        </div>
    </div> <!-- end col -->
</div>


<h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Documents</h5>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="billEmail" class="form-label">Document</label><label class="text-danger">*</label>
            <!-- <div class="d-flex align-items-center justify-content-center border border-2 rounded-5" style="height: 200px;">
                <i class="h1 text-muted dripicons-cloud-upload"></i>
            </div> -->
            <input type="file" class="form-control" id="file" name="document" value="{{ $advertiser->document ??  old('document') }}">
        </div>
    </div>
</div>


{{-- <!-- File Upload Code -->--}}
{{-- <div class="row">--}}
{{-- <div class="col-md-1">--}}
{{-- <!-- <label for="agreementDoc" class="mb-0 form-label">IO / Agreement</label>--}}
{{-- <p class="text-muted font-14">Recommended file format - pdf, max file size - 5mb.</p> -->--}}
{{-- <div class="card my-3 mt-xl-0">--}}
{{-- <div class="card-body">--}}
{{-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone1"--}}
{{-- data-plugin="dropzone" data-previews-container="#file-previews"--}}
{{-- data-upload-preview-template="#uploadPreviewTemplate">--}}
{{-- <div class="fallback">--}}
{{-- <!-- <input name="agreementDoc" type="file" /> -->--}}
{{-- </div>--}}

{{-- <div class="dz-message needsclick">--}}
{{-- <!-- <i class="h3 text-muted dripicons-cloud-upload"></i>--}}
{{-- <h4>IO / Agreement</h4>--}}
{{-- <h6>file name, file format - pdf or jpg, max file size-5mb</h6> -->--}}
{{-- </div>--}}
{{-- </form>--}}

{{-- <!-- Preview -->--}}
{{-- <div class="dropzone-previews mt-3" id="file-previews"></div>--}}

{{-- <!-- file preview template -->--}}
{{-- <div class="d-none" id="uploadPreviewTemplate">--}}
{{-- <div class="card mt-1 mb-0 shadow-none border">--}}
{{-- <div class="p-2">--}}
{{-- <div class="row align-items-center">--}}
{{-- <div class="col-auto">--}}
{{-- <img data-dz-thumbnail src="#"--}}
{{-- class="avatar-sm rounded bg-light" alt="">--}}
{{-- </div>--}}
{{-- <div class="col ps-0">--}}
{{-- <a href="javascript:void(0);" class="text-muted fw-bold"--}}
{{-- data-dz-name></a>--}}
{{-- <p class="mb-0" data-dz-size></p>--}}
{{-- </div>--}}
{{-- <div class="col-auto">--}}
{{-- <!-- Button -->--}}
{{-- <a href="" class="btn btn-link btn-lg text-muted"--}}
{{-- data-dz-remove>--}}
{{-- <i class="mdi mdi-close"></i>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- end file preview template -->--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- end of IO / Agreement Upload -->--}}


{{-- <div class="col-md-4">--}}
{{-- <label for="agreementDoc" class="mb-0 form-label">IO / Agreement</label>--}}
{{-- <p class="text-muted font-14">Recommended file format - pdf, max file size - 5mb.</p>--}}
{{-- <div class="card my-3 mt-xl-0">--}}
{{-- <div class="card-body">--}}
{{-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone"--}}
{{-- data-plugin="dropzone" data-previews-container="#file-previews"--}}
{{-- data-upload-preview-template="#uploadPreviewTemplate">--}}
{{-- <div class="fallback">--}}
{{-- <input name="agreementDoc" type="file"/>--}}
{{-- </div>--}}

{{-- <div class="dz-message needsclick">--}}
{{-- <i class="h3 text-muted dripicons-cloud-upload"></i>--}}
{{-- <h4>IO / Agreement</h4>--}}
{{-- <h6>file name, file format - pdf or jpg, max file size-5mb</h6>--}}
{{-- </div>--}}
{{-- </form>--}}

{{-- <!-- Preview -->--}}
{{-- <div class="dropzone-previews mt-3" id="file-previews"></div>--}}

{{-- <!-- file preview template -->--}}
{{-- <div class="d-none" id="uploadPreviewTemplate">--}}
{{-- <div class="card mt-1 mb-0 shadow-none border">--}}
{{-- <div class="p-2">--}}
{{-- <div class="row align-items-center">--}}
{{-- <div class="col-auto">--}}
{{-- <img data-dz-thumbnail src="#"--}}
{{-- class="avatar-sm rounded bg-light" alt="">--}}
{{-- </div>--}}
{{-- <div class="col ps-0">--}}
{{-- <a href="javascript:void(0);" class="text-muted fw-bold"--}}
{{-- data-dz-name></a>--}}
{{-- <p class="mb-0" data-dz-size></p>--}}
{{-- </div>--}}
{{-- <div class="col-auto">--}}
{{-- <!-- Button -->--}}
{{-- <a href="" class="btn btn-link btn-lg text-muted"--}}
{{-- data-dz-remove>--}}
{{-- <i class="mdi mdi-close"></i>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- end file preview template -->--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- end of IO / Agreement Upload -->--}}


{{-- <!-- Start of Upload Document -->--}}
{{-- <div class="col-md-4">--}}
{{-- <label for="document" class="mb-0 form-label">Upload Documents</label>--}}
{{-- <p class="text-muted font-14">Recommended file format - pdf, max file size - 5mb.</p>--}}
{{-- <div class="card my-3 mt-xl-0">--}}
{{-- <div class="card-body">--}}
{{-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone2"--}}
{{-- data-plugin="dropzone" data-previews-container="#file-previews"--}}
{{-- data-upload-preview-template="#uploadPreviewTemplate">--}}
{{-- <div class="fallback">--}}
{{-- <input name="document" type="file"/>--}}
{{-- </div>--}}

{{-- <div class="dz-message needsclick">--}}
{{-- <i class="h3 text-muted dripicons-cloud-upload"></i>--}}
{{-- <h4>Upload Documents</h4>--}}
{{-- <h6>file name, file format - pdf or jpg, max file size-5mb</h6>--}}
{{-- </div>--}}
{{-- </form>--}}

{{-- <!-- Preview -->--}}
{{-- <div class="dropzone-previews mt-3" id="file-previews"></div>--}}

{{-- <!-- file preview template -->--}}
{{-- <div class="d-none" id="uploadPreviewTemplate">--}}
{{-- <div class="card mt-1 mb-0 shadow-none border">--}}
{{-- <div class="p-2">--}}
{{-- <div class="row align-items-center">--}}
{{-- <div class="col-auto">--}}
{{-- <img data-dz-thumbnail src="#"--}}
{{-- class="avatar-sm rounded bg-light" alt="">--}}
{{-- </div>--}}
{{-- <div class="col ps-0">--}}
{{-- <a href="javascript:void(0);" class="text-muted fw-bold"--}}
{{-- data-dz-name></a>--}}
{{-- <p class="mb-0" data-dz-size></p>--}}
{{-- </div>--}}
{{-- <div class="col-auto">--}}
{{-- <!-- Button -->--}}
{{-- <a href="" class="btn btn-link btn-lg text-muted"--}}
{{-- data-dz-remove>--}}
{{-- <i class="mdi mdi-close"></i>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- end file preview template -->--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- End of Upload Document -->--}}

{{-- </div>--}}
{{-- <!-- end of file uploading -->--}}


<div class="row">
    <button class="btn btn-primary" type="submit">Submit</button>
    <a href="{{ route('advertiser.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
</div>