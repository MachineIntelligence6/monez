@extends('layouts.vertical', ['title' => 'Add Feed'])
@section('content')
<div class="row">
@php
            $condition='view';
            $currentUrl = url()->current();
            $segments = request()->segments();
            $lastSegment = last($segments);
 
            @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ url()->current() == route('feeds.create') ? route('feeds.store') : route('feeds.update', $feed->id) }}" method="POST">

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