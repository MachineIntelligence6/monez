{{-- Start of Assigned Feeds Modal  --}}
<div class="modal fade" id="assigned-feeds-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <div class="modal-header border-bottom">
                <h5 class="text-uppercase modal-title">Assigned Feeds</h5>
                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="row justify-content-end px-2 mb-3">
                    <button type="button" onclick="appendElementToContainer('assignedFeedsContainer', 'assignedFeedSample')" class="btn btn-secondary"><i class="mdi mdi-plus"></i></button>
                </div>
                <div id="assignedFeedsContainer">
                @if(isset($channel))
                    @php
                    $data =$channel->c_assignedFeeds;
                    $array = json_decode($data, true);
                    @endphp
                    @foreach ($array as $key => $value) 
               
                    @php
                    $parts = explode(' , ', $value);
                    @endphp
                    <div class="d-flex w-100 assignedFeed mb-3" id="assignedFeedSample" style="max-width: 100%; overflow-x: hidden;">
                        <div class="col-md-6">



                            <select class="form-control" name="feed[]" id="country-dropdown" data-toggle="select2" required>
                                <option value="1" selected>Select Feed</option>
                                @foreach ($availablefeeds as $key => $feed)
                                <option value="{{ $feed->id }}">{{ $feed->feedId }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-5">
                            <input type="number" class="form-control" @if($condition == $lastSegment) disabled @endif value="{{old('dailyCap', $parts[1] ?? '')}}" id="dailyCap" name="dailyCap[]" placeholder="Enter Daily Cap" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="button" onclick="removeElementFromContainer(this, 'assignedFeedSample')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="d-flex w-100 assignedFeed mb-3" id="assignedFeedSample" style="max-width: 100%; overflow-x: hidden;">
                        <div class="col-md-6">



                            <select class="form-control" name="feed[]" id="country-dropdown" data-toggle="select2" required>
                                <option value="">Select Feed</option>
                                @foreach ($availablefeeds as $key => $feed)
                                <option value="{{ $feed->id }}" @if($feed->is_default) selected @endif>{{ $feed->feedId }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-5">
                            <input type="number" class="form-control" id="dailyCap" name="dailyCap[]" placeholder="Enter Daily Cap" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="button" onclick="removeElementFromContainer(this, 'assignedFeedSample')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save Details</button>
            </div>
        </div>
    </div>

</div>{{-- End of Assigned Feeds Modal  --}}