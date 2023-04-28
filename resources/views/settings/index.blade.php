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
                <form method="POST" action="{{ route('store.notification') }}">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <h4>Notifications </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <!-- <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-notifications" data-toggle="select2">
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
                                </div> -->
                                <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-notifications" data-toggle="select2">
                                    <option>Select Partners</option>
                                    <option value="all">All</option>
                                    <option value="publishers">All Publishers</option>
                                    <option value="advertisers">All Advertisers</option>
                                    <option value="select-custom">Select Custom</option>
                                </select>
                                <div id="partners-dropdown-notifications" style="max-height: 300px; overflow-y: scroll;" class="dropdown-menu w-100" data-searchable="true">
                                    <div class="px-2">
                                        <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                    </div>
                                    @foreach ($publishers as $key => $publisher)
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="custom_users[]" id="notificationpub{{$publisher->id}}" value="p_{{$publisher->id}}">
                                            <label class="custom-control-label w-100" for="notificationpub{{$publisher->id}}">{{$publisher->companyName}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($advertisers as $key => $advertiser)
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="custom_users[]" id="notificationadv{{$advertiser->id}}" value="a_{{$advertiser->id}}">
                                            <label class="custom-control-label w-100" for="notificationadv{{$advertiser->id}}">{{$advertiser->companyName}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <select class="form-control requestType" name="requestType" data-toggle="select2">
                                    <option>Select Request Type</option>
                                    <option value="ios">IO</option>
                                    <option value="documents">Documents</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="documentName" name="document_name" placeholder="Document Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="mt-3">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </form>
            </div> <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-md-6">
            <div class="card h-100">
                <form action="{{ route('sendnewsletter') }}">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <h4>Newsletter </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <!-- <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-newsletter" data-toggle="select2">
                                <option>Select Partners</option>
                                <option value="">All</option>
                                <option value="">All Publishers</option>
                                <option value="">All Advertisers</option>
                                <option value="select-custom">Select Custom</option>
                            </select>
                            <div id="partners-dropdown-newsletter" class="dropdown-menu w-100" data-searchable="true">
                                <div class="px-2">
                                    <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newsletterPartner1">
                                        <label class="custom-control-label w-100" for="newsletterPartner1">Partner 1</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newsletterPartner2">
                                        <label class="custom-control-label w-100" for="newsletterPartner2">Partner 2</label>
                                    </div>
                                </div>
                            </div> -->
                                <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-newsletter" data-toggle="select2">
                                    <option>Select Partners</option>
                                    <option value="all">All</option>
                                    <option value="publishers">All Publishers</option>
                                    <option value="advertisers">All Advertisers</option>
                                    <option value="select-custom">Select Custom</option>
                                </select>
                                <div id="partners-dropdown-newsletter" style="max-height: 300px; overflow-y: scroll;" class="dropdown-menu w-100" data-searchable="true">
                                    <div class="px-2">
                                        <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                    </div>
                                    @foreach ($publishers as $key => $publisher)
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="custom_users[]" id="newsletterpub{{$publisher->id}}" value="p_{{$publisher->id}}">
                                            <label class="custom-control-label w-100" for="newsletterpub{{$publisher->id}}">{{$publisher->companyName}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($advertisers as $key => $advertiser)
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="custom_users[]" id="newsletteradv{{$advertiser->id}}" value="a_{{$advertiser->id}}">
                                            <label class="custom-control-label w-100" for="newsletteradv{{$advertiser->id}}">{{$advertiser->companyName}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="content" name="content"></textarea>
                                </div>

                                <!-- <div class="form-group">
                                    <div id="sumoeditor" name="sumoeditor">

                                    </div>
                                </div> -->
                                <!-- <input type="hidden" id="sumoeditor-value" value="" name="sumoeditor_value" /> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <!-- <form action="{{ route('sendnewsletter')}}"> -->
                                <div class="mt-3">
                                    <button class="btn btn-primary">Send</button>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </form>
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
                        <h4>Custom Messages</h4>
                        <button class="btn btn-secondary" onclick="appendNewCustomMessage()"><i class="mdi mdi-plus"></i></button>
                    </div>
                    <div id="customMessagesContainer" class="row">

                    @if(isset($custommessages) && count($custommessages) > 0)
                       
                        @foreach ($custommessages as $key => $custommessage)

                        @php
                        $pub_ids = [];
                        $adv_ids = [];
                        $selectedOptions = explode(',', $custommessage->recipient_ids);

                        foreach ($selectedOptions as $selectedOption) {
                        $parts = explode('_', $selectedOption);
                        if ($parts[0] === 'p') {
                        $pub_ids[] = $parts[1];
                        } elseif ($parts[0] === 'a') {
                        $adv_ids[] = $parts[1];
                        }
                        }


                        @endphp


                        <form method="POST" novalidate action="{{ route('update.custommessage', ['customMessage'=>$custommessage->id]) }}" class="mb-3 col-md-6 custom-message needs-validation" @if($key=="0" ) id="customMessageSample" @endif>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-message-{{$key}}" data-toggle="select2">
                                        <option value="all" @if(isset($custommessage) && $custommessage->recipient_type == 'all') selected @endif>All</option>
                                        <option value="publishers" @if(isset($custommessage) && $custommessage->recipient_type == 'publishers') selected @endif>All Publishers</option>
                                        <option value="advertisers" @if(isset($custommessage) && $custommessage->recipient_type == 'advertisers') selected @endif>All Advertisers</option>
                                        <option value="select-custom" @if(isset($custommessage) && $custommessage->recipient_type == 'custom') selected @endif>Select Custom</option>
                                    </select>
                                    <div id="partners-dropdown-message-{{$key}}" style="max-height: 300px; overflow-y: scroll;" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        @foreach ($publishers as $key => $publisher)
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="msg_custom_users[]" @if(in_array($publisher->id, $pub_ids)) checked @endif id="messagePartnerpub{{$publisher->id}}_{{$custommessage->id}}" value="p_{{$publisher->id}}">
                                                <label class="custom-control-label w-100" for="messagePartnerpub{{$publisher->id}}_{{$custommessage->id}}">{{$publisher->companyName}}</label>
                                            </div>
                                        </div>

                                        @endforeach
                                        @foreach ($advertisers as $key => $advertiser)
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="msg_custom_users[]" @if(in_array($advertiser->id, $adv_ids)) checked @endif id="messagePartneradv{{$advertiser->id}}_{{$custommessage->id}}" value="a_{{$advertiser->id}}">
                                                <label class="custom-control-label w-100" for="messagePartneradv{{$advertiser->id}}_{{$custommessage->id}}">{{$advertiser->companyName}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <textarea class="form-control" name="message" placeholder="message..." id="" style="height: 100px" required>{{old('message', $custommessage->message ?? '')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 t">
                                    <div class="mt-3">
                                        <!-- <form action="{{route('destroy.custommessage', ['customMessage'=>$custommessage->id])}}" method="POST">
                                            @csrf
                                            @method('POST') -->
                                        <button class="btn btn-danger deleteProduct" id="deleteCustomMsg" msg-id="{{$custommessage->id}}" type="button" onclick="removeElementFromContainer(this)"><i class="mdi mdi-trash-can"></i></button>
                                        <!-- </form> -->
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="mt-3">
                                        <button class="btn btn-primary">update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- <form action="{{route('destroy.custommessage', ['customMessage'=>$custommessage->id])}}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger" type="submit" ><i class="mdi mdi-trash-can"></i></button>
                                            </form> -->
                        @endforeach

                        @else
                        <form method="POST" action="{{ route('store.custommessage') }}" class="mb-3 col-md-6 custom-message needs-validation" id="customMessageSample">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-message" data-toggle="select2" required>
                                        <option>Select Partners</option>
                                        <option value="all">All</option>
                                        <option value="publishers">All Publishers</option>
                                        <option value="advertisers">All Advertisers</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="partners-dropdown-message" style="max-height: 300px; overflow-y: scroll;" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        @foreach ($publishers as $key => $publisher)
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="custom_users[]" id="messagePartnerpub{{$publisher->id}}" value="p_{{$publisher->id}}">
                                                <label class="custom-control-label w-100" for="messagePartnerpub{{$publisher->id}}">{{$publisher->companyName}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach ($advertisers as $key => $advertiser)
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="custom_users[]" id="messagePartneradv{{$advertiser->id}}" value="a_{{$advertiser->id}}">
                                                <label class="custom-control-label w-100" for="messagePartneradv{{$advertiser->id}}">{{$advertiser->companyName}}</label>
                                            </div>
                                        </div>
                                        @endforeach

                                        <!-- <div class="dropdown-item">
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
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <textarea class="form-control" name="message" placeholder="message..." id="" style="height: 100px" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 t">
                                    <div class="mt-3">
                                        <button class="btn btn-danger" type="button" onclick="removeElementFromContainer(this)"><i class="mdi mdi-trash-can"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="mt-3">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif



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
    <!-- <script src="{{asset('assets/libs/summernote/summernote.min.js')}}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>




    <script>
        $(document).ready(function() {
            $('.mySelect2').select2();
            $('#content').summernote({
                height: 230, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });

        });

        $(".note-btn.dropdown-toggle").click(() => {
            $(".note-dropdown-menu").addClass("show");
        })
    </script>

    <script>
        // $('#sumoeditor').summernote({
        //     height: 230, // set editor height
        //     minHeight: null, // set minimum height of editor
        //     maxHeight: null, // set maximum height of editor
        //     focus: false // set focus to editable area after initializing summernote
        // });
        // $('#getSumoEditorValue').on('click', function() {
        //     let body = $(".note-editable").html();
        //     $("#sumoeditor-value").val(body);

        // });

        function select2Refresh() {
            $("select[data-toggle='select2']").select2();
        }

        $('.requestType').on("change", function() {
            console.log($(this).val())
            if ($(this).val() == 'documents') {
                $('#documentName').removeClass("d-none");
            } else {
                $('#documentName').addClass("d-none");
            }
        });


        let messagesContainer = document.getElementById('customMessagesContainer');
        let sample = messagesContainer.querySelector('#customMessageSample');
        var jsonData = <?php echo $jsonData; ?>;
        let formaction = "<?php echo route('store.custommessage') ?>"



        function appendNewCustomMessage() {
            // let element = sample.cloneNode(true);
            // element.id = ""
            // element.querySelectorAll("input").forEach((inp) => inp.value = "");
            // messagesContainer.appendChild(element);
            // 
            // console.log(jsonData.publishers);
            // console.log(jsonData.advertisers);
            let element = document.createElement("form");
            element.action = formaction;
            element.method = "POST";
            element.classList = "mb-3 col-md-6 custom-message needs-validation";
            element.noValidate = true;
            let idx = messagesContainer.children.length;


            element.innerHTML = `
                            @csrf
                <div class="row">
                        <div class="col-md-12">
                            <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-message-${idx}" data-toggle="select2" required>
                                <option>Select Partners</option>
                                <option value="all">All</option>
                                <option value="publishers">All Publishers</option>
                                <option value="advertisers">All Advertisers</option>
                                <option value="select-custom">Select Custom</option>
                            </select>
                            <div id="partners-dropdown-message-${idx}" style="max-height: 300px; overflow-y: scroll;" class="dropdown-menu w-100" data-searchable="true">
                                <div class="px-2">
                                    <input type="text" class="form-control dropdown-search-input" placeholder="search" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <textarea name="message" class="form-control" placeholder="message..." id="" style="height: 100px" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 t">
                            <div class="mt-3">
                                <button class="btn btn-danger" type="button" onclick="removeElementFromContainer(this)"><i class="mdi mdi-trash-can"></i></button>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="mt-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                  `;

            messagesContainer.appendChild(element);

            let dropdown = $(messagesContainer).find(".custom-message").find(`#partners-dropdown-message-${idx}`);
            console.log(dropdown)
            jsonData.publishers.forEach((item) => {
                $(dropdown).append(
                    `
                                        <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="msg_custom_users[]"  class="custom-control-input" id="p_${item.id}" value="p_${item.id}"/>
                                        <label class="custom-control-label w-100" for="p_${item.id}">${item.companyName}</label>
                                    </div>
                                </div>
                                        `
                )
            })
            jsonData.advertisers.forEach((item) => {
                $(dropdown).append(
                    `
                                        <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="msg_custom_users[]" class="custom-control-input" id="a_${item.id}" value="a_${item.id}"/>
                                        <label class="custom-control-label w-100" for="a_${item.id}">${item.companyName}</label>
                                    </div>
                                </div>
                                        `
                )
            })


            select2Refresh();
            refreshCustomMultiSelect();
        }

        function removeElementFromContainer(target) {
            let form = $(target).closest(".custom-message");
            // var id = $(this).data("msg-id");
            // var token = $(this).data("token");
            // $.ajax({
            //     url: `settings/${id}/custommessage/destroy`,
            //     type: 'Post',
            //     dataType: "JSON",
            //     data: {
            //         "customMessage": id,
            //         "_method": 'DELETE',
            //         "_token": token,
            //     },
            //     success: (response) => {
            //         console.log('success', id);
            //         $(form).remove();
            //     },
            //     error: (error) => {
            //         console.log('false', id);
            //         console.log(error);
            //     }
            // });
        }

        // $("#deleteCustomMsg").submit(function(event) {
        //     event.preventDefault();

        // });

        $(".deleteProduct").click(function() {

            var id = $(this).attr("msg-id");
            var token = $(this).data("token");
            let form = $(this).closest(".custom-message");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });
            $.ajax({
                url: `settings/${id}/custommessage/destroy`,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}", // add your CSRF token here
                },
                success: function(data) {
                    console.log('success', id);
                    $(form).remove();
                },
                error: function(xhr, status, error) {
                    console.log('error', id);
                }
            });

            // $.ajax({
            //     url: `settings/${id}/custommessage/destroy`,
            //     type: 'POST',
            //     dataType: "JSON",
            //     data: {
            //         "id": id,
            //         "_token": "{{ csrf_token() }}",
            //         "_method": 'POST',
            //         "_token": token,
            //     },
            //     success: function() {
            //         console.log("it Work", id);
            //     }
            // });
            console.log(id);
            console.log("It failed");
        });
    </script>
    @endsection