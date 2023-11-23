    {{-- Start of Reports Modal  --}}
    <div class="modal fade" id="report-type-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow shadow-5">
                <form id="reportTypeForm" action="{{ route('advertiser.store.report') }}" method="POST" class="needs-validation" novalidate>
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
                                    <select class="form-control" id="reportType" data-toggle="select2" name="report_type" required value="{{(session()->has('advertiser')&& session()->get('advertiser.report_type'))? session()->get('advertiser.report_type'):$advertiser->report_type}}">
                                        <option value="" selected>Select Report Type</option>
                                        <option {{(session()->get('advertiser.report_type') == 'file') ? 'selected' : ''}} value="file">Upload File</option>
                                        <option {{(session()->get('advertiser.report_type') == 'api') ? 'selected' : ''}} value="api">API</option>
                                        <option {{(session()->get('advertiser.report_type') == 'email') ? 'selected' : ''}} value="email">EMAIL</option>
                                        <option {{(session()->get('advertiser.report_type') == 'gdrive') ? 'selected' : ''}} value="gdrive">Google Drive</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        You must enter valid input
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input file-input-group">
                            <label for="upload_csv" class="form-label">Upload CSV</label>
                            <input type="file" class="form-control"  name="upload_csv">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>                        
                        <div class="col-12 mb-3 d-none report-creds-input api-input-group">
                            <label for="apiKey" class="form-label">API Key</label>
                            <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="apiKey" value="{{(session()->has('advertiser') && session()->get('advertiser.api_key')) ? session()->get('advertiser.api_key'):$advertiser->api_key}}" name="api_key">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <!--<div class="col-12 mb-3 d-none report-creds-input dashboard-input-group">
                            <label for="dashboardPath" class="form-label">Dashboard Path</label>
                            <input type="text" class="form-control" id="dashboardPath" value="{{(session()->has('advertiser')&& session()->get('advertiser.dashboard_path')) ? session()->get('advertiser.dashboard_path'):$advertiser->dashboard_path}}" name="dashboard_path">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div> -->
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="reportEmail" value="{{(session()->has('advertiser') && session()->get('advertiser.email')) ? session()->get('advertiser.email'):$advertiser->email}}" name="email">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="reportPassword" @if($lastSegment!='view' ) @else disabled @endif class="form-control" value="{{(session()->has('advertiser') && session()->get('advertiser.password')) ? session()->get('advertiser.password'):$advertiser->password}}" name="password">
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
                            <label for="client_id" class="form-label">Client ID</label>
                            <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif value="{{(session()->has('advertiser') && session()->get('advertiser.gdrive_email')) ? session()->get('advertiser.gdrive_email'):$advertiser->gdrive_email}}" id="client_id" name="client_id">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>

                            <label for="c_secret" class="form-label">Client Secret</label>
                            <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif value="{{(session()->has('advertiser') && session()->get('advertiser.gdrive_email')) ? session()->get('advertiser.gdrive_email'):$advertiser->gdrive_email}}" id="c_secret" name="c_secret">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>  

                            <label for="c_folder" class="form-label">Client Folder</label>
                            <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif value="{{(session()->has('advertiser') && session()->get('advertiser.gdrive_email')) ? session()->get('advertiser.gdrive_email'):$advertiser->gdrive_email}}" id="c_folder" name="c_folder">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>

                            <label for="secret" class="form-label">Client Secret</label>
                            <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif value="{{(session()->has('advertiser') && session()->get('advertiser.gdrive_email')) ? session()->get('advertiser.gdrive_email'):$advertiser->gdrive_email}}" id="gdriveEmail" name="gdrive_email">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>                                                                                  
                        </div>                        
                        <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                            <label for="gdriveEmail" class="form-label">GDrive Email</label>
                            <input type="email" class="form-control" @if($lastSegment!='view' ) @else disabled @endif value="{{(session()->has('advertiser') && session()->get('advertiser.gdrive_email')) ? session()->get('advertiser.gdrive_email'):$advertiser->gdrive_email}}" id="gdriveEmail" name="gdrive_email">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                            <label for="gdrivePassword" class="form-label">GDrive Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="gdrivePassword" @if($lastSegment!='view' ) @else disabled @endif value="{{(session()->has('advertiser') && session()->get('advertiser.gdrive_password')) ? session()->get('advertiser.gdrive_password'):$advertiser->gdrive_password}}" class="form-control" name="gdrive_password">
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
                            <input type="text" class="form-control" id="dateColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.date') : old('dateColValue')}}" name="dateColValue">
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
                            <input type="text" class="form-control" id="feedColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.feed') : old('feedColValue')}}" name="feedColValue">
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
                            <input type="text" class="form-control" id="subidColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.subid') : old('subidColValue')}}" name="subidColValue">
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
                            <input type="text" class="form-control" id="countryColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.country') : old('countryColValue')}}" name="countryColValue">
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
                            <input type="text" class="form-control" id="totalSearchesColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.total_searches') : old('totalSearchesColValue')}}" name="totalSearchesColValue">
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
                            <input type="text" class="form-control" id="monitizedSearchesColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.monitized_searches') : old('monitizedSearchesColValue')}}" name="monitizedSearchesColValue">
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
                            <input type="text" class="form-control" id="paidClicksColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.paid_clicks') : old('paidClicksColValue')}}" name="paidClicksColValue">
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
                            <input type="text" class="form-control" id="revenueColValue" @if($lastSegment!='view' ) @else disabled @endif value="{{session()->get('advertiser.report_coloumns') ? session()->get('advertiser.report_coloumns.revenue') : old('revenueColValue')}}" name="revenueColValue">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Save Details</button>
                </div>
                </form>
            </div>
        </div>
    </div>{{-- End of Reports Modal  --}}
