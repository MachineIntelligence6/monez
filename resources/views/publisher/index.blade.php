@extends('layouts.vertical', ['title' => 'Publishers'])

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
                        <li class="breadcrumb-item active">Publishers</li>
                    </ol>
                </div>
                <h4 class="page-title">Publishers</h4>
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
                            <!-- <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add New</button> -->

                            <a href="{{route('second', ['Publisher', 'create'])}}" class="btn btn-danger waves-effect waves-light">
                                <i class="mdi mdi-plus-circle mr-1"></i>
                                Add New
                            </a>
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
                                    <!-- <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th> -->
                                    <th>Publisher ID</th>
                                    <th>Company / Legal Name</th>
                                    <th>Website</th>
                                    <th>Account Email</th>
                                    <th>Account Manager</th>
                                    <th>Success Manager</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publishers as $publisher)
                                <tr>
                                    <td>
                                        {{ $publisher->dbaId ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $publisher->companyName ?? '-'}}
                                    </td>
                                    <td>
                                        {{ $publisher->url ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $publisher->accEmail ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $publisher->amFirstName ?? '' }} {{ $publisher->amLastName ?? '' }}
                                    </td>
                                    <td>
                                        Succeess Manager
                                    </td>
                                    <td>
                                        <!-- <a class="btn bg-secondary text-white">View Info</a> -->
                                        <a href="{{route('Publisher.edit',['Publisher'=>$publisher->id])}}" class="btn btn-secondary"> View Info</a>

                                        <!-- <a href="{{route('Publisher.edit',['Publisher'=>$publisher->id])}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div><!-- end row -->
</div> <!-- container -->
@endsection
@section('script')
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $('#products-datatable').DataTable();
</script>
@endsection