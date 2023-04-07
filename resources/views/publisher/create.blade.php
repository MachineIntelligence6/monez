@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('advertiser.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
                    @include('publisher.form')
                    @include('publisher.modals.report-columns')
                    @include('publisher.modals.bank-details-modal')
                    @include('publisher.modals.reports-modal')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection