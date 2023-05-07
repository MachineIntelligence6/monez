@extends('layouts.vertical', ['title' => 'Newsletter'])

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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item active">Newsletter</li>
                    </ol>
                </div>
                <h4 class="page-title">Newsletter</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">

        <div class="col-md-12">
            <div class="card h-100">
                <form action="{{ route('sendnewsletter') }}">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <!-- <h4>Newsletter </h4> -->
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
                                    @foreach ($advertisers as $key => $publisher)
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="custom_publishers[]" id="newsletterpub{{$publisher->id}}" value="{{$publisher->id}}">
                                            <label class="custom-control-label w-100" for="newsletterpub{{$publisher->id}}">{{$publisher->id}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($advertisers as $key => $advertiser)
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="custom_advertisers[]" id="newsletteradv{{$advertiser->id}}" value="{{$advertiser->id}}">
                                            <label class="custom-control-label w-100" for="newsletteradv{{$advertiser->id}}">{{$advertiser->advertiser_id}}</label>
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
                                    <button class="btn btn-primary">
                                        Send
                                        <i class="ml-2 mdi mdi-send"></i>
                                    </button>
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

    @endsection
