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
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $('#products-datatable').DataTable({
        searching: false,
    });
</script>
<script>
</script>
@endsection