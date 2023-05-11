@extends('layouts.vertical', ['title' => 'Drafts'])
@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item active">Drafts</li>
                    </ol>
                </div>
                <h4 class="page-title">Drafts</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>IO</h4>
                    <form class="needs-validation" action="{{route('store.drafts')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="file" name="io" class="dropify" data-height="200" data-allowed-file-extensions="pdf" accept="application/pdf" data-max-file-size="5M" required />
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    Choose a file to continue.
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            @if ($draftfile)
                            <div class="col-auto">
                                @php
                                $named = str_replace('"', '', $draftfile->io_filenames);
                                @endphp
                                <a href="{{ route('downloaddraftpdf',['name'=>'io.pdf' ]) }}">io.pdf</a><br>
                                <!-- <a href="#">IO File.pdf</a> -->
                            </div>
                            @else

                            @endif

                            <div class="col-auto">
                                <button type="submit" class="btn btn-secondary">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->



    </div>
    <!-- end row -->



    @endsection

    @section('script-bottom')

    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script src="{{asset('assets/js/custom/custom-multiselect-dropdown.js')}}"></script>
    <!-- <script src="{{asset('assets/libs/summernote/summernote.min.js')}}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $('.dropify').dropify();
    </script>
    @endsection
