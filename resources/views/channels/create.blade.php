@extends('layouts.vertical', ['title' => 'Add Channel'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" method="POST" action="{{ route('channels.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
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