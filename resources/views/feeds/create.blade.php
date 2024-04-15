@extends('layouts.vertical', ['title' => 'Add Feed'])
@section('content')
    <div class="row">
        @php
            $condition='view';
            $currentUrl = url()->current();
            $segments = request()->segments();
            $lastSegment = last($segments);

        @endphp
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ url()->current() == route('feeds.create') ? route('feeds.store') : route('feeds.update', $feed->id) }}"
                        method="POST"
                        class="feeds-form"
                        novalidate
                    >

                        <!-- <form class="needs-validation" method="post" action="{{ route('feeds.store') }}" enctype="multipart/form-data" novalidate> -->
                        @csrf
                        @if($lastSegment=='edit')
                            @method('PUT')
                        @else
                            @method('POST')
                        @endif

                        @include('feeds.form')
                        @include('feeds.modals.integration-guide')
                        @include('feeds.modals.static-parameters')
                        @include('feeds.modals.dynamic-parameters')
                        @include('feeds.modals.timeline')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
