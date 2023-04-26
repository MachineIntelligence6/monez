@extends('layouts.vertical', ['title' => 'Add Channel'])
@section('content')
@php
$condition='view';
$currentUrl = url()->current();
$segments = request()->segments();
$lastSegment = last($segments);

@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ url()->current() == route('channels.create') ? route('channels.store') : route('channels.update', $channel->id) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @if($lastSegment=='edit')
                        @method('PUT')
                        @else
                        @method('POST')
                    @endif
                    @include('channels.form')
                    @include('channels.modals.integration-guide')
                    @include('channels.modals.static-parameters')
                    @include('channels.modals.dynamic-parameters')
                    @include('channels.modals.timeline')
                    @include('channels.modals.assigned-feeds')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection