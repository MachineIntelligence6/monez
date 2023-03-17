@extends('layouts.vertical', ['title' => 'Finances'])

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
                    <h4 class="mb-3 header-title">Financial Year</h4>

                    <form>

                       <div class="row">
                            <div class="col-lg-6">
                                <!-- Date View -->
                                <div class="mb-3">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control datepicker" data-toggle="flatpicker" placeholder="January 1, 2023">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <!-- Date View -->
                                <div class="mb-3">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control datepicker" data-toggle="flatpicker" placeholder="December 31, 2023">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Financial year</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-3 header-title">Default Date Format</h4>
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="col-md-6">
                                            <h4 class="header-title mt-5 mt-sm-0">Languages - Admin Settings</h4>
                                            <select  class="mySelect2" id="example-select">
                                                <option>dd/mm/yyyy</option>
                                                <option>mm/dd/yyyy</option>
                                                <option>yyyy/mm/dd</option>
                                            </select>
                                    
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Default Date Format</button>
                    </form>



                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Languages</h4>

                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="col-md-6">
                                            <h4 class="header-title mt-5 mt-sm-0">Languages - Admin Settings</h4>
                                            <select class="mySelect2">
                                                <option>English</option>
                                            </select>
                                    
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-3 header-title">Time Zones</h4>
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="col-md-6">
                                            <h4 class="header-title mt-5 mt-sm-0">Default Time Zone</h4>
                                            <select class="mySelect2">
                                                <option>Pakistan</option>
                                            </select>
                                    
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>
                    

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
    <!-- end row -->

    

@endsection

@section('script')
<script>
    $(document).ready(function() {
    $('.mySelect2').select2();
});
</script>

<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>
@endsection
