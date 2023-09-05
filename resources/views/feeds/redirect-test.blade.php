@extends('layouts.vertical', ['title' => 'Redirects Test'])

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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Feeds</a></li>
                        <li class="breadcrumb-item active">Redirects Test</li>
                    </ol>
                </div>
                <h4 class="page-title">Redirects Test</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form class="needs-validation" id="" method="post" action="{{ route('redirects-test.search') }}" enctype="multipart/form-data" novalidate>
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="url" class="form-control" name="feedUrl" placeholder="Enter Feed Url" required pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid path
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Test</button>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-auto px-5">
                            <h4>Redirects</h4>
                            <p>10</p>
                        </div>
                        <div class="col-auto px-5">
                            <h4>Domains</h4>
                            <p>10</p>
                        </div>
                        <div class="col-auto px-5">
                            <h4>Result</h4>
                            <p>https://www.bing.com</p>
                        </div>
                        <div class="col-auto px-5">
                            <h4>Alert</h4>
                            <p>https://www.fastsearch.link</p>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-12 row justify-content-center">
                            <h4 class="text-center bg-secondary px-4 py-2 rounded-sm text-light">Redirects</h4>
                        </div>
                        <div class="col-auto">
                            <div class="timeline" dir="ltr">
                                <article class="timeline-item timeline-item-left">
                                    <div class="timeline-desk">
                                        <div class="timeline-box bg-light" style="min-width: 30vw;">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                            <h4 class="m-0">fastsearch.link</h4>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="timeline-box bg-light" style="min-width: 30vw;">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                            <h4 class="m-0">fastsearch.link</h4>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-item timeline-item-left">
                                    <div class="timeline-desk">
                                        <div class="timeline-box bg-light" style="min-width: 30vw;">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                            <h4 class="m-0">fastsearch.link</h4>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- end timeline -->
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    </form>
    <!-- end row -->
</div> <!-- container -->


@endsection
@section('script')
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script type="text/javascript">
    $('#products-datatable').DataTable({
        "order": []
    });
</script>
<script>
</script>
@endsection
