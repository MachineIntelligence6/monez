@extends('layouts.vertical', ['title' => 'Default Settings'])

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
                    <h4>Date Format</h4>
                    <p>DDMMMYYYY</p>
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
                        <div class="col-md-12 mb-3">
                            <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-notifications" data-toggle="select2">
                                <option>Select Partners</option>
                                <option value="">All</option>
                                <option value="">All Publishers</option>
                                <option value="">All Advertisers</option>
                                <option value="select-custom">Select Custom</option>
                            </select>
                            <div id="partners-dropdown-notifications" class="dropdown-menu w-100" data-searchable="true">
                                <div class="px-2">
                                    <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="notificationsPartner1">
                                        <label class="custom-control-label w-100" for="notificationsPartner1">Partner 1</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="notificationsPartner2">
                                        <label class="custom-control-label w-100" for="notificationsPartner2">Partner 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <select class="form-control" id="requestType" data-toggle="select2">
                                <option>Select Request Type</option>
                                <option value="io">IO</option>
                                <option value="documents">Documents</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control d-none" id="documentName" placeholder="Document Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="mt-3">
                                <button class="btn btn-primary">Send</button>
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
                                <button class="btn btn-primary">Send</button>
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
                        <button class="btn btn-secondary" onclick="appendNewCustomMessage()"><i class="mdi mdi-plus"></i></button>
                    </div>
                    <div id="customMessagesContainer" class="row">
                        <div class="mb-3 col-md-6" id="customMessageSample">
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-message" data-toggle="select2">
                                        <option>Select Partners</option>
                                        <option value="">All</option>
                                        <option value="">All Publishers</option>
                                        <option value="">All Advertisers</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="partners-dropdown-message" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="messagePartner1">
                                                <label class="custom-control-label w-100" for="messagePartner1">Partner 1</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="messagePartner2">
                                                <label class="custom-control-label w-100" for="messagePartner2">Partner 2</label>
                                            </div>
                                        </div>
                                    </div>
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
                                        <button class="btn btn-primary">Send</button>
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
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script src="{{asset('assets/js/custom/custom-multiselect-dropdown.js')}}"></script>


    <script>
        $(document).ready(function() {
            $('.mySelect2').select2();
        });
    </script>

    <script>
        // $('.datepicker').datepicker({
        //     format: 'dd/mm/yyyy'
        // });

        function select2Refresh() {
            $("select[data-toggle='select2']").select2();
        }

        $('#requestType').change(function() {
            if ($(this).val() == 'documents') {
                $('#documentName').removeClass("d-none");
            } else {
                $('#documentName').addClass("d-none");
            }
        });


        let messagesContainer = document.getElementById('customMessagesContainer');
        let sample = messagesContainer.querySelector('#customMessageSample');

        function appendNewCustomMessage() {
            // let element = sample.cloneNode(true);
            // element.id = ""
            // element.querySelectorAll("input").forEach((inp) => inp.value = "");
            // messagesContainer.appendChild(element);
            let element = document.createElement("div");
            element.classList = "mb-3 col-md-6";
            let idx = messagesContainer.children.length;
            element.innerHTML = `
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-message-${idx}" data-toggle="select2">
                            <option>Select Partners</option>
                            <option value="">All</option>
                            <option value="">All Publishers</option>
                            <option value="">All Advertisers</option>
                            <option value="select-custom">Select Custom</option>
                        </select>
                        <div id="partners-dropdown-message-${idx}" class="dropdown-menu w-100" data-searchable="true">
                            <div class="px-2">
                                <input type="text" class="form-control dropdown-search-input" placeholder="search">
                            </div>
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="messagePartner1">
                                    <label class="custom-control-label w-100" for="messagePartner1">Partner 1</label>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="messagePartner2">
                                    <label class="custom-control-label w-100" for="messagePartner2">Partner 2</label>
                                </div>
                            </div>
                        </div>
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
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>`;
            messagesContainer.appendChild(element);
            select2Refresh();
            refreshCustomMultiSelect();
        }

        function removeElementFromContainer(target, sampleId) {
            let parameter = target.parentNode.parentNode;
            if (parameter.id === sampleId) return;
            parameter.remove();
        }
    </script>
    @endsection