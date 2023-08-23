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

                    <div class="col-12 mb-3" @if($lastSegment=="create" ) style="display:none" @endif>
                        <label for="c_guideUrl" class="form-label">Channel Url</label>
                        <input type="text" class="form-control" id="guideUrl" readonly @if($condition == $lastSegment) disabled @endif  value="{{old('c_guideUrl', $channel->channelintegration->c_guideUrl ?? '')}}" name="c_guideUrl" placeholder="Channel Url">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                        {{-- <input type="hidden" class="form-control" id="guide_Url" readonly @if($condition == $lastSegment) disabled @endif  value="{{old('c_guideUrl', $channel->channelintegration->c_guideUrl ?? '')}}" name="c_guide_Url" placeholder="Channel Url"> --}}
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_subids" class="form-label">Sub Ids</label>
                        <input type="text" class="form-control" id="c_subids" @if($condition == $lastSegment) disabled @endif  value="{{old('c_subids', $channel->channelintegration->c_subids ?? '')}}" name="c_subids" placeholder="Sub Ids">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_dailyCap" class="form-label">Daily Searches Cap</label>
                        <input type="text" class="form-control" id="dailyCap" readonly @if($condition == $lastSegment) disabled @endif  value="{{old('c_dailyCap', $channel->channelintegration->c_dailyCap ?? '')}}" name="c_dailyCap" placeholder="Daily Searches Cap">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_dailyIpCap" class="form-label">Daily IP Cap</label>
                        <input type="text" class="form-control" id="dailyIpCap" readonly @if($condition == $lastSegment) disabled @endif  value="{{old('c_dailyIpCap', $channel->channelintegration->c_dailyIpCap ?? '')}}" name="c_dailyIpCap" placeholder="Daily IP Cap">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_acceptedGeos" class="form-label">Geos</label>
                        <input type="text" class="form-control" id="acceptedGeos" @if($condition == $lastSegment) disabled @endif  value="{{old('c_acceptedGeos', $channel->channelintegration->c_acceptedGeos ?? '')}}" name="c_acceptedGeos" placeholder="Geos">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_searchEngine" class="form-label">Search Engine / Ads</label>
                        <input type="text" class="form-control" id="searchEngine" @if($condition == $lastSegment) disabled @endif  value="{{old('c_searchEngine', $channel->channelintegration->c_searchEngine ?? '')}}" name="c_searchEngine" placeholder="Search Engine / Ads">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_feedType" class="form-label">Feed Type</label>
                        <input type="text" class="form-control" @if($condition == $lastSegment) disabled @endif  value="{{old('c_feedType', $channel->channelintegration->c_feedType ?? '')}}" id="feedType" name="c_feedType" placeholder="Feed Type">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_trafficType" class="form-label">Traffic Type</label>
                        <input type="text" class="form-control" @if($condition == $lastSegment) disabled @endif  value="{{old('c_trafficType', $channel->channelintegration->c_trafficType ?? '')}}" id="trafficType" name="c_trafficType" placeholder="Traffic Type">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_trafficSources" class="form-label">Traffic Sources</label>
                        <input type="text" class="form-control" id="trafficSources" @if($condition == $lastSegment) disabled @endif  value="{{old('c_trafficSources', $channel->channelintegration->c_trafficSources ?? '')}}" name="c_trafficSources" placeholder="Traffic Sources">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_platform" class="form-label">Platform</label>
                        <input type="text" class="form-control" @if($condition == $lastSegment) disabled @endif  value="{{old('c_platform', $channel->channelintegration->c_platform ?? '')}}" id="platform" name="c_platform" placeholder="Platform">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_browsers" class="form-label">Browsers</label>
                        <input type="text" class="form-control" id="browsers" @if($condition == $lastSegment) disabled @endif  value="{{old('c_browsers', $channel->channelintegration->c_browsers ?? '')}}" name="c_browsers" placeholder="Browsers">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="c_otherRequirements" class="form-label">Other Requirements Like TQ, RPM, CPC, CTR etc</label>
                        <input type="text" class="form-control" id="otherRequirements" @if($condition == $lastSegment) disabled @endif  value="{{old('c_otherRequirements', $channel->channelintegration->c_otherRequirements ?? '')}}" name="c_otherRequirements" placeholder="Other Requirements Like TQ, RPM, CPC, CTR etc">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if($lastSegment!='view')
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save Details</button>
                @endif
            </div>
        </div>
    </div>

</div>{{-- End of Integration Guide Modal  --}}
