@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
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
                <form class="needs-validation" method="post" action="{{ url()->current() == route('advertiser.create') ? route('advertiser.store') : route('advertiser.update', $advertiser->id) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
                    @include('advertiser.form')
                    @include('advertiser.modals.report-columns')
                    @include('advertiser.modals.bank-details-modal')
                    @include('advertiser.modals.reports-modal')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection