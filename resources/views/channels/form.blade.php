@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<div>
<div class="row justify-content-between">
        <div class="col-auto">
        <h5 class="mb-3 text-uppercase">Channel Info</h5>
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
            <a href="{{route('channels.edit',['channel'=>$channel->id])}}" class="btn btn-secondary">
                <span class="fas fa-edit mr-1"></span>
                Edit Info
            </a>
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="publisher" class="form-label">Publisher</label><label class="text-danger">*</label>
            <select class="form-control" @if($condition==$lastSegment) disabled @endif name="publisher" data-toggle="select2" required>
                <option value="" selected>Select Publisher</option>
                @foreach ($availablePublishers as $key => $publisher)
                <option value="{{ $publisher->id }}" @if (isset($selectedpublisher) && $publisher->id == $selectedpublisher) selected @endif>{{ $publisher->companyName }}</option>

                @endforeach
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                Select a Publisher to continue.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="channelId" class="form-label">Channel Id</label>
            <input type="text" class="form-control" id="channelId" value="{{$channelId}}" name="channelId" readonly>

        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="channelPath" class="form-label">Channel Path</label><label class="text-danger">*</label>
                <select class="form-control" @if($condition==$lastSegment) disabled @endif name="channelPath" id="channelPath" onchange="generateChannelUrl()" data-toggle="select2" required>
                    <option value="" >Select Channel Path</option>
                    <option  selected value="https://google.com" @if (isset($selectedpublisher) && $publisher->id == $selectedpublisher) selected @endif>Channel Path 1</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid path
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-md-4 mb-3">
            <label for="c_staticParameters" class="form-label">Static Parameters<span class="text-danger"></span></label>
            <div class="input-group input-group-merge">
                <input type="text" style="pointer-events: none;" class="form-control" id="staticParameters" name="c_staticParameters" placeholder="Static Parameters">
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
            <label for="c_dynamicParameters" class="form-label">Dynamic Parameters<span class="text-danger"></span></label>
            <div class="input-group input-group-merge">
                <input type="text" style="pointer-events: none;" class="form-control" id="dynamicParameters" name="c_dynamicParameters" placeholder="Dynamic Parameters">
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
        <div class="col-md-4 mb-3">
            <label for="c_assignedFeeds" class="form-label">Assigned Feeds<span class="text-danger"></span></label>
            <div class="input-group input-group-merge">
                <input type="text" style="pointer-events: none;" class="form-control" id="assignedFeeds" name="c_assignedFeeds" placeholder="Assigned Feeds">
                <div class="input-group-append">
                    <button type="button" data-trigger="modal" data-target="assigned-feeds-modal" class="btn btn-secondary">
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
                <label for="c_integrationGuide" class="form-label">Integration Guide<span class="text-danger"></span></label>
                <div class="input-group input-group-merge">
                    <input type="text" style="pointer-events: none;" class="form-control" id="integrationGuide" name="c_integrationGuide" placeholder="Integration Guide">
                    <div class="input-group-append">
                        <button type="button" onclick="generateChannelUrl()" data-trigger="modal" data-target="add-integration-guide-modal" class="btn btn-secondary">
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
            <label for="c_priorityScore" class="form-label">Channel Performance Score</label>
            <input type="number" @if($condition==$lastSegment) disabled @endif class="form-control" id="priorityScore" value="{{old('c_priorityScore', $channel->c_priorityScore ?? '')}}" name="c_priorityScore" placeholder="Enter Channel Performance Score">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="c_comments" class="form-label">Comments/Notes</label>
            <textarea class="form-control" @if($condition==$lastSegment) disabled @endif rows="4" id="comments"  name="c_comments" placeholder="Notes...">{{old('c_comments', $channel->c_comments ?? '')}}</textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>
    @if($lastSegment=='view')
    <div class="row mb-3 px-2">
        <button type="button" class="col-auto btn btn-outline-secondary" data-trigger="modal" data-target="feed-timeline-modal">
            Channel Timeline
        </button>
    </div>
    @endif
    @if($lastSegment=='create')
    <div class="row pl-2">
        <button class="btn btn-primary col-auto" type="submit">Add Channel</button>
        <a href="{{ route('channels.index') }}" class="btn btn-secondary ml-1">Cancel</a>
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
    
    function generateRandomStr(length = 6) {
        let result = '';
        const characters = 'abcdefghijklmnopqrstuvwxyz';
        let counter = 0;
        while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
            counter += 1;
        }
        return result;
    }

    function generateChannelUrl() {
        let basePath = $("#channelPath").val();
        let channelId = $("#channelId").val();
        if (basePath === "") return;
        let staticParams = $(".staticParameter").toArray().map((param) => {
            let name = $(param).find("input#paramName").val()
            let value = $(param).find("input#paramValue").val()
            return name !== "" && value !== "" ? name + "=" + value : ""
        });
        let dynamicParams = $(".dynamicParameter").toArray().map((param) => {
            let name = $(param).find("input#paramName").val()
            return name !== "" ? (name + "=" + `<${name}>`) : ""
        });
        var allParams = [("channel=" + channelId), ...staticParams, ...dynamicParams, "q=<query>"]
            .filter(p => p !== "").join("&");
        let randomStr = generateRandomStr();
        let url = `${basePath + (basePath.endsWith("/")? "" : "/")+randomStr}?${allParams}`;
        $("#guideUrl").val(url);
    }


    function appendElementToContainer(containerId, sampleId) {
        let container = document.getElementById(containerId);
        let sample = container.querySelector("#" + sampleId);
        let element = sample.cloneNode(true);
        element.id = ""
        element.querySelectorAll("input").forEach((inp) => inp.value = "");
        container.appendChild(element);
        $('.mySelect2').select2();
    }

    function removeElementFromContainer(target, sampleId) {
        let parameter = target.parentNode.parentNode;
        if (parameter.id === sampleId) return;
        parameter.remove();
    }
</script>

@endsection