@extends('layouts.vertical', ['title' => 'Channel Paths'])

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
                        <li class="breadcrumb-item active">Channel Paths</li>
                    </ol>
                </div>
                <h4 class="page-title">Channel Paths</h4>
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
                            <a href="{{route('channelpaths.create')}}" class="btn btn-danger waves-effect waves-light">
                                <i class="mdi mdi-plus-circle mr-1"></i>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Channel Name</th>
                                    <th>Channel Path</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($channelpaths as $channelpath)
                                <tr>
                                    <td>
                                        {{ $channelpath->channel_name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $channelpath->channel_path ?? '-'}}
                                    </td>
                                    <td>
                                        <a class="mx-2" href="{{route('channelpaths.view',['channelpath'=>$channelpath->id])}}">View Info</a>
                                    </td>
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


@endsection
@section('script')
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script type="text/javascript">
    $('#products-datatable').DataTable({
        "order": [],
        "lengthMenu": [
            [50, 100, 250, 500],
            [50, 100, 250, 500]
        ],
    });
</script>
<script>
</script>
@endsection