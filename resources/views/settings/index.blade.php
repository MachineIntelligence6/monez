@extends('layouts.vertical', ['title' => 'Finances'])

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Monez</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
                <h4 class="page-title">Default Settings</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Financial Year</h4>
                    <p>January to December</p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Date Formate (Sitewide)</h4>
                    <p>DDMMYYYY</p>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Language </h4>
                    <p>English - UK</p>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Timezone </h4>
                    <p>GMT</p>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <h4>Notifications </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Partners</label>
                                <select class="form-control mySelect2" id="selectPartners" name="" required>
                                    <option>Select Partners</option>
                                    <option value="">All</option>
                                    <option value="">All Publishers</option>
                                    <option value="">All Advertisers</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Request Type</label>
                                <select class="form-control mySelect2" id="requestType" name="" required>
                                    <option>Select Request Type</option>
                                    <option value="io">IO</option>
                                    <option value="documents">Documents</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group documentType">
                                <label>Document Type</label>
                                <input type="text" class="form-control" placeholder="Document type" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="mt-3">
                                <button class="btn btn-info">Send</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <h4>Newsletter </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" placeholder="Subject" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="body..." id="" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="mt-3">
                                <button class="btn btn-info">Send</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <h4>Custom Message</h4>
                        <button class="btn btn-secondary addCustomFieldBtn"><i class="mdi mdi-plus"></i></button>
                    </div>
                    <div class="dynamicFeilds row">
                        <div class="appendFieldWrapper mb-3 col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control mySelect2" name="" data-toggle="select2" required>
                                        <option>Select Partners</option>
                                        <option value="">All</option>
                                        <option value="">All Publishers</option>
                                        <option value="">All Advertisers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <textarea class="form-control" placeholder="message..." id="" style="height: 100px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 t">
                                    <div class="mt-3">
                                    <button class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="mt-3">
                                        <button class="btn btn-info">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

    @endsection

    @section('script-bottom')
    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>


    <script src="{{asset('assets/js/pages/dashboard-1.init.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.mySelect2').select2();
        });
    </script>

    <script>
        // $('.datepicker').datepicker({
        //     format: 'dd/mm/yyyy'
        // });

        $('#requestType').change(function() {
            if ($(this).val() == 'documents') {
                $('.documentType').css('display', 'block');
            } else {
                $('.documentType').css('display', 'none');
            }
        });

        $('.addCustomFieldBtn').click(function() {
            var clone = $('.appendFieldWrapper').clone();
            clone.removeClass('appendFieldWrapper');
            $('.dynamicFeilds').append(clone);
        });
    </script>
    @endsection