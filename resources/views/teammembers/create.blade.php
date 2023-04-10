@extends('layouts.vertical', ['title' => 'TeamMember Profile'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('team-members.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
                    @include('teammembers.form')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection