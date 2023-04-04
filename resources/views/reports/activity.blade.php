@extends('layouts.vertical', ['title' => 'Activity Reports'])

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
                        <li class="breadcrumb-item active">Activity Reports</li>
                    </ol>
                </div>
                <h4 class="page-title">Activity Reports</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                        <div class="col-7">
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
                                <div class="col-auto" style="min-width: 200px;">
                                    <select class="form-control selectperiod" name="" data-toggle="select2" required>
                                        <option>Select Period</option>
                                        <option value="">Yesterday</option>
                                        <option value="">Today</option>
                                        <option value="">Month to Date</option>
                                        <option value="">Previous Month</option>
                                        <option value="custom-range" data-hello="kdam,adm,adm">Custom Range</option>
                                    </select>
                                    <input type="text" id="range-datepicker" style="width: 0; height: 0; overflow: hidden;" class="form-control border-0 p-0 custom-range-date-picker" placeholder="Start Date to End Date">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
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
                                    <th>Channel Path</th>
                                    <th>Referer</th>
                                    <th>IP Address</th>
                                    <!-- Location = City + Country  -->
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
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>


<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>

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