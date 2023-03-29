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
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1001</td>
                                    <td>Publisher 1</td>
                                    <td><a class="text-blue" href="https://www.msearch.co/pse/search?spid=113&sspid=1004&channel=country_mob&query={Search_Keywords}">https://www.msearch.co/pse/search?spid=113&sspid=1004&channel=country_mob&query={Search_Keywords}</a></td>
                                    <td>
                                    <a class="btn bg-secondary text-white">View Info</a>
                                    <a class="btn bg-danger text-white">Disable</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1002</td>
                                    <td>Advertiser 2</td>
                                    <td><a class="text-blue" href="http://trends.search-hub.co/v1/search/CNTRYCS10135SS?q={Search_Keywords}">http://trends.search-hub.co/v1/search/CNTRYCS10135SS?q={Search_Keywords}</a></td>
                                    <td>
                                    <a class="btn bg-secondary text-white">View Info</a>
                                        <a class="btn bg-danger text-white">Disable</a>
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
@section('script-bottom')
<script type="text/javascript">
    $('#products-datatable').DataTable();
</script>
<script>
</script>
@endsection