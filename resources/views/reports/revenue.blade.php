@extends('layouts.vertical', ['title' => 'revenue Reports'])

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
                            <li class="breadcrumb-item active">Revenue Reports</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Revenue Reports</h4>
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
        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session()->get('warning') }}
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
                                        <div class="custom-file">
                                            <form id="uploadForm" action="{{ route('report.revenue.upload') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" class="custom-file-input" id="revenueReport"
                                                    name="revenueReport" accept=".csv">
                                                <label class="btn btn-primary" for="revenueReport">Upload CSV</label>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary" id="exportReporttoCSV">Export CSV</button>
                                    </div>
                                    {{-- <div class="col-auto">
                                        <button class="btn btn-secondary" data-trigger="modal"
                                            data-target="apiDetailModal">API Details</button>
                                    </div> --}}

                                    <div class="col-auto dropleft" style="min-width: 160px">
                                        <button class="btn btn-secondary waves-effect waves-light dropdown-toggle"
                                            type="button" data-toggle="dropdown" data-target="#show-columns-dropdown"
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
                        <form id="uploadForm" action="{{ route('report.revenue.search') }}" method="get"
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
                                                <option value="all">All</option>
                                                <option value="select-custom">Select Custom</option>
                                            </select>
                                            <div id="partners-dropdown" class="dropdown-menu w-100" data-searchable="true">
                                                <div class="px-2">
                                                    <input type="text" class="form-control dropdown-search-input"
                                                        placeholder="search">
                                                </div>
                                                {{--
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label w-100" for="customCheck1">asdasd</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label w-100" for="customCheck1">3333</label>
                                            </div>
                                        </div> --}}

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
                                                {{-- <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="feed1">
                                                <label class="custom-control-label w-100" for="feed1">Feed 1</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="feed2">
                                                <label class="custom-control-label w-100" for="feed2">Feed 2</label>
                                            </div>
                                        </div> --}}
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
                                        <div class="col-auto my-auto">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="countryWise" disabled>
                                                <label class="custom-control-label w-100"
                                                    for="countryWise">GeoWise</label>
                                            </div>
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
                                        <th>Date</th>
                                        <th>Advertiser</th>
                                        <th>Report Id</th>
                                        <th>SubId</th>
                                        <th>GEO</th>
                                        <th>Total Searches</th>
                                        <th>Monetized Searches</th>
                                        <th>Paid Clicks</th>
                                        <th>Gross Revenue</th>
                                        <th>Channel</th>
                                        <th>Publisher</th>
                                        <th>Net Revenue ($)</th>
                                        <th>Coverage (%)</th>
                                        <th>CTR (%)</th>
                                        <th>RPM ($)</th>
                                        <th>Monetized RPM (%)</th>
                                        <th>EPC ($)</th>
                                        <th>Daily Reports Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revenueRecords as $record)
                                        <tr>
                                            <td>{{ $record->revenue_date }}</td>
                                            <td>{{ $record->getAdvertiser->advertiser_id }}</td>
                                            <td>{{ $record->feed->feedId }}</td>
                                            <td>{{ $record->sub_id }}</td>
                                            <td>{{ $record->geo }}</td>
                                            <td>{{ $record->total_searches }}</td>
                                            <td>{{ $record->monetized_searches }}</td>
                                            <td>{{ $record->paid_clicks }}</td>
                                            <td>{{ $record->gross_revenue }}</td>
                                            <td>{{ $record->channel }}</td>
                                            <td>{{ $record->getPublisher->publisher_id }}</td>
                                            <td>{{ $record->net_revenue }}</td>
                                            <td>{{ $record->coverage }}</td>
                                            <td>{{ $record->ctr }}</td>
                                            <td>{{ $record->rpm }}</td>
                                            <td>{{ $record->monetized_rpm }}</td>
                                            <td>{{ $record->epc }}</td>
                                            <td>{{ $record->daily_reports_status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            paging: true,
            info: true,
            order: [],
            "lengthMenu": [
                [50, 100, 250, 500],
                [50, 100, 250, 500]
            ],
            buttons: [{
                extend: 'csv',
                filename: 'Revenue-Report', // Set your custom file name here
                exportOptions: {
                    columns: ':visible'
                }
            }]
        });
        $("#exportReporttoCSV").on("click", function() {
            table.button('.buttons-csv').trigger();
        });
        $('#toggleColumn').on('change', function() {
            // Toggle the visibility of the column based on checkbox state
            table.column(columnIndex).visible(this.checked);
        });

        function coloumnVisbility(coloumnIndex) {
            const coloumnVisibility = table.column(coloumnIndex).visible();
            table.column(coloumnIndex).visible(!coloumnVisibility);
        }


        $(".selectperiod").on("select2:close", function() {
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

                if (selectedText == 'Advertisers') {
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

        $("#partners").change((e) => {
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
