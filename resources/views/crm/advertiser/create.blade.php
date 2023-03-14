@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i> Account Info</h5>
                <form class="needs-validation" method="post" action="{{ route('advertiser.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="dbaId" class="form-label">Advertiser ID</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="dbaId" name="dbaId" placeholder="Enter Advertiser ID" required pattern="[a-z0-9\.]+" />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company / Legal Name</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter Company / Legal Name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="regId" class="form-label">Registration / National ID</label>
                                <input type="number" class="form-control" id="regId" name="regId" placeholder="Enter Registration / National ID">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="vat" class="form-label">VAT ID</label>
                                <input type="text" class="form-control" id="vat" name="vat" placeholder="Enter VAT">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="url" class="form-label">Website</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="website-url-input" name="url" placeholder="Enter website url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="accEmail" class="form-label">Account Email</label><label class="text-danger">*</label>
                                <input type="email" class="form-control" id="accEmail" name="accEmail" placeholder="Enter account email" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="confemail" class="form-label">Confirm Email</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" name="" placeholder="Enter confirm account email" required id="confemail" onblur="confirmEmail()">

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
                                    Your password must contain least 8 characters, at least one number and one uppercase and lowercase letter.
                                </div>




                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address</label><label class="text-danger">*</label>
                                <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter address line 1" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter address line 2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">City</label><label class="text-danger">*</label>
                                <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                                <input type="text" class="form-control" id="city" name="city_id" placeholder="Enter city" required>
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
                                <input type="text" class="form-control" id="state_id" name="state_id" placeholder="Enter state / province">
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
                                <input type="number" class="form-control" id="zipCode" name="zipCode" placeholder="Enter zip / code">
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
                                <input type="text" class="form-control" id="amFirstName" name="amFirstName" placeholder="Enter first name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amLastName" class="form-label">Last Name</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="amLastName" name="amLastName" placeholder="Enter last name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amEmail" class="form-label"> Email</label><label class="text-danger">*</label>
                                <input type="email" class="form-control" id="amEmail" name="amEmail" placeholder="Enter email" required>
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
                                    <input type="text" class="form-control" id="amSkype" name="amSkype" placeholder="@username">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amLinkedIn" class="form-label">Linkedin</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                    <input type="url" class="form-control" id="amLinkedIn" name="amLinkedIn" placeholder="Url">
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
                                <input type="text" id="basic-datepicker" class="form-control" placeholder="Basic datepicker" name="AgreementStartDate" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must select valid date.
                                </div>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="revSharePer" class="form-label">Revenue Share (%)</label><label class="text-danger">*</label>
                                <input type="number" class="form-control" id="revSharePer" name="revSharePer" placeholder="Enter Revenue Share (%)" required>
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
                                <input type="email" class="form-control" id="reportEmail" name="reportEmail" placeholder="Enter reporting email" required>
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
                                <input type="text" class="form-control" disabled id="reportType" name="reportType" placeholder="Add report type" required>
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
                                <input type="text" class="form-control" disabled id="reportColumns" name="reportColumns" placeholder="Define report columns" required>
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
                                <input type="email" class="form-control" id="billEmail" name="billEmail" placeholder="Enter billing / financial email" required>
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
                                    <input type="text" disabled class="form-control" id="bank" name="bank" placeholder="Enter Bank account">
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
                                <input type="text" class="form-control" id="paypal" name="paypal" placeholder="Enter Paypal account">
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid email format
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="payoneer" class="form-label">Payoneer</label>
                                <input type="text" class="form-control" id="payoneer" name="payoneer" placeholder="Enter payoneer account">
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
                                <input type="file" class="form-control" id="file" name="document">
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
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-bank-details-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <div class="modal-header">
                <h5 class="mb-3 text-uppercase modal-title"><i class="mdi mdi-bank mr-2"></i>Add Bank Details</h5>
                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="beneficiaryName" class="form-label">Beneficiary Name</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="beneficiaryName" name="beneficiaryName" placeholder="Enter Beneficiary Name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="beneficiaryAddress" class="form-label">Beneficiary Full Address</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="beneficiaryAddress" name="beneficiaryAddress" placeholder="Enter Beneficiary Address" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="bankName" class="form-label">Bank Name</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Enter Bank name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="bankAddress" class="form-label">Bank Full Address</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="bankAddress" name="bankAddress" placeholder="Enter Bank Address" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label for="accountNumber" class="form-label">Account Number</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Enter Bank account number" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="routingNumber" class="form-label">Routing Number</label><label class="text-danger">*</label>
                            <input type="number" class="form-control" id="routingNumber" name="routingNumber" placeholder="Enter Routing number" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="iban" class="form-label">IBAN</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="iban" name="iban" placeholder="Enter IBAN" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="swift" class="form-label">SWIFT</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="swift" name="swift" placeholder="" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label><label class="text-danger">*</label>
                            <select class="form-control" id="currency" name="currency" required>
                                <option selected>Select Currency</option>
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Details</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="report-type-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="#" method="post" class="modal-content shadow shadow-5">
            <div class="modal-header">
                <h5 class="mb-3 text-uppercase modal-title">Add Report Details</h5>
                <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="reportType" class="form-label">Type</label><label class="text-danger">*</label>
                        <select class="form-control" id="report-type-input" name="reportType" required>
                            <option value="" selected>Report Type</option>
                            <option value="api">API</option>
                            <option value="email">EMAIL</option>
                            <option value="gdrive">Google Drive</option>
                            <option value="dashboard">Dashboard</option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-none report-creds-input api-input-group">
                        <label for="apiKey" class="form-label">API Key</label><label class="text-danger">*</label>
                        <input type="text" class="form-control" id="apiKey" name="apiKey">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-none report-creds-input dashboard-input-group">
                        <label for="dashboardPath" class="form-label">Dashboard Path</label><label class="text-danger">*</label>
                        <input type="text" class="form-control" id="dashboardPath" name="dashboardPath">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                        <label for="email" class="form-label">Email</label><label class="text-danger">*</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                        <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password-input-field" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text btn">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                        <label for="gdriveEmail" class="form-label">GDrive Email</label><label class="text-danger">*</label>
                        <input type="email" class="form-control" id="gdriveEmail" name="gdriveEmail">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                        <label for="gdrivePassword" class="form-label">GDrive Password</label><label class="text-danger">*</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password-input-field" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text btn">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Details</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="define-report-columns-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="#" method="post" class="modal-content shadow shadow-5">
            <div class="modal-header">
                <h5 class="mb-3 text-uppercase modal-title">Add Report Columns</h5>
                <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dateKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="date" id="dateKey" name="dateKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dateColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="dateColValue" name="dateColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="feedKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="feed" id="feedKey" name="feedKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="feedColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="feedColValue" name="feedColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subidKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="subid" id="subidKey" name="subidKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subidColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="subidColValue" name="subidColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="countryKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="country" id="countryKey" name="countryKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="countryColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="countryColValue" name="countryColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="totalSearchesKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="total searches" id="totalSearchesKey" name="totalSearchesKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="totalSearchesColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="totalSearchesColValue" name="totalSearchesColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="monitizedSearchesKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="monitized searches" id="monitizedSearchesKey" name="monitizedSearchesKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="monitizedSearchesColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="monitizedSearchesColValue" name="monitizedSearchesColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="paidClicksKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="paid clicks" id="paidClicksKey" name="paidClicksKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="paidClicksColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="paidClicksColValue" name="paidClicksColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="revenueKey" class="form-label">Key</label>
                        <input type="text" class="form-control" disabled value="revenue" id="revenueKey" name="revenueKey" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="revenueColValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="revenueColValue" name="revenueColValue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Details</button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')

<script>
    const passwordCharset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    const specialChars = "!$%#^&|?"

    function generateNewPassword() {
        var passwordLength = Math.floor(Math.random() * 16);
        if (passwordLength < 8) passwordLength += 8;
        var password = "";
        for (var i = 0, n = passwordCharset.length; i < passwordLength; ++i) {
            password += passwordCharset.charAt(Math.floor(Math.random() * n));
        }
        password += specialChars[Math.floor(Math.random() * specialChars.length)]
        document.getElementById("password-input-field").value = password;
    }
    generateNewPassword();


    document.getElementById("country-code-input")
        .addEventListener("change", (e) => {
            let phoneCode = e.target.options[e.target.selectedIndex].getAttribute("phone-code");
            document.getElementById("phone-code-dropdown").value = phoneCode;
        })

    const allModals = document.querySelectorAll(".modal");
    for (let i = 0; i < allModals.length; i++) {
        const modal = allModals[i];
        let dismissBtns = modal.querySelectorAll('[data-dismiss="modal"]');
        for (let j = 0; j < dismissBtns.length; j++) {
            dismissBtns[j].addEventListener("click", () => {
                modal.classList.remove("show");
                modal.style.display = "none"
            })
        }
    }

    const modalTriggerBtns = document.querySelectorAll('[data-trigger="modal"]');
    for (let i = 0; i < modalTriggerBtns.length; i++) {
        modalTriggerBtns[i].addEventListener("click", () => {
            let modal = document.getElementById(modalTriggerBtns[i].getAttribute("data-target"))
            modal.classList.add("show");
            modal.style.display = "block"
        })
    }


    //Report Type Popup Script
    const reportTypeModal = document.getElementById("report-type-modal");
    const reportCredsInputs = reportTypeModal.getElementsByClassName("report-creds-input");
    console.log("ALi " + reportTypeModal.querySelector("#report-type-input"))
    reportTypeModal.querySelector("#report-type-input")
        .addEventListener("change", (e) => {
            for (let i = 0; i < reportCredsInputs.length; i++) {
                reportCredsInputs[i].classList.add("d-none");
                reportCredsInputs[i].querySelector("input").setAttribute("required", false);
            }
            if (e.target.value !== "") {
                reportTypeModal.getElementsByClassName(e.target.value + "-input-group")
                    .forEach((inpGroup) => {
                        inpGroup.classList.remove("d-none");
                        inpGroup.querySelector("input").setAttribute("required", true);
                    })
            }
        })
</script>
<!-- Plugins js-->
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection