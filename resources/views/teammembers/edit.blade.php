@extends('layouts.vertical', ['title' => 'Team Member Profile'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3 text-uppercaset"><i class="mdi mdi-office-building me-1"></i> Team Member Info</h4>
                <form class="needs-validation" method="POST" action="{{ route('team-members.update', [$teamMember->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('teammembers.edit-form')
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
