@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<div>
    <h5 class="mb-3 text-uppercase">Feed Info</h5>
    <div class="row">
        <div class="col-md-7">
            <div class="mb-3">
                <label for="feedName" class="form-label">Feed Name</label>
                <input type="text" class="form-control" id="feedName" name="feedName" placeholder="Enter Feed Name" />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="mb-3">
                <label for="feedUrl" class="form-label">Feed Url</label><label class="text-danger">*</label>
                <input type="url" class="form-control" id="feedUrl" name="feedUrl" placeholder="Enter Feed Url" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-md-7">
            <div class="mb-3">
                <label for="keywordParameter" class="form-label">Keyword Parameter</label><label class="text-danger">*</label>
                <input type="text" class="form-control" id="keywordParameter" name="keywordParameter" placeholder="Enter Keyword Parameter" required>
            </div>
        </div>
    </div> <!-- end row -->
    <div class="col-md-7 my-2 row justify-content-between p-0 pl-2">
        <h5 class="text-uppercase">Feed Url Parameters</h5>
        <button type="button" class="btn btn-secondary"><i class="mdi mdi-plus"></i></button>
    </div>
    <div id="feedUrlParametersContainer">
        <div class="row mb-3 feedUrlParameter">
            <div class="col-md-7 mb-1">
                <input type="text" class="form-control" id="feedParamName" name="feedParamName" placeholder="Enter Parameter Name" />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
            <div class="col-md-7 mb-1">
                <input type="text" class="form-control" id="feedParamValue" name="feedParamValue" placeholder="Enter Parameter Value" />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
    </div>

    <div class="row pl-2">
        <button class="btn btn-primary col-auto" type="submit">Add Feed</button>
        <a href="{{ route('feeds.index') }}" class="btn btn-secondary ml-1">Cancel</a>
    </div>
</div>




@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script>

    const feedUrlParametersContainer = document.getElementById("feedUrlParametersContainer");

    function addFeedUrlParameter()

</script>

@endsection