@extends('layouts.vertical', ['title' => 'Team Member Profile'])
@section('content')
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

@section("script")
<script>

</script>
@endsection
