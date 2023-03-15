@extends('layouts.vertical', ['title' => 'Setting Search Path'])

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
                            <li class="breadcrumb-item active">Setting Search Path</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Setting Search Path</h4>
                    
                    @if (\Session::has('success'))
                    
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> 
                            <ul style="">
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div> 
          
                    @endif
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif
                  


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
                         
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <!-- <input type="checkbox" class="custom-control-input" id="customCheck0">
                                                <label class="custom-control-label" for="customCheck0">&nbsp;</label> -->
                                            </div>
                                        </th>
                                        <th>Search Links</th>
                                        <th>Default</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <!-- <tr>
                                        <td colspan="2" class="text-center">No record found!</td>
                                    </tr> -->
                                    @foreach($links as $row)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                            @if($row->isDefault ==0)
                                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $row->id }}" disabled>
                                                <label class="custom-control-label" for="customCheck{{ $row->id }}">&nbsp;</label>
                                            @else
                                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $row->id }}" checked disabled>
                                                <label class="custom-control-label" for="customCheck{{ $row->id }}">&nbsp;</label>
                                            @endif
                                                
                                            </div>
                                        </td>
                                        <td>{{ $row->link }}</td>
                                    
                                        
                                        <td>
                                            @if($row->isDefault ==0)
                                                {{" "}}
                                            @else
                                                {{"Default"}}
                                            @endif
                                        </td>
                                        <!-- <td>
                                        
                                            <form action="{{ route('settings.searchpathUpDate', $row->id) }}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <button type="submit" class="btn btn-info" onclick="return confirm('Are you SURE to change default link to {{ $row->link }}?')">Update New Default Link</button>
                                            </form>
                                        </td>    -->
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
    <!-- Modal -->
    <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Seaerch Path</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <!-- <p>In Progress</p> -->
                    <form action="{{ route('settings.searchPathStore') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="link">Link URL Address</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Enter url path" required>
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <div class="form-check">
                                <input type="hidden" name="isDefault" value="0"/>
                                <input type="checkbox" name="isDefault" value="1" {{ old('isDefault', isset($category) ? 'checked' : '') }}/>     
                                <label class="form-check-label" for="isDefault">Check to make current link default</label>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">cancel</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
      