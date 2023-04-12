    {{-- Start of Reports Modal  --}}
    <div class="modal fade" id="report-type-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow shadow-5">
                <div class="modal-header border-bottom">
                    <h5 class="text-uppercase modal-title">Add Report Details</h5>
                    <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 mb-3 d-none report-creds-input api-input-group">
                            <label for="apiKey" class="form-label">API Key</label>
                            <input type="text" class="form-control" id="apiKey" name="apiKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input dashboard-input-group">
                            <label for="dashboardPath" class="form-label">Dashboard Path</label>
                            <input type="text" class="form-control" id="dashboardPath" name="dashboardPath">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="reportEmail" name="reportEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="reportPassword" class="form-control" name="reportPassword">
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
                            <input type="email" class="form-control" id="gdriveEmail" name="gdriveEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                            <label for="gdrivePassword" class="form-label">GDrive Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="gdrivePassword" class="form-control" name="gdrivePassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
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
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save Details</button>
                </div>
            </div>
        </div>
    </div>{{-- End of Reports Modal  --}}