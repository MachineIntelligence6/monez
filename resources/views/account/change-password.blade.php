@extends('layouts.vertical', ['title' => 'Change Password'])
@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-4">
                    <h5 class="mb-3 text-uppercase">
                        Change Password
                    </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">Old Password</label><label class="text-danger">*</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-input-field" class="form-control" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" required>
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text btn">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        Your password must contain least 8 characters, at least one number and one uppercase and lowercase
                                        letter.
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label><label class="text-danger">*</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-input-field" class="form-control" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" required>
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text btn">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        Your password must contain least 8 characters, at least one number and one uppercase and lowercase
                                        letter.
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm New Password</label><label class="text-danger">*</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-input-field" class="form-control" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" required>
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text btn">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        Your password must contain least 8 characters, at least one number and one uppercase and lowercase
                                        letter.
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
                <div class="row mt-2 px-2">
                    <button class="btn btn-primary" type="submit">Change Passowrd</button>
                    <a href="{{ route('advertiser.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>


@endsection