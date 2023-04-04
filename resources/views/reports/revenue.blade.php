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
                        <div class="col-8">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-control" name="" data-toggle="select2" required>
                                        <option>Select Partners</option>
                                        <option value="">All</option>
                                        <option value="">All Publishers</option>
                                        <option value="">All Advertisers</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control" name="" data-toggle="select2" required>
                                        <option>Select Type</option>
                                        <option value="">All</option>
                                        <option value="">All Feeds</option>
                                        <option value="">All Channels</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control" name="" data-toggle="select2" required>
                                        <option>Select Period</option>
                                        <option value="">Today</option>
                                        <option value="">Month to Date</option>
                                        <option value="">Previous Month</option>
                                        <option value="">Custom Range</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Advertise</th>
                                    <th>Feed</th>
                                    <th>Publisher</th>
                                    <th>Channel</th>
                                    <th>SubId</th>
                                    <th>Daily Reports Status</th>
                                    <th>GEO</th>
                                    <th>Total Searches</th>
                                    <!-- Location = City + Country  -->
                                    <th>Monetize Searches</th>
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
                                    <th>EPC</th>
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
</script>
<script>
</script>
@endsection