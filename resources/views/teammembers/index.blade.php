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
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-trigger="modal" data-target="add-member-modal"><i
                                        class="mdi mdi-plus-circle mr-1"></i></i>Add Member
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 85px;">Edit</th>
                                    <th style="width: 85px;">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teamMembers as $teamMember)
                                    <tr>
                                        <td>{{ $teamMember->name }}</td>
                                        <td>{{ $teamMember->email }}-{{$teamMember->id}}</td>

                                        <td>
                                            <a class="action-icon" data-trigger="modal" data-target="edit-member-modal">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                        </td>
                                        <!--  -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container -->
    @include('teammembers.edit')
    @include('teammembers.add-members-modal')

@endsection
@section('script-bottom')
    <script type="text/javascript">
        $('#products-datatable').DataTable();
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
@endsection
