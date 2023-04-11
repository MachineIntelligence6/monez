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

                <h4 class="mb-3 text-uppercaset"><i class="mdi mdi-office-building me-1"></i> Advertiser Info</h4>
                <form class="needs-validation" method="POST" action="{{ route('advertiser.update', [$advertiser->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('advertiser.edit-form')
                    @include('advertiser.modals.report-columns')
                    @include('advertiser.modals.bank-details-modal')
                    @include('advertiser.modals.reports-modal')
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
