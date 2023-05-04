@if($lastSegment=='create')
{{-- Start of Reports Modal  --}}
<div class="modal fade" id="report-details-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <form id="reportTypeForm" action="{{ route('store.reporttype') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="text-uppercase modal-title">Add Report Details</h5>
                    <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body modal-scroll">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="reportType" class="form-label">Report Type</label>
                                <div class="input-group input-group-merge">
                                    <select class="form-control" id="reportType" data-toggle="select2" name="reportType" required value="{{session()->get('advertiserReportType.report_type')}}">
                                        <option value="" selected>Report Type</option>
                                        <option value="api">API</option>
                                        <option value="email">EMAIL</option>
                                        <option value="gdrive">Google Drive</option>
                                        <option value="dashboard">Dashboard</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        You must enter valid input
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input api-input-group">
                            <label for="apiKey" class="form-label">API Key</label>
                            <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="apiKey" value="{{session()->get('advertiserReportType.api_key')}}" name="apiKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input dashboard-input-group">
                            <label for="dashboardPath" class="form-label">Dashboard Path</label>
                            <input type="text" class="form-control" id="dashboardPath" value="{{session()->get('advertiserReportType.dashboard_path')}}" name="dashboardPath">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="reportEmail" value="{{session()->get('advertiserReportType.email')}}" name="reportEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="reportPassword" @if($lastSegment!='view' ) @else disabled @endif class="form-control" value="{{session()->get('advertiserReportType.password')}}" name="reportPassword">
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
                        <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                            <label for="gdriveEmail" class="form-label">GDrive Email</label>
                            <input type="email" class="form-control" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportType.gdriveEmail')}}" id="gdriveEmail" name="gdriveEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                            <label for="gdrivePassword" class="form-label">GDrive Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="gdrivePassword" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportType.gdrivePassword')}}" class="form-control" name="gdrivePassword">
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
                    </div>
                    <h5>Report Columns</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dateKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="date" id="dateKey" name="dateKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dateColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="dateColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.date')}}" name="dateColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feedKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="feed" id="feedKey" name="feedKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feedColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="feedColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.feed')}}" name="feedColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subidKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="subid" id="subidKey" name="subidKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subidColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="subidColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.subid')}}" name="subidColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countryKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="country" id="countryKey" name="countryKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countryColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="countryColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.country')}}" name="countryColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalSearchesKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="total searches" id="totalSearchesKey" name="totalSearchesKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalSearchesColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="totalSearchesColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.total_searches')}}" name="totalSearchesColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monitizedSearchesKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="monitized searches" id="monitizedSearchesKey" name="monitizedSearchesKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monitizedSearchesColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="monitizedSearchesColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.monitized_searches')}}" name="monitizedSearchesColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paidClicksKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="paid clicks" id="paidClicksKey" name="paidClicksKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paidClicksColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="paidClicksColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.paid_clicks')}}" name="paidClicksColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="revenueKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="revenue" id="revenueKey" name="revenueKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="revenueColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="revenueColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiserReportColumn.revenue')}}" name="revenueColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if($lastSegment=='operationinfo' || $lastSegment=='create' )
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Save Details</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>{{-- End of Reports Modal  --}}
@else
{{-- Start of Reports Modal  --}}
<div class="modal fade" id="report-details-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <form id="reportTypeForm" action="{{ route('store.reporttype') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="text-uppercase modal-title">Add Report Details</h5>
                    <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body modal-scroll">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="reportType" class="form-label">Report Type</label>
                                <div class="input-group input-group-merge">
                                    <select class="form-control" id="reportType" data-toggle="select2" name="reportType" required value="{{ $advertiser->reportTypes->report_type ??  old('report_type') }}">
                                        <option value="">Report Type</option>
                                        <option @if(isset($advertiser) && $advertiser->reportTypes->report_type == 'api') selected @endif value="api">API</option>
                                        <option @if(isset($advertiser) && $advertiser->reportTypes->report_type == 'email') selected @endif value="email">EMAIL</option>
                                        <option @if(isset($advertiser) && $advertiser->reportTypes->report_type == 'gdrive') selected @endif value="gdrive">Google Drive</option>
                                        <option @if(isset($advertiser) && $advertiser->reportTypes->report_type == 'dashboard') selected @endif value="dashboard">Dashboard</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        You must enter valid input
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 @if(isset($advertiser) && $advertiser->reportTypes->report_type != 'api') d-none @endif report-creds-input api-input-group">
                            <label for="apiKey" class="form-label">API Key</label>
                            <input type="text" class="form-control" @if($lastSegment=='operationinfo' || $lastSegment=='create' ) @else disabled @endif id="apiKey" value="{{ $advertiser->reportTypes->api_key ??  old('api_key') }}" name="apiKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 @if(isset($advertiser) && $advertiser->reportTypes->report_type != 'dashboard') d-none @endif  report-creds-input dashboard-input-group">
                            <label for="dashboardPath" class="form-label">Dashboard Path</label>
                            <input type="text" class="form-control" id="dashboardPath" value="{{ $advertiser->reportTypes->dashboard_path ??  old('dashboard_path') }}" name="dashboardPath">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 @if(isset($advertiser) && $advertiser->reportTypes->report_type != 'email') d-none @endif report-creds-input email-input-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" @if($lastSegment=='operationinfo' || $lastSegment=='create' ) @else disabled @endif id="reportEmail" value="{{ $advertiser->reportTypes->email ??  old('email') }}" name="reportEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 @if(isset($advertiser) && $advertiser->reportTypes->report_type != 'email') d-none @endif report-creds-input email-input-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="reportPassword" @if($lastSegment=='operationinfo' || $lastSegment=='create' ) @else disabled @endif class="form-control" value="{{ $advertiser->reportTypes->password ??  old('password') }}" name="reportPassword">
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
                        <div class="col-12 mb-3 @if(isset($advertiser) && $advertiser->reportTypes->report_type != 'gdrive') d-none @endif report-creds-input gdrive-input-group">
                            <label for="gdriveEmail" class="form-label">GDrive Email</label>
                            <input type="email" class="form-control" @if($lastSegment=='operationinfo' || $lastSegment=='create' ) @else disabled @endif value="{{ $advertiser->reportTypes->gdriveEmail ??  old('gdriveEmail') }}" id="gdriveEmail" name="gdriveEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 @if(isset($advertiser) && $advertiser->reportTypes->report_type != 'gdrive') d-none @endif report-creds-input gdrive-input-group">
                            <label for="gdrivePassword" class="form-label">GDrive Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="gdrivePassword" @if($lastSegment=='operationinfo' || $lastSegment=='create' ) @else disabled @endif value="{{ $advertiser->reportTypes->gdrivePassword ??  old('gdrivePassword') }}" class="form-control" name="gdrivePassword">
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
                    </div>
                    <h5>Report Columns</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dateKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="date" id="dateKey" name="dateKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dateColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="dateColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->date ??  old('date') }}" name="dateColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feedKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="feed" id="feedKey" name="feedKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feedColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="feedColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->feed ??  old('feed') }}" name="feedColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subidKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="subid" id="subidKey" name="subidKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subidColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="subidColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->subid ??  old('subid') }}" name="subidColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countryKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="country" id="countryKey" name="countryKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countryColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="countryColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->country ??  old('country') }}" name="countryColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalSearchesKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="total searches" id="totalSearchesKey" name="totalSearchesKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalSearchesColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="totalSearchesColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->total_searches ??  old('total_searches') }}" name="totalSearchesColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monitizedSearchesKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="monitized searches" id="monitizedSearchesKey" name="monitizedSearchesKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monitizedSearchesColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="monitizedSearchesColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->monitized_searches ??  old('monitized_searches') }}" name="monitizedSearchesColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paidClicksKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="paid clicks" id="paidClicksKey" name="paidClicksKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paidClicksColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="paidClicksColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->paid_clicks ??  old('paid_clicks') }}" name="paidClicksColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="revenueKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="revenue" id="revenueKey" name="revenueKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="revenueColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="revenueColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{ $advertiser->reportColumns->revenue ??  old('revenue') }}" name="revenueColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if($lastSegment=='operationinfo' || $lastSegment=='create' )
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Save Details</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>{{-- End of Reports Modal  --}}
@endif