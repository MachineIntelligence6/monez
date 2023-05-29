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
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-2 align-items-center">
                            <div class="col-9">
                                <div class="">
                                    <input type="url" class="form-control" id="channelpath" value="{{old('channel_path', $channelpath->channel_path ?? '')}}" name="channel_path" placeholder="Enter Channel Path" required pattern="^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/)?$">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-danger waves-effect waves-light">
                                    <i class="mdi mdi-plus-circle mr-1"></i>
                                    Add Path
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row mt-4">
                        <!-- Start -->
                        @foreach($channelpaths as $channelpath)
                        <div class="col-12">
                            <div class="row mb-3 align-items-center justify-content-between py-1" style="border-bottom: 1px solid #00000010;">
                                <div class="col-auto">
                                    <p>{{$channelpath->channel_path}}</p>
                                </div>
                                <div class="col-auto d-flex">
                                @if ($channelpath->is_default)
                                        <a class="btn bg-yellow text-white">Default</a>
                                        @else
                                            @if(isset($channelpath->channel))
                                            @else
                                                @if($channelpath->status)
                                                <a class="text-danger mx-2" href="{{ route('channelpaths.disable', ['channelpath' => $channelpath]) }}" value="0">Disable</a>
                                                @else
                                                <a class="text-success mx-2" href="{{ route('channelpaths.enable', ['channelpath' => $channelpath]) }}" value="1">Enable</a>
                                                @endif
                                                 <form action="{{ route('channelpaths.destroy', $channelpath->id )  }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <!-- <a class="text-danger mx-2" type="submit" href="#" value="0">Delete</a> -->
                                                <button type="submit" class="text-danger mx-2 btn p-0 m-0">Delete</button>
                                            </form>
                                            @endif
                                            <a class="text-blue mx-2" href="{{ route('channelpath.make-default', ['channelpath' => $channelpath]) }}">Make Default</a>
                                        @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End -->
                        <!-- <div class="col-12">
                            <div class="row mb-3 align-items-center justify-content-between py-1" style="border-bottom: 1px solid #00000010;">
                                <div class="col-auto">
                                    <p>http://127.0.0.1:8000/channelpaths</p>
                                </div>
                                <div class="col-auto">
                                    <a class="btn bg-yellow text-white">Default</a>
                                    <a class="text-danger mx-2" href="#" value="0">Disable</a>
                                    <a class="text-success mx-2" href="#" value="1">Enable</a>
                                    <a class="text-blue mx-2" href="#">Make Default</a>
                                    <a class="text-danger mx-2" href="#" value="0">Delete</a>
                                </div>
                            </div>
                        </div> -->
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
