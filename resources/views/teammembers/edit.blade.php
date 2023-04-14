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

@section("script")
<script>
    $('#email').on('input', function() {
        var inputVal = $(this).val();
        if (inputVal.length > 0) {
            $.ajax({
                url: '{{ route("check.unique.teamEmail") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    input_field: inputVal
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'error') {
                        validateInput("#email", false);
                        $("#email-invalid").text('Email already registered.');
                    } else {
                        console.log(response);
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        } else {
            $("#email-invalid").text('You must enter valid input.');
        }
    });
</script>
@endsection