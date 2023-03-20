@extends('layouts.vertical', ['title' => 'Advertisers Profile'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3 text-uppercaset"><i class="mdi mdi-office-building me-1"></i> Advertiser Info</h4>
                <form class="needs-validation" method="POST" action="{{ route('advertiser.update', [$advertiser->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('advertiser.edit-form')
                </form>

            </div>
        </div>
    </div>
</div>

@endsection