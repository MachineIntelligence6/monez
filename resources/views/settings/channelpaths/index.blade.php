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
                                    <input type="url" class="form-control" id="channelpath" value="{{old('channel_path', $channelpath->channel_path ?? '')}}" name="channel_path" placeholder="Enter Channel Path" required pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        You must enter valid path
                                    </div>
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
                        <div class="col-12">
                            <div class="row mb-3 align-items-center justify-content-between py-1" style="border-bottom: 1px solid #00000010;">
                                <div class="col-auto">
                                    <p>http://127.0.0.1:8000/channelpaths</p>
                                </div>
                                <div class="col-auto">
                                @if ($feed->is_default)
                                        <a class="btn bg-yellow text-white">Default Feed</a>
                                        @else
                                            @if(isset($channelpaths->channel))
                                            @else
                                                @if($feed->status=='live')
                                                <a class="text-danger mx-2" href="{{ route('feeds.disable', ['feed' => $feed]) }}" value="0">Disable</a>
                                                @else
                                                <a class="text-success mx-2" href="{{ route('feeds.enable', ['feed' => $feed]) }}" value="1">Enable</a>
                                                @endif
                                            @endif
                                            <a class="text-blue mx-2" href="{{ route('feeds.make-default', ['feed' => $feed]) }}">Make Default</a>
                                        @endif
                                        @if(isset($channelpaths->advertisers))
                                            @else
                                            <form action="{{ route('team-members.destroy', $teamMember->id )  }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger mx-2">Delete</button>
                                            </form>
                                            @endif
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                        <div class="col-12">
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
                        </div>
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