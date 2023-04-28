@extends('layouts.vertical', ['title' => 'Add Channel Path'])
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
            <form action="{{ url()->current() == route('channelpaths.create') ? route('channelpaths.store') : route('channelpaths.update', $channelpath->id) }}" method="POST">
                    @csrf
                    @if($lastSegment=='edit')
                        @method('PUT')
                        @else
                        @method('POST')
                    @endif
                    
                    @include('settings.channelpaths.form')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection