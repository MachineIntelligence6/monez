@extends('layouts.vertical', ['title' => 'Finance'])

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
                        <li class="breadcrumb-item active">Finance</li>
                    </ol>
                </div>
                <h4 class="page-title">Finance</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2 align-items-center justify-content-between">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-md-auto" style="min-width: 200px;">
                                    <select class="form-control" name="parteners" data-target-dropdown="#partners-dropdown-finance" data-toggle="select2">
                                        <option>Select Partners</option>
                                        <option value="">All</option>
                                        <option value="">All Publishers</option>
                                        <option value="">All Advertisers</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <div id="partners-dropdown-finance" class="dropdown-menu w-100" data-searchable="true">
                                        <div class="px-2">
                                            <input type="text" class="form-control dropdown-search-input" placeholder="search">
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="financePartner1">
                                                <label class="custom-control-label w-100" for="financePartner1">Partner 1</label>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="financePartner2">
                                                <label class="custom-control-label w-100" for="financePartner2">Partner 2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto" style="min-width: 250px;">
                                    <select class="form-control selectperiod" name="" data-toggle="select2" required>
                                        <option>Select Month</option>
                                        <option value="">Previous Month</option>
                                        <option value="">Last 3 Months</option>
                                        <option value="">Last 6 Months</option>
                                        <option value="">Current Financial Year</option>
                                        <option value="">Previous Financial Year</option>
                                        <option value="select-custom">Select Custom</option>
                                    </select>
                                    <input type="text" id="range-datepicker" style="width: 0; height: 0; overflow: hidden;" class="form-control border-0 p-0 custom-range-date-picker" placeholder="Start Date to End Date">
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
                                    <!-- Format (MMM YYYY) i.e JAN 2023 -->
                                    <th>Month/Year</th>
                                    <th>Monthly Revenue Reports</th>
                                    <th>Monthly Summary</th>
                                    <th>Invoice</th>
                                    <th>Payments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>JAN 2023</td>
                                    <td>
                                        <p class="m-0">status (pending/final)</p>
                                        <a href="#">rpt_jan2023.csv</a>
                                    </td>
                                    <td>
                                        <p class="m-0">status (not generated / generated)</p>
                                        <a href="#">sum_jan2023.pdf</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary">Upload Invoice</button>
                                        <p class="m-0">status</p>
                                        <a href="#">inv_jan2023.pdf</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary">Upload Payment Proof</button>
                                        <p class="m-0">status (pending/complete)</p>
                                        <a href="#">pmt_jan2023.pdf</a>
                                    </td>
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


@endsection
@section('script')
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script src="{{asset('assets/js/custom/custom-multiselect-dropdown.js')}}"></script>

<script type="text/javascript">
    $('#products-datatable').DataTable({
        searching: false,
    });
</script>
<script>
</script>
@endsection