@extends('layouts.vertical', ['title' => 'Advertisers Profile'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3 text-uppercaset"><i class="mdi mdi-office-building me-1"></i> Advertiser Info</h4>
                <form class="needs-validation" method="POST" action="{{ route('advertiser.update', [$advertiser->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="dbaId" class="form-label">Advertiser ID</label>
                                <input type="text" class="form-control" id="dbaId" name="dbaId" placeholder="Enter Advertiser ID" value="{{ $advertiser->dbaId ??  old('dbaId') }}" required>
                                <div class="invalid-feedback">
                                    Please choose a advertiser ID.
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company / Legal Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter Company / Legal Name" value="{{ $advertiser->companyName ?? old('companyName') }}" required>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="regId" class="form-label">Registration / National ID</label>
                                <input type="text" class="form-control" id="regId" name="regId" placeholder="Enter Registration / National ID" value="{{ $advertiser->regId ??  old('regId') }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="vat" class="form-label">VAT</label>
                                <input type="text" class="form-control" id="vat" name="vat" placeholder="Enter VAT" value="{{ $advertiser->vat ??  old('vat') }}" required>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="url" class="form-label">Website</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="Enter website url" value="{{ $advertiser->url ??  old('url') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="reportEmail" class="form-label">Reporting Email</label>
                                <input type="email" class="form-control" id="reportEmail" name="reportEmail" placeholder="Enter reporting email" value="{{ $advertiser->reportEmail ??  old('reportEmail') }}" required>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="accEmail" class="form-label">Account Email</label>
                                <input type="email" class="form-control" id="accEmail" name="accEmail" placeholder="Enter account email" value="{{ $advertiser->accEmail ??  old('accEmail') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="billEmail" class="form-label">Billing / Finance Email</label>
                                <input type="email" class="form-control" id="billEmail" name="billEmail" placeholder="Enter billing / financial email" value="{{ $advertiser->billEmail ??  old('billEmail') }}">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address</label>
                                <!-- <label for="cwebsite" class="form-label">Address Line 1</label> -->
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter address line 1" value="{{ $advertiser->address1 ??  old('address1') }}" required>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">

                                <!-- <label for="companyname" class="form-label">Address Line 2</label> -->
                                <input type="text" class="form-control" style="margin-top: 28px" id="address2" name="address2" placeholder="Enter address line 2" value="{{ $advertiser->address2 ??  old('address2') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3" style="margin-top: 28px">
                                <!-- <label for="product-category" class="form-label">Country <span class="text-danger"></span></label> -->
                                <select class="form-control select2" id="country_id" required>
                                    <option>Select Country</option>
                                    @foreach ($countries as $key => $country)
                                    <option value="{{ $country->id }}" @if(isset($advertiser) && $advertiser->country_id == $country->id )
                                        selected="selected"
                                        @endif>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                    <!-- Personal Info -->
                    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info (AM)
                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="amFirstName" name="amFirstName" placeholder="Enter first name" value="{{ $advertiser->amFirstName ??  old('amFirstName') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="amLastName" name="amLastName" placeholder="Enter last name" value="{{ $advertiser->amLastName ??  old('amLastName') }}" required>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amEmail" class="form-label"> Email</label>
                                <input type="email" class="form-control" id="amEmail" name="amEmail" placeholder="Enter email" value="{{ $advertiser->amEmail ??  old('amEmail') }}">
                            </div>
                        </div>
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amPhone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="amPhone" name="amPhone" placeholder="Enter phone number" value="{{ $advertiser->amPhone ??  old('amPhone') }}">
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
                                    <input type="text" class="form-control" id="amLinkedIn" name="amLinkedIn" placeholder="Url" value="{{ $advertiser->amLinkedIn ??  old('amLinkedIn') }}">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                    <!-- Agreement & Terms -->
                    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building me-1"></i>Agreement & Terms
                    </h5>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="revSharePer" class="form-label">Revenue Share (%)</label>
                                <input type="text" class="form-control" id="revSharePer" name="revSharePer" placeholder="Enter Revenue Share (%)" value="{{ $advertiser->revSharePer ??  old('revSharePer') }}">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <!-- <label for="paymentTerms" class="form-label">Payment Terms</label> -->
                                <label for="paymentTerms" class="form-label">Payment Terms <span class="text-danger"></span></label>
                                <select class="form-control select2" id="paymentTerms" name="paymentTerms">
                                    <option>Select Payment Term</option>
                                    <option value="SH1">Net 15 %</option>
                                    <option value="SH1">Net 30 %</option>
                                    <option value="SH1">Net 45 %</option>
                                    <option value="SH1">Net 60 %</option>
                                </select>

                                <!-- <input type="text" class="form-control" id="paymentTerms" name="paymentTerms" placeholder="Enter Payment Terms here ..."> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pbank" class="form-label">Bank <span class="text-danger"></span></label>
                                <input type="text" class="form-control" id="bank" name="bank" placeholder="Enter Bank account" value="{{ $advertiser->revSharePer ??  old('revSharePer') }}">
                                <!-- <select class="form-control select2" id="product-category">
                                <option>Select Bank</option>
{{--                                @foreach ($banks as $key => $bank)--}}
{{--                                        <option value="{{ $bank->id }}">{{ $bank->title }}</option>--}}
{{--                                    @endforeach--}}
                                    </select> -->
                            </div>

                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="payoneer" class="form-label">Payoneer</label>
                                <input type="text" class="form-control" id="payoneer" name="payoneer" placeholder="Enter payoneer account" value="{{ $advertiser->payoneer ??  old('payoneer') }}">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="paypal" class="form-label">Paypal</label>
                                <input type="text" class="form-control" id="paypal" name="paypal" placeholder="Enter Paypal account" value="{{ $advertiser->paypal ??  old('paypal') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes / Comments</label>
                                <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter notes / comments" value="{{ $advertiser->notes ??  old('notes') }}">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="AgreementStartDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="AgreementStartDate" name="AgreementStartDate" value="{{ $advertiser->agreement_start_date ??  old('AgreementStartDate') }}">
                                <div class="invalid-feedback">
                                    You must select valid date.
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->

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
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('advertiser.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection