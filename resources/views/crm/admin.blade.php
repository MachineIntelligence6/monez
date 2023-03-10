@extends('layouts.vertical', ['title' => 'Admin'])

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
                            <li class="breadcrumb-item active">Listing</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admin Dashboard</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add New</button>
                            </div>
                            <!-- <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                                    <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div> -->
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Company/Legal Name</th>
                                        <th>Registration / National ID</th>
                                        <th>VAT</th>
                                        <th>Website</th>
                                        <th>Account Email</th>
                                        <th>Password</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center">No record found!</td>
                                    </tr>
                                    <!-- <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td class="table-user">
                                            <img src="{{asset('assets/images/users/user-4.jpg')}}" alt="table-user" class="mr-2 rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Paul J. Friend</a>
                                        </td>
                                        <td>
                                            937-330-1634
                                        </td>
                                        <td>
                                            pauljfrnd@jourrapide.com
                                        </td>
                                        <td>
                                            New York
                                        </td>
                                        <td>
                                            07/07/2018
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success text-success">Active</span>
                                        </td>
    
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td class="table-user">
                                            <img src="{{asset('assets/images/users/user-3.jpg')}}" alt="table-user" class="mr-2 rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Kathryn S. Collier</a>
                                        </td>
                                        <td>
                                            828-216-2190
                                        </td>
                                        <td>
                                            collier@jourrapide.com
                                        </td>
                                        <td>
                                            Canada
                                        </td>
                                        <td>
                                            06/30/2018
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-danger text-danger">Blocked</span>
                                        </td>
    
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <!-- <ul class="pagination pagination-rounded justify-content-end mb-0">
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul> -->

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->
    <!-- Modal -->
    <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Customers</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="position">Phone</label>
                            <input type="text" class="form-control" id="position" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="category">Location</label>
                            <input type="text" class="form-control" id="category" placeholder="Enter Location">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Continue</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
      