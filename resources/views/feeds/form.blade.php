@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<div>

    <div class="row justify-content-between">
        <div class="col-auto">
            <h5 class="mb-3 text-uppercase">Feed Info</h5>
        </div>

        <div class="col-auto">
            @if($lastSegment=='create')

            @elseif($lastSegment=='edit')
            <!-- <a href="#" class="btn btn-primary">
                <span  class="fas fa-check mr-1"></span>
                Save Info
            </a> -->
            <button class="btn btn-primary" type="submit"><span class="fas fa-check mr-1"></span>
                Save Info</button>
            @else
            <a href="{{route('feeds.edit',['feed'=>$feed->id])}}" class="btn btn-secondary">
                <span class="fas fa-edit mr-1"></span>
                Edit Info
            </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="advertiser" class="form-label">Advertiser</label><label class="text-danger">*</label>
            <select name="advertiser" class="form-control" @if($condition==$lastSegment) disabled @endif id="advertiserZ-dropdown" data-toggle="select2" required>
                <option value="" selected>Select Advertiser</option>
                @foreach ($advertisers as $key => $advertiser)
                <option value="{{ $advertiser->id }}" @if (isset($selectedAdv) && $advertiser->id == $selectedAdv) selected @endif>{{ $advertiser->companyName }}</option>

                @endforeach
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                Select an Advertiser to continue.
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="feedId" class="form-label">Feed ID</label><label class="text-danger">*</label>
                <div class="input-group input-group-merge">
                    @if($lastSegment == 'create')
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span>fd_</span>
                        </div>
                    </div>
                    @endif
                    @if($lastSegment == 'edit')
                    <input type="text" class="form-control" id="feedId" name="feedId" value="{{old('feedId', $feed->feedId ?? '')}}" placeholder="Enter Feed ID" disabled />
                    @else
                    <input type="text" class="form-control" @if($condition==$lastSegment) disabled @endif id="feedId" name="feedId" value="{{old('feedId', $feed->feedId ?? '')}}" placeholder="Enter Feed ID" required />
                    @endif

                    <!-- <input type="text" class="form-control"  id="feedId" name="feedId" value="{{old('feedId', $feed->feedId ?? '')}}" placeholder="Enter Feed ID" required /> -->
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="feedPath" class="form-label">Feed Path</label><label class="text-danger">*</label>
                <input type="url" class="form-control" @if($condition==$lastSegment) disabled @endif id="feedPath" onblur="generateFeedUrl()" value="{{old('feedPath', $feed->feedPath ?? '')}}" name="feedPath" placeholder="Enter Feed Path" required pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid path
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label for="keywordParameter" class="form-label">Keyword Parameter</label><label class="text-danger">*</label>
                <input type="text" class="form-control" id="keywordParameter" @if($condition==$lastSegment) disabled @endif value="{{old('keywordParameter', $feed->keywordParameter ?? '')}}" onblur="generateFeedUrl()" name="keywordParameter" placeholder="Enter Keyword Parameter" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="staticParameters" class="form-label">Static Parameters<span class="text-danger"></span></label>
            <div class="input-group input-group-merge">
                <input type="text" style="pointer-events: none;" class="form-control" id="staticParameters" name="staticParameters" placeholder="Static Parameters">
                <div class="input-group-append">
                    <button type="button" data-trigger="modal" data-target="add-static-parameters-modal" class="btn btn-secondary">
                        <span class="mdi mdi-plus"></span>
                    </button>
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="dynamicParameters" class="form-label">Dynamic Parameters<span class="text-danger"></span></label>
            <div class="input-group input-group-merge">
                <input type="text" style="pointer-events: none;" class="form-control" id="dynamicParameters" name="dynamicParameters" placeholder="Dynamic Parameters">
                <div class="input-group-append">
                    <button type="button" data-trigger="modal" data-target="add-dynamic-parameters-modal" class="btn btn-secondary">
                        <span class="mdi mdi-plus"></span>
                    </button>
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="integrationGuide" class="form-label">Integration Guide<span class="text-danger"></span></label>
                <div class="input-group input-group-merge">
                    <input type="text" style="pointer-events: none;" class="form-control" id="integrationGuide" name="integrationGuide" placeholder="Integration Guide">
                    <div class="input-group-append">
                        <button type="button" onclick="generateFeedUrl()" data-trigger="modal" data-target="add-integration-guide-modal" class="btn btn-secondary">
                            <span class="mdi mdi-plus"></span>
                        </button>
                    </div>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="priorityScore" class="form-label">Feed Priority Score</label>

            <input type="number" class="form-control" id="priorityScore" @if($condition==$lastSegment) disabled @endif value="{{old('priorityScore', $feed->priorityScore ?? '')}}" name="priorityScore" placeholder="Enter Priority Score">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="comments" class="form-label">Comments/Notes</label>
            <textarea class="form-control" rows="4" @if($condition==$lastSegment) disabled @endif id="comments" name="comments" placeholder="Notes...">{{old('comments', $feed->comments ?? '')}}</textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>
    @if($lastSegment=='view')
    <div class="row mb-3 px-2">
        <button type="button" class="col-auto btn btn-outline-secondary" data-trigger="modal" data-target="feed-timeline-modal">Feed Timeline</button>
    </div>
    @endif

    @if($lastSegment=='create')
    <div class="row pl-2">

        <button class="btn btn-primary col-auto" type="submit">Add Feed</button>

        <a href="{{ route('feeds.index') }}" class="btn btn-secondary ml-1">Cancel</a>
    </div>

    @endif

</div>





@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>


<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script src="{{asset('assets/js/modal-init.js')}}"></script>

<script>
    function generateFeedUrl() {
        let basePath = $("#feedPath").val();
        if (basePath === "") return;
        let searchKeyword = $("#keywordParameter").val()
        let searchParam = searchKeyword !== "" ? searchKeyword + "=<query>" : "";
        let staticParams = $(".staticParameter").toArray().map((param) => {
            let name = $(param).find("input#paramName").val()
            let value = $(param).find("input#paramValue").val()
            return name !== "" && value !== "" ? name + "=" + value : ""
        });
        let dynamicParams = $(".dynamicParameter").toArray().map((param) => {
            let name = $(param).find("input#paramName").val()
            return name !== "" ? (name + "=" + `<${name}>`) : ""
        });
        var allParams = [...staticParams, ...dynamicParams, searchParam]
            .filter(p => p !== "").join("&");
        let url = `${basePath}?${allParams}`;
        $("#guideUrl").val(url);
    }


    function appendElementToContainer(containerId, sampleId) {
        let container = document.getElementById(containerId);
        let sample = container.querySelector("#" + sampleId);
        let element = sample.cloneNode(true);
        element.id = ""
        element.querySelectorAll("input").forEach((inp) => inp.value = "");
        container.appendChild(element);
    }

    function removeElementFromContainer(target, sampleId) {
        let parameter = target.parentNode.parentNode;
        if (parameter.id === sampleId) return;
        parameter.remove();
    }
</script>

@endsection