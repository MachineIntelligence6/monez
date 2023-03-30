@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<div>
    <h5 class="mb-3 text-uppercase">Channel Info</h5>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="publisher" class="form-label">Publisher</label><label class="text-danger">*</label>
            <select class="form-control" name="publisher" data-toggle="select2" required>
                <option value="" selected>Select Publisher</option>
                <option value="advertiser1">Publisher 1</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                Select a Publisher to continue.
            </div>
        </div>
        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="channelId" class="form-label">Channel Id</label><label class="text-danger">*</label>
                <input type="text" class="form-control" value="1001" id="channelId" name="channelId" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid input
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="channelPath" class="form-label">Channel Path</label><label class="text-danger">*</label>
                <select class="form-control" name="channelPath" id="channelPath" onchange="generateChannelUrl()" data-toggle="select2" required>
                    <option value="" selected>Select Channel Path</option>
                    <option value="https://google.com">Channel Path 1</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid path
                </div>
            </div>
        </div> <!-- end col -->
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
        <div class="col-md-4 mb-3">
            <label for="assignedFeeds" class="form-label">Assigned Feeds<span class="text-danger"></span></label>
            <div class="input-group input-group-merge">
                <input type="text" style="pointer-events: none;" class="form-control" id="assignedFeeds" name="assignedFeeds" placeholder="Assigned Feeds">
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
                <label for="integrationGuide" class="form-label">Integration Guide<span class="text-danger"></span></label>
                <div class="input-group input-group-merge">
                    <input type="text" style="pointer-events: none;" class="form-control" id="integrationGuide" name="integrationGuide" placeholder="Integration Guide">
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
            <label for="priorityScore" class="form-label">Channel Performance Score</label>
            <input type="number" class="form-control" id="priorityScore" name="priorityScore" placeholder="Enter Channel Performance Score">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div> <!-- end row -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="comments" class="form-label">Comments/Notes</label>
            <textarea class="form-control" rows="4" id="comments" name="comments" placeholder="Notes..."></textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">
                You must enter valid input
            </div>
        </div>
    </div>

    <div class="row mb-3 px-2">
        <button type="button" class="col-auto btn btn-outline-secondary" data-trigger="modal" data-target="feed-timeline-modal">
            Channel Timeline
        </button>
    </div>

    <div class="row pl-2">
        <button class="btn btn-primary col-auto" type="submit">Add Channel</button>
        <a href="{{ route('channels.index') }}" class="btn btn-secondary ml-1">Cancel</a>
    </div>
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
    }

    function removeElementFromContainer(target, sampleId) {
        let parameter = target.parentNode.parentNode;
        if (parameter.id === sampleId) return;
        parameter.remove();
    }
</script>

@endsection