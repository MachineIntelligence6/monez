@extends('layouts.vertical', ['title' => 'Publisher Profile'])
@section('content')
    @php
        $condition='view';
        $currentUrl = url()->current();
        $segments = request()->segments();
        $lastSegment = last($segments);
        $paymentTermsValues=config('constant.payment_terms_values');
        $currencyList=config('constant.currency_list');
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 text-uppercaset"><i class="mdi mdi-office-building me-1"></i> Publisher Info</h4>
                    @include('publisher.edit-form')

                </div>
            </div>
        </div>
    </div>
@endsection
