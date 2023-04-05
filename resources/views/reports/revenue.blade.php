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
                                        <label class="btn btn-secondary" for="customFile">Upload CSV</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary" data-trigger="modal" data-target="apiDetailModal">API Details</button>
                                </div>
                                <div class="col-auto" style="min-width: 160px">
                                    <select class="form-control" name="" data-toggle="select2" required>
                                        <option>Show Columns</option>
                                        <option value="">Latency (Seconds)</option>
                                        <option value="">Follow On Searches (%)</option>
                                        <option value="">Coverage (%)</option>
                                        <option value="">CTR (%)</option>
                                        <option value="">RPM ($)</option>
                                        <option value="">Monetized RPM (%)</option>
                                        <option value="">EPC ($)</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept=".csv">
                                        <label class="btn btn-secondary" for="customFile">Export CSV</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-center justify-content-between">
                        <div class="col-auto">
                            <label>
                                Show
                                <select name="products-datatable_length" aria-controls="products-datatable" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-control" name="parteners" id="select-partners" data-toggle="select2">
                                        <option>Select Partners</option>
                                        <option value="">All</option>
                                        <option value="">All Publishers</option>
                                        <option value="">All Advertisers</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control" name="" data-toggle="select2">
                                        <option>Select Type</option>
                                        <option value="">All</option>
                                        <option value="">All Feeds</option>
                                        <option value="">All Channels</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                </div>
                                <div class="col-auto" style="min-width:160px;">
                                    <select class="form-control selectperiod" name="" data-toggle="select2" required>
                                        <option>Select Period</option>
                                        <option value="">Month to Date</option>
                                        <option value="">Previous Month</option>
                                        <option value="custom-range" data-hello="kdam,adm,adm">Custom Range</option>
                                    </select>
                                    <input type="text" id="range-datepicker" style="width: 0; height: 0; overflow: hidden;" class="form-control border-0 p-0 custom-range-date-picker" placeholder="Start Date to End Date">
                                </div>
                                <div class="col-auto">
                                    <div class="pl-2 d-flex align-items-center h-100 countrywise__checkbox">
                                        <input class="form-check-input mt-0" type="checkbox" value="" id="countrywise">
                                        <label class="form-check-label" for="countrywise">
                                            Country Wise
                                        </label>
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
                                    <!-- <th>Latency (Seconds)</th>
                                    <th>Follow On Searches (%)</th>
                                    <th>Coverage (%)</th>
                                    <th>CTR (%)</th>
                                    <th>RPM ($)</th>
                                    <th>Monetized RPM (%)</th>
                                    <th>EPC ($)</th> -->
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
                                    <!-- <td>dummy latency</td>
                                    <td>dummy follow on</td>
                                    <td>dummy coverage</td>
                                    <td>dummy CTR</td>
                                    <td>dummy RPM</td>
                                    <td>dummy Monetized RPM</td>
                                    <td>dummy EPC</td> -->
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
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>


<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="{{asset('assets/libs/sumomultiselect/jquery.sumoselect.min.js')}}"></script>
<!-- <script src="{{asset('assets/libs/sumomultiselect/sumoselect.min.css')}}"></script> -->
<!-- Page js-->
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>
<script src="{{asset('assets/js/modal-init.js')}}"></script>
<script type="text/javascript">
    $('#products-datatable').DataTable({
        searching: false,
        filter: true,
        paging: true,
        info: true,
        dom: '<"toolbar">frtip',
        fnInitComplete: function() {
            $('div.toolbar').html();
        }
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
</script>
@endsection