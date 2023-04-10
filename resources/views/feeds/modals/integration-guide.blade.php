{{-- Start of Integration Guide Modal  --}}
<div class="modal fade" id="add-integration-guide-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <div class="modal-header border-bottom">
                <h5 class="text-uppercase modal-title">Add Integration Guide</h5>
                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="feedUrl" class="form-label">Feed Url</label>
                        <input type="text" class="form-control" id="feedUrl"  @if($condition == $lastSegment) disabled @endif  value="{{old('feedUrl', $feed->feedintegration->feedUrl ?? '')}}" name="feedUrl" placeholder="Feed Url">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="guideUrl" class="form-label">Sub Ids</label>
                        <input type="text" class="form-control" id="subids" @if($condition == $lastSegment) disabled @endif  value="{{old('subids', $feed->feedintegration->subids ?? '')}}" name="subids" placeholder="Sub Ids">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="dailyCap" class="form-label">Daily Cap</label>
                        <input type="text" class="form-control" id="dailyCap" @if($condition == $lastSegment) disabled @endif  value="{{old('dailyCap', $feed->feedintegration->dailyCap ?? '')}}" name="dailyCap" placeholder="Daily Cap">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="acceptedGeos" class="form-label">Accepted Geos</label>
                        <input type="text" class="form-control" id="acceptedGeos" @if($condition == $lastSegment) disabled @endif value="{{old('acceptedGeos', $feed->feedintegration->acceptedGeos ?? '')}}" name="acceptedGeos" placeholder="Accepted Geos">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="searchEngine" class="form-label">Search Engine / Ads</label>
                        <input type="text" class="form-control" id="searchEngine" @if($condition == $lastSegment) disabled @endif value="{{old('searchEngine', $feed->feedintegration->searchEngine ?? '')}}" name="searchEngine" placeholder="Search Engine / Ads">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="feedType" class="form-label">Feed Type</label>
                        <input type="text" class="form-control" id="feedType" @if($condition == $lastSegment) disabled @endif value="{{old('feedType', $feed->feedintegration->feedType ?? '')}}" name="feedType" placeholder="Feed Type">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="trafficType" class="form-label">Traffic Type</label>
                        <input type="text" class="form-control" id="trafficType" @if($condition == $lastSegment) disabled @endif value="{{old('trafficType', $feed->feedintegration->trafficType ?? '')}}" name="trafficType" placeholder="Traffic Type">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="trafficSources" class="form-label">Traffic Sources</label>
                        <input type="text" class="form-control" id="trafficSources" @if($condition == $lastSegment) disabled @endif value="{{old('trafficSources', $feed->feedintegration->trafficSources ?? '')}}" name="trafficSources" placeholder="Traffic Sources">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="platform" class="form-label">Platform</label>
                        <input type="text" class="form-control" id="platform" @if($condition == $lastSegment) disabled @endif value="{{old('platform', $feed->feedintegration->platform ?? '')}}" name="platform" placeholder="Platform">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="browsers" class="form-label">Browsers</label>
                        <input type="text" class="form-control" id="browsers" @if($condition == $lastSegment) disabled @endif value="{{old('browsers', $feed->feedintegration->browsers ?? '')}}" name="browsers" placeholder="Browsers">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="otherRequirements" class="form-label">Other Requirements Like TQ, RPM, CPC, CTR etc</label>
                        <input type="text" class="form-control" id="otherRequirements" @if($condition == $lastSegment) disabled @endif value="{{old('otherRequirements', $feed->feedintegration->otherRequirements ?? '')}}" name="otherRequirements" placeholder="Other Requirements Like TQ, RPM, CPC, CTR etc">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save Details</button>
            </div>
        </div>
    </div>

</div>{{-- End of Integration Guide Modal  --}}