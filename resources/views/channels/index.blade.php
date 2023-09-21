@extends('layouts.vertical', ['title' => 'Channels'])

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
                        <li class="breadcrumb-item active">Channels</li>
                    </ol>
                </div>
                <h4 class="page-title">Channels</h4>
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
                            <a href="{{route('channels.create')}}" class="btn btn-danger waves-effect waves-light">
                                <i class="mdi mdi-plus-circle mr-1"></i>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Channel Id</th>
                                    <th>Publisher</th>
                                    <th style="width: 100%;">Channel Path</th>
                                    <th>Assigned Feeds</th>
                                    <th>Status</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($channels as $channel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$channel->channelId ?? '-'}}</td>
                                    <td>{{$channel->publisher->company_name ?? '-'}}</td>
                                    <td><a class="text-blue" href="{{$channel->channelpath->channel_path ? $channel->channelpath->channel_path : '#' }}">{{$channel->channelpath->channel_path ? $channel->channelpath->channel_path : '-'}}</a></td>
                                    <td>
                                        @if($channel->feeds() !== null)
                                        @foreach($channel->feeds() as $key => $feed)
                                        {{$feed->feedId ?? ''}} <br>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{$channel->status}}</td>
                                    <td>
                                        <a class="mx-2" href="{{route('channel.view',['channel'=>$channel->id])}}">View Info</a>
                                        @if ($channel->status=='disable')
                                        <a class="text-success mx-2" href="{{ route('channel.enable', ['channel' => $channel]) }}" value="live">Enable</a>
                                        @else
                                        <a class="text-danger mx-2" href="{{ route('channel.disable', ['channel' => $channel]) }}" value="disable">Disable</a>

                                        @endif

                                        <!-- <a href="#" class="text-danger mx-2">Disable</a> -->
                                    </td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td>2</td>
                                    <td>1002</td>
                                    <td>Advertiser 2</td>
                                    <td><a class="text-blue" href="http://trends.search-hub.co/v1/search/CNTRYCS10135SS?q={Search_Keywords}">http://trends.search-hub.co/v1/search/CNTRYCS10135SS?q={Search_Keywords}</a></td>
                                    <td> Feed 1 <br> Feed 2</td>
                                    <td>Live</td>
                                    <td>
                                        <a href="#" class="mx-2">View Info</a>
                                        <a href="#" class="text-danger mx-2">Disable</a>
                                    </td>
                                </tr> -->
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
@section('script-bottom')
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script type="text/javascript">
    $('#products-datatable').DataTable({
        order: [],
        "lengthMenu": [
            [50, 100, 250, 500],
            [50, 100, 250, 500],
        ],
    });
</script>
@endsection
