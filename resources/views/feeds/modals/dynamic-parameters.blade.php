{{-- Start of Dynamic Parameters Modal  --}}
<div class="modal fade" id="add-dynamic-parameters-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <div class="modal-header border-bottom">
                <h5 class="text-uppercase modal-title">Dynamic Parameters</h5>
                <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="row justify-content-end px-2 mb-3">
                    <button type="button" @if($condition == $lastSegment) disabled @endif onclick="appendElementToContainer('dynamicParametersContainer', 'dynamicParameterSample')" class="btn btn-secondary"><i class="mdi mdi-plus"></i></button>
                </div>
                <div id="dynamicParametersContainer">
                @if(isset($feed))
                    @php
                    $data =$feed->dynamicParameters;
                    $array = json_decode($data, true);
                    @endphp
                    @foreach ($array as $key => $value)

                    @php
                    $parts = explode(' , ', $value);
                    @endphp
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="keywordParameter" class="form-label">Dynamic Parameter</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="keywordParameter" @if($condition==$lastSegment) disabled @endif value="{{old('keywordParameter', $feed->keywordParameter ?? '')}}" onblur="generateFeedUrl()" name="keywordParameter" placeholder="Enter Keyword Parameter" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                 You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="d-flex w-100 dynamicParameter mb-3" id="dynamicParameterSample" style="max-width: 100%; overflow-x: hidden;">
                        <div class="col-md-6">
                            <input type="text" class="form-control" @if($condition == $lastSegment) disabled @endif  id="paramName" value="{{old('dy_paramName', $parts[0] ?? '')}}" name="dy_paramName[]" placeholder="Enter Parameter Name" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="paramValue"  @if($condition == $lastSegment) disabled @endif value="{{old('dy_paramValue', $parts[1] ?? '')}}" name="dy_paramValue[]" placeholder="Enter Channel Parameter" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="button" onclick="removeElementFromContainer(this, 'dynamicParameterSample')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="keywordParameter" class="form-label">Dynamic Parameter</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="keywordParameter" @if($condition==$lastSegment) disabled @endif value="{{old('keywordParameter', $feed->keywordParameter ?? '')}}" onblur="generateFeedUrl()" name="keywordParameter" placeholder="Enter Keyword Parameter" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                    <div class="d-flex w-100 dynamicParameter mb-3" id="dynamicParameterSample" style="max-width: 100%; overflow-x: hidden;">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="paramName" name="dy_paramName[]" placeholder="Enter Parameter Name" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="paramValue" name="dy_paramValue[]" placeholder="Enter Channel Parameter" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="button" onclick="removeElementFromContainer(this, 'dynamicParameterSample')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>
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

</div>{{-- End of Dynamic Parameters Modal  --}}
