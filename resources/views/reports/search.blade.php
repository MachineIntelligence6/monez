@extends('layouts.vertical', ['title' => 'Search Reports'])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                            <li class="breadcrumb-item active">Search Reports</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Search Reports</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-auto">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        {{--                                        <button class="btn btn-primary" id="exportReporttoCSV">Export CSV</button>--}}
                                        <form id="download-csv"
                                              action="{{ route('report.search.download-search-csv') }}" method="get"
                                              target="_blank" enctype="multipart/form-data">
                                            <div class="col-auto dropleft" style="min-width: 160px">
                                                <button
                                                    class="btn btn-secondary waves-effect waves-light dropdown-toggle"
                                                    type="button" data-toggle="dropdown"
                                                    data-target="#show-columns-dropdown"
                                                    aria-haspopup="true" aria-expanded="false" hidden="hidden">
                                                    Show Columns
                                                </button>
{{--                                                                                            {{dd(request()->query())}}--}}
                                                @if(!(request()->query->count() <= 0))
                                                    <input type="text" name="partener-type"
                                                           value="{{request()->query('partener-type')}}"
                                                           hidden="hidden">
                                                    <input type="text" name="parteners"
                                                           value="{{request()->query('parteners')}}" hidden="hidden">
                                                    @if(request()->query('advertisers') )
                                                    <select name="advertisers[]" hidden="hidden">
                                                        @foreach(request()->query('advertisers') as $ad)
                                                            <option value="{{$ad}}" selected>{{$ad}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                    @if(request()->query('feeds') )
                                                    <select name="feeds[]" hidden="hidden">
                                                        @foreach(request()->query('feeds') as $fd)
                                                            <option value="{{$fd}}" selected>{{$fd}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                    @if(request()->query('publishers') )
                                                        <select name="publishers[]" hidden="hidden">
                                                            @foreach(request()->query('publishers') as $pub)
                                                                <option value="{{$pub}}" selected>{{$pub}}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @if(request()->query('channels') )
                                                        <select name="channels[]" hidden="hidden">
                                                            @foreach(request()->query('channels') as $ch)
                                                                <option value="{{$ch}}" selected>{{$ch}}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    <input type="text" name="period"
                                                           value="{{request()->query()['period']}}" hidden="hidden">
                                                    <input type="text" name="custom-range"
                                                          @if(isset(request()->query()['custom-range'])) value="{{request()->query()['custom-range']}}" @endif
                                                           hidden="hidden">
                                                @endif
                                                <div id="show-columns-dropdown" class="dropdown-menu" hidden="hidden">
                                                    @foreach ($coloumns as $key => $coloumn)
                                                        <div class="dropdown-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       name="coloumns[]"
                                                                       onchange="coloumnVisbility({{ $key }})" checked
                                                                       id="coloumn-{{ $coloumn[1] }}"
                                                                       value="{{ $coloumn[1] }}">
                                                                <label class="custom-control-label w-100"
                                                                       for="coloumn-{{ $coloumn[1] }}">{{ $coloumn[0] }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button class="btn btn-primary">Export CSV</button>
                                        </form>
                                    </div>
                                    <div class="col-auto dropleft" style="min-width: 160px">
                                        <button class="btn btn-secondary waves-effect waves-light dropdown-toggle"
                                                type="button" data-toggle="dropdown"
                                                data-target="#show-columns-dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Show Columns
                                        </button>
                                        <div id="show-columns-dropdown" class="dropdown-menu">
                                            @foreach ($coloumns as $key => $coloumn)
                                                <div class="dropdown-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               name="coloumns[]"
                                                               onchange="coloumnVisbility({{ $key }})" checked
                                                               id="coloumn-{{ $coloumn[1] }}">
                                                        <label class="custom-control-label w-100"
                                                               for="coloumn-{{ $coloumn[1] }}">{{ $coloumn[0] }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <form id="uploadForm" action="{{ route('report.search.search') }}" method="get"
                              enctype="multipart/form-data">
                            <div class="row mb-2 align-items-center justify-content-between">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-auto" style="min-width: 170px;">
                                            <select class="form-control" name="partener-type" id="partner-type"
                                                    data-toggle="select2">
                                                <option selected disabled>Select Type</option>
                                                <option value="publishers">Publishers</option>
                                                <option value="advertisers">Advertisers</option>
                                            </select>
                                        </div>
                                        <div class="col-auto" style="min-width: 200px;">
                                            <select class="form-control" name="parteners" disabled id="partners"
                                                    data-target-dropdown="#partners-dropdown" data-toggle="select2">
                                                <option value="" selected disabled></option>
                                                <option value="all">All
                                                </option>
                                                <option value="select-custom">
                                                    Select Custom
                                                </option>
                                            </select>
                                            <div id="partners-dropdown" class="dropdown-menu w-100"
                                                 data-searchable="true">
                                                <div class="px-2">
                                                    <input type="text" class="form-control dropdown-search-input"
                                                           placeholder="search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto" style="min-width: 200px;">
                                            <select class="form-control" disabled id="feeds-channels"
                                                    data-target-dropdown="#types-dropdown" data-toggle="select2">
                                                <option value="" selected disabled></option>
                                                <option value="all">All</option>
                                                <option value="select-custom">Select Custom</option>
                                            </select>
                                            <div id="types-dropdown" class="dropdown-menu w-100" data-searchable="true">
                                                <div class="px-2">
                                                    <input type="text" class="form-control dropdown-search-input"
                                                           placeholder="search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto" style="min-width: 200px;">
                                            <select class="form-control selectperiod" id="select-period" name="period"
                                                    data-toggle="select2" required>
                                                <option>Select Period</option>
                                                <option value="Yesterday">Yesterday</option>
                                                <option value="Today">Today</option>
                                                <option value="Month to Date">Month to Date</option>
                                                <option value="Previous Month">Previous Month</option>
                                                <option value="custom-range">Custom Range</option>
                                            </select>
                                            <input type="text" id="range-datepicker" name='custom-range'
                                                   style="width: 0; height: 0; overflow: hidden;"
                                                   class="form-control border-0 p-0 custom-range-date-picker"
                                                   placeholder="Start Date to End Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary" type="submit">Go</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                <thead>
                                <tr>
                                    <th>Date & Time Of Search</th>
                                    <th>Query</th>
                                    <th>Advertiser</th>
                                    <th>Feed</th>
                                    <th>Publisher</th>
                                    <th>Channel</th>
                                    <th>SubId</th>
                                    <th>Channel Path</th>
                                    <th>Referer</th>
                                    <th>No. of Redirects</th>
                                    <th>Alert</th>
                                    <th>IP Address</th>
                                    <th>Location</th>
                                    <th>GEO</th>
                                    <th>Latency (Seconds)</th>
                                    <th>UserAgent</th>
                                    <th>Screen Resolution</th>
                                    <th>Device</th>
                                    <th>OS</th>
                                    <th>Browser</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($searchRecords as $record)
                                    <tr>
                                        <td>{{ $record->created_at }}</td>
                                        <td>{{ $record->query }}</td>
                                        <td>{{ $record?->advertiser?->company_name ?? '--' }}</td>
                                        <td>{{ $record->feed }}</td>
                                        <td>{{ $record?->pub?->company_name ?? '--' }}</td>
                                        <td>{{ $record?->channel?->channelId ?? '--' }}</td>
                                        <td>{{ $record->subid }}</td>
                                        <td>{{ $record?->channel?->channelpath?->channel_path ?? '--' }}</td>
                                        <td>{{ $record->referer }}</td>
                                        <td>{{ $record->no_of_redirects }}</td>
                                        <td>{{ $record->alert }}</td>
                                        <td>{{ $record->ip_address }}</td>
                                        <td>{{ $record->location }}</td>
                                        <td>{{ $record->geo }}</td>
                                        <td>{{ $record->latency }}</td>
                                        <td>{{ $record->user_agent }}</td>
                                        <td>{{ $record->screen_resolution }}</td>
                                        <td>{{ $record->device }}</td>
                                        <td>{{ $record->os }}</td>
                                        <td>{{ $record->browser }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row ml-0">
                                <div class="col">
                                    Displaying: {{ ($searchRecords->currentpage()-1)*$searchRecords->perpage()+1 }}
                                    to {{$searchRecords->currentpage()*$searchRecords->perpage()}}
                                    of {{ $searchRecords->total() }}
                                </div>
                                <div class="col">
                                    {{ $searchRecords->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container -->
@endsection

@section('script')
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>


    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>


    <script src="{{ asset('assets/js/custom/custom-multiselect-dropdown.js') }}"></script>


    <!-- Page js-->
    <script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>

    <script type="text/javascript">
        let table = $('#products-datatable').DataTable({
            searching: false,
            filter: true,
            paging: false,
            info: false,
            order: [],
            "lengthMenu": [
                [50, 100, 250, 500],
                [50, 100, 250, 500]
            ],
            buttons: [{
                extend: 'csv',
                filename: 'Search-Report', // Set your custom file name here
                exportOptions: {
                    columns: ':visible'
                }
            }]
        });
        $("#exportReporttoCSV").on("click", function () {
            table.button('.buttons-csv').trigger();
        });
        $('#toggleColumn').on('change', function () {
            // Toggle the visibility of the column based on checkbox state
            table.column(columnIndex).visible(this.checked);
        });

        function coloumnVisbility(coloumnIndex) {
            const coloumnVisibility = table.column(coloumnIndex).visible();
            table.column(coloumnIndex).visible(!coloumnVisibility);
        }


        $(".selectperiod").on("select2:close", function () {
            let value = $(this).val()
            if (value === "custom-range") {
                setTimeout(() => {
                    $(".custom-range-date-picker").flatpickr({
                        mode: "range"
                    }).toggle()
                }, 0);
                $(".custom-range-date-picker").change((e) => {
                    let renderedContainer = $(this).siblings(".select2-container")
                        .find(".select2-selection__rendered");
                    renderedContainer.text("Custom Range " + `( ${$(e.target).val()} )`);
                });
            }
        })

        //Filters Flow
        $("#partner-type").on("change", (e) => {
            if ($(e.target).val() !== "") {
                let selectedText = $("#partner-type option:selected").text();
                let partnersRenderContainer = $("#partners")
                    .removeProp("disabled")
                    .siblings(".select2-container")
                    .find(".select2-selection__rendered");
                partnersRenderContainer.text("Select " + selectedText);

                $('#partners-dropdown').empty();
                $('#types-dropdown').empty();

                if (selectedText === 'Advertisers') {
                    const partnerDropDownData = @json($advertisers);
                    $('#pubItem').remove();
                    $('#channelItem').remove();
                    for (var i = 0; i < partnerDropDownData.length; i++) {
                        partnerChildElement = `<div class="dropdown-item" id='advItem'>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name='advertisers[]' value='${partnerDropDownData[i].id}' id="customCheck${i}">
                                                <label class="custom-control-label w-100" for="customCheck${i}">${partnerDropDownData[i].company_name}</label>
                                            </div>
                                        </div>`;
                        $('#partners-dropdown').append(partnerChildElement);
                    }

                    const typeDropDownData = @json($feeds);
                    for (var i = 0; i < typeDropDownData.length; i++) {
                        typeChildElement = `<div class="dropdown-item" id='feedItem'>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name='feeds[]' value='${typeDropDownData[i].id}' id="feed${i}">
                                                <label class="custom-control-label w-100" for="feed${i}">${typeDropDownData[i].feedId}</label>
                                            </div>
                                        </div>`;
                        $('#types-dropdown').append(typeChildElement);
                    }
                } else {
                    const partnerDropDownData = @json($publishers);
                    $('#advItem').remove();
                    $('#feedItem').remove();
                    for (var i = 0; i < partnerDropDownData.length; i++) {
                        partnerChildElement = `<div class="dropdown-item" id='pubItem'>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name='publishers[]' value='${partnerDropDownData[i].id}' id="customCheck${i}">
                                                <label class="custom-control-label w-100" for="customCheck${i}">${partnerDropDownData[i].company_name}</label>
                                            </div>
                                        </div>`;
                        $('#partners-dropdown').append(partnerChildElement);
                    }

                    const typeDropDownData = @json($channels);
                    for (var i = 0; i < typeDropDownData.length; i++) {
                        typeChildElement = `<div class="dropdown-item" id='channelItem'>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name='channels[]' value='${typeDropDownData[i].id}' id="channel${i}">
                                                <label class="custom-control-label w-100" for="channel${i}">${typeDropDownData[i].channelId}</label>
                                            </div>
                                        </div>`;
                        $('#types-dropdown').append(typeChildElement);
                    }
                }

                let fchRenderContainer = $("#feeds-channels")
                    .siblings(".select2-container")
                    .find(".select2-selection__rendered");
                fchRenderContainer.text("Select " + ($("#partner-type").val() === "advertisers" ? "Feeds" :
                    "Channels"));
            }
        });

        $(document).on('change', '[name="advertisers[]"]', function () {
            const advertisers = [];
            $('[name="advertisers[]"]:checked').each(function () {
                advertisers.push($(this).val());
            });

            $.ajax({
                url: '{{ route('feeds.index') }}',
                data: {advertisers},
                success: function (r) {
                    const typeDropDownData = r.feeds;
                    $('#types-dropdown').empty();
                    for (var i = 0; i < typeDropDownData.length; i++) {
                        typeChildElement = `<div class="dropdown-item" id='feedItem'>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name='feeds[]' value='${typeDropDownData[i].id}' id="feed${i}">
                                                <label class="custom-control-label w-100" for="feed${i}">${typeDropDownData[i].feedId}</label>
                                            </div>
                                        </div>`;
                        $('#types-dropdown').append(typeChildElement);
                    }
                }
            });
        });

        $(document).on('change', '[name="publishers[]"]', function () {
            const publishers = [];
            $('[name="publishers[]"]:checked').each(function () {
                publishers.push($(this).val());
            });

            $.ajax({
                url: '{{ route('channels.index') }}',
                data: {publishers},
                success: function (r) {
                    $('#types-dropdown').empty();
                    const typeDropDownData = r.channels;
                    for (var i = 0; i < typeDropDownData.length; i++) {
                        typeChildElement = `<div class="dropdown-item" id='channelItem'>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name='channels[]' value='${typeDropDownData[i].id}' id="channel${i}">
                                                <label class="custom-control-label w-100" for="channel${i}">${typeDropDownData[i].channelId}</label>
                                            </div>
                                        </div>`;
                        $('#types-dropdown').append(typeChildElement);
                    }
                }
            });
        });

        $("#partners").change((e) => {
            const val = $(e.target).val();
            if (val === 'all') {
                // reset all checked
                $('[name="publishers[]"]:checked').click();
                $('[name="advertisers[]"]:checked').click();
            }
            if ($(e.target).val() !== "") {
                $("#feeds-channels")
                    .removeProp("disabled")
            }
        })
        $("#feeds-channels").change((e) => {
            if ($(e.target).val() !== "") {
                $("#select-period")
                    .removeProp("disabled");
            }
        })

        //Filters Flow
        $("#revenueReport").on("change", (e) => {
            $('#uploadForm').submit();
        });

    </script>
@endsection
