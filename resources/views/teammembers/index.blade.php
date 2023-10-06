@extends('layouts.vertical', ['title' => 'Team Members'])

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Monez</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Team Members</li>
                    </ol>
                </div>
                <h4 class="page-title">Team Members</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('second', ['team-members', 'create']) }}" class="btn btn-danger waves-effect waves-light">
                                <i class="mdi mdi-plus-circle mr-1"></i>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th style="width: 100%;">Email</th>
{{--                                    <th>Role</th>--}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($teamMembers))
                                @foreach ($teamMembers as $teamMember)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{ $teamMember->name }}</td>
                                    <td style="width: 100%;">{{ $teamMember->email }}</td>
{{--                                    <td>{{ $teamMember->role }}</td>--}}
                                    <td>
                                        <span class="d-inline-flex" style="gap: 5px;">
                                            <a class="mx-2" href="{{ route('team-members.view', $teamMember->id) }}">View
                                                Info</a>
                                            {{-- @if (count($teamMember->advertisers) > 0 || count($teamMember->publishers) > 0)
                                                        @else
                                                            <form
                                                                action="{{ route('team-members.destroy', $teamMember->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete</button>
                                            </form>
                                            @endif --}}
                                            @if (count($teamMember->advertisers) > 0 || count($teamMember->publishers) > 0)
                                            @else
                                            <button type="submit" class="text-danger mx-2" data-toggle="modal" data-target="#exampleModal-{{$teamMember->id}}" style="border: none; background: inherit;">
                                                Delete
                                            </button>
                                            <div class="modal fade" id="exampleModal-{{$teamMember->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('team-members.destroy', $teamMember->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary">Yes
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->

@endsection
@section('script-bottom')
<script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">
    $('#products-datatable').DataTable({
        "order": [],
        "lengthMenu": [
            [50, 100, 250, 500],
            [50, 100, 250, 500]
        ],
    });
</script>
<script>
    const allModals = document.querySelectorAll(".modal");
    for (let i = 0; i < allModals.length; i++) {
        const modal = allModals[i];
        let dismissBtns = modal.querySelectorAll('[data-dismiss="modal"]');
        for (let j = 0; j < dismissBtns.length; j++) {
            dismissBtns[j].addEventListener("click", () => {
                modal.classList.remove("show");
                modal.style.display = "none"
            })
        }
    }

    const modalTriggerBtns = document.querySelectorAll('[data-trigger="modal"]');
    for (let i = 0; i < modalTriggerBtns.length; i++) {
        modalTriggerBtns[i].addEventListener("click", () => {
            let modal = document.getElementById(modalTriggerBtns[i].getAttribute("data-target"))
            modal.classList.add("show");
            modal.style.display = "block"
        })
    }
</script>
{{-- <script>
        var Success = `{{ \Session::has('success') }}`;
var Error = `{{ \Session::has('error') }}`;

if (Success) {
alert(`{{ \Session::get('success') }}`)
} else if (Error) {
alert(`{{ \Session::get('error') }}`)
}
</script> --}}
@endsection
