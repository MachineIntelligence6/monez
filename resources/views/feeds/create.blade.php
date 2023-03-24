@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
                    @include('feeds.form')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection