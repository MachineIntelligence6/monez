@extends('layouts.vertical', ['title' => 'Financial Year'])

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
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Custom Message</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <!-- <div class="inbox-rightbar"> -->

                            <h4 class="header-title mt-5 mt-sm-0">Custom Message - Admin Settings</h4>
                                <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light waves-effect"><i class="mdi mdi-archive font-18"></i></button>
                                    <button type="button" class="btn btn-sm btn-light waves-effect"><i class="mdi mdi-alert-octagon font-18"></i></button>
                                    <button type="button" class="btn btn-sm btn-light waves-effect"><i class="mdi mdi-delete-variant font-18"></i></button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-folder font-18"></i>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-header">Move to</span>
                                        <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-label font-18"></i>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-header">Label as:</span>
                                        <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-18"></i> More
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-header">More Option :</span>
                                        <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                    </div>
                                </div> -->

                                <div class="mt-4">
                                    <form>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="To">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Subject">
                                        </div>
                                        <div class="mb-3 card border-0">
                                            <div id="snow-editor" style="height: 230px;">
                                                <h3><span class="ql-size-large">Hello World!</span></h3>
                                                <p><br></p>
                                                <h3>This is an simple editable area.</h3>
                                                <p><br></p>
                                                <ul>
                                                    <li>
                                                        Select a text to reveal the toolbar.
                                                    </li>
                                                    <li>
                                                        Edit rich document on-the-fly, so elastic!
                                                    </li>
                                                </ul>
                                                <p><br></p>
                                                <p>
                                                    End of simple area
                                                </p>
                                            </div> <!-- end Snow-editor-->
                                        </div>

                                        <div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save-outline"></i></button>
                                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-delete"></i></button>
                                                <button class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="mdi mdi-send ms-2"></i> </button>
                                            </div>
                                        </div>

                                    </form>
                                </div> <!-- end card-->

                            </div>
                            <!-- end inbox-rightbar-->
                      
                        </div> <!-- end row -->

 
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->
    <!-- Modal -->
    <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Finanace</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <p>In Progress</p>
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
<script>
document.addEventListener("DOMContentLoaded", function (event) {
  var quill = new Quill('#snow-editor', {
    theme: 'snow'
  });
});
</script>

<!-- <script>
    // Snow theme
    var quill = new Quill('#snow-editor', {
        theme: 'snow',
        modules: {
            'toolbar': [
                [{
                    'font': []
                }, {
                    'size': []
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'script': 'super'
                }, {
                    'script': 'sub'
                }],
                [{
                    'header': [false, 1, 2, 3, 4, 5, 6]
                }, 'blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                ['direction', {
                    'align': []
                }],
                ['link', 'image', 'video'],
                ['clean']
            ]
        },
    });
</script> -->
@endsection
