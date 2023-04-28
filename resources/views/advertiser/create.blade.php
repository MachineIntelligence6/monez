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


                    @include('advertiser.new-form')

                {{-- @include('advertiser.modals.report-columns') --}}
                @include('advertiser.modals.bank-details-modal')
                @include('advertiser.modals.reports-modal')
            </div>
        </div>
    </div>
</div>

@endsection
