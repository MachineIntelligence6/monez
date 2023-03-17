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
                        <li class="breadcrumb-item active">Search Link</li>
                    </ol>
                </div>
                <h4 class="page-title">Search Link</h4>
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
                            <button type="button" class="btn btn-danger waves-effect waves-light text-light" data-trigger="modal" data-target="add-member-modal">
                                <i class="mdi mdi-plus-circle mr-1"></i></i>Add Link
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Path</th>
                                    <th>Company / Legal Name</th>
                                    <th>Website</th>
                                    <th>Account Email</th>
                                    <th>Name</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-end mb-0">--}}
                    {{-- <li class="page-item">--}}
                    {{-- <a class="page-link" href="javascript: void(0);" aria-label="Previous">--}}
                    {{-- <span aria-hidden="true">«</span>--}}
                    {{-- <span class="sr-only">Previous</span>--}}
                    {{-- </a>--}}
                    {{-- </li>--}}
                    {{-- <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>--}}
                    {{-- <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>--}}
                    {{-- <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>--}}
                    {{-- <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>--}}
                    {{-- <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>--}}
                    {{-- <li class="page-item">--}}
                    {{-- <a class="page-link" href="javascript: void(0);" aria-label="Next">--}}
                    {{-- <span aria-hidden="true">»</span>--}}
                    {{-- <span class="sr-only">Next</span>--}}
                    {{-- </a>--}}
                    {{-- </li>--}}
                    {{-- </ul>--}}

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->


<div class="modal fade" id="add-member-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <form action="#" method="post" class="modal-content shadow shadow-5">
            <div class="modal-header">
                <h5 class="mb-3 text-uppercase modal-title">Add Team Member</h5>
                <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password-input-field" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text btn">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="skype" class="form-label">Skype</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-skype"></i></span>
                            <input type="text" class="form-control" id="skype" name="skype" placeholder="@username">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                            <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="Url">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>


@endsection
@section('script-bottom')
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
<script type="text/javascript">
    $('#products-datatable').DataTable();
</script>
@endsection