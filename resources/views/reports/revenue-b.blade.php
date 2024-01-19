@extends('layouts.vertical', ['title' => 'Revenue Reports'])

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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-auto">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" accept=".csv">
                                            <label class="btn btn-primary" for="customFile">Upload CSV</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" accept=".csv">
                                            <label class="btn btn-primary" for="customFile">Export CSV</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-secondary" data-trigger="modal"
                                            data-target="apiDetailModal">API Details</button>
                                    </div>
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
                        <div class="row mb-2 align-items-center justify-content-between">
                            <!-- <div class="col-auto">
                                    <label class="d-inline-flex align-items-center" style="gap: 5px;">
                                        Show
                                        <select name="products-datatable_length" aria-controls="products-datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        entries
                                    </label>
                                </div> -->
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
                                            <div class="dropdown-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label w-100" for="customCheck1">Partner
                                                        1</label>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck2">
                                                    <label class="custom-control-label w-100" for="customCheck2">Partner
                                                        2</label>
                                                </div>
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
                                            <div class="dropdown-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="feed1">
                                                    <label class="custom-control-label w-100" for="feed1">Feed
                                                        1</label>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="feed2">
                                                    <label class="custom-control-label w-100" for="feed2">Feed
                                                        2</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto" style="min-width: 200px;">
                                        <select class="form-control selectperiod" id="select-period" disabled
                                            name="period" data-toggle="select2" required>
                                            <option>Select Period</option>
                                            <option value="">Month to Date</option>
                                            <option value="">Previous Month</option>
                                            <option value="custom-range">Custom Range</option>
                                        </select>
                                        <input type="text" id="range-datepicker"
                                            style="width: 0; height: 0; overflow: hidden;"
                                            class="form-control border-0 p-0 custom-range-date-picker"
                                            placeholder="Start Date to End Date">
                                    </div>
                                    <div class="col-auto my-auto">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="countryWise">
                                            <label class="custom-control-label w-100" for="countryWise">GeoWise</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">Go</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Advertiser</th>
                                        <th>Feed</th>
                                        <th>Publisher</th>
                                        <th>Channel</th>
                                        <th>SubId</th>
                                        <th>Daily Reports Status</th>
                                        <th>GEO</th>
                                        <th>Total Searches</th>
                                        <!-- Location = City + Country  -->
                                        <th>Monetized Searches</th>
                                        <th>Paid Clicks</th>
                                        <th>Advertiser Revenue ($)</th>
                                        <th>Search Monez Revenue ($)</th>
                                        <th>Publisher Revenue ($)</th>
                                        <th>Latency (Seconds)</th>
                                        <th>Follow On Searches (%)</th>
                                        <th>Coverage (%)</th>
                                        <th>CTR (%)</th>
                                        <th>RPM ($)</th>
                                        <th>Monetized RPM (%)</th>
                                        <th>EPC ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>dummy Advertiser</td>
                                        <td>dummy Feed </td>
                                        <td>dummy publisher</td>
                                        <td>dummy channel</td>
                                        <td>dummy subid</td>
                                        <td>dummy daily reports</td>
                                        <td>dummy GEO</td>
                                        <td>dummy searches</td>
                                        <td>dummy Monetize </td>
                                        <td>dummy paid clicks</td>
                                        <td>dummy revenue</td>
                                        <td>dummy mon revenue</td>
                                        <td>dummy pub revenue</td>
                                        <td>dummy latency</td>
                                        <td>dummy follow on</td>
                                        <td>dummy coverage</td>
                                        <td>dummy CTR</td>
                                        <td>dummy RPM</td>
                                        <td>dummy Monetized RPM</td>
                                        <td>dummy EPC</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container -->

    @include('reports.modals.apidetail-modal')
@endsection

@section('script-bottom')
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>


    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom/custom-multiselect-dropdown.js') }}"></script>


    <!-- Page js-->
    <script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('assets/js/modal-init.js') }}"></script>
    <script type="text/javascript">
        $('#products-datatable').DataTable({
            searching: false,
            filter: true,
            paging: true,
            info: true,
            order: [],
            "lengthMenu": [
                [50, 100, 250, 500],
                [50, 100, 250, 500]
            ],
        });

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



        $("[data-toggle='dropdown']").click(function() {
            $($(this).attr("data-target")).toggleClass("d-block");
        })
        $(document).on('click', (e) => {
            console.log(e.target)
            $('.dropdown-menu').each((_, searchDrop) => {
                if (!searchDrop.parentNode.contains(e.target)) {
                    $(searchDrop).removeClass("d-block");
                }
            })
        })
    </script>
@endsection
