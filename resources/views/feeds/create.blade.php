@extends('layouts.vertical', ['title' => 'Add Feed'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('feeds.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
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