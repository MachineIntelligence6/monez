{{-- Start of Bank Details Modal  --}}
<div class="modal fade" id="add-bank-details-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <div class="modal-header border-bottom">
                <h5 class="text-uppercase modal-title"><i class="mdi mdi-bank mr-2"></i>Add Bank Details</h5>
                <button type="button" class="btn p-0" onclick="onCancelModel(this)" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="beneficiaryName" class="form-label">Beneficiary Name</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="beneficiaryName" name="beneficiaryName"  value="{{ $advertiser->bankDetails->beneficiary_name ??  old('beneficiary_name') }}" placeholder="Enter Beneficiary Name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="beneficiaryAddress" class="form-label">Beneficiary Full
                                Address</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="beneficiaryAddress" name="beneficiaryAddress"  value="{{ $advertiser->bankDetails->beneficiary_address ??  old('beneficiary_address') }}" placeholder="Enter Beneficiary Address" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="bankName" class="form-label">Bank Name</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="bankName" name="bankName"  value="{{ $advertiser->bankDetails->bank_name ??  old('bank_name') }}" placeholder="Enter Bank name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="bankAddress" class="form-label">Bank Full Address</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="bankAddress" name="bankAddress"  value="{{ $advertiser->bankDetails->bank_address ??  old('bank_address') }}" placeholder="Enter Bank Address" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label for="accountNumber" class="form-label">Account Number</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="accountNumber" name="accountNumber"  value="{{ $advertiser->bankDetails->account_number ??  old('account_number') }}" placeholder="Enter Bank account number" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="routingNumber" class="form-label">Routing Number</label>
                            <input type="number" class="form-control" id="routingNumber" name="routingNumber"  value="{{ $advertiser->bankDetails->routing_number ??  old('routing_number') }}" placeholder="Enter Routing number">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="iban" class="form-label">IBAN</label>
                            <input type="text" class="form-control" id="iban"  value="{{ $advertiser->bankDetails->iban ??  old('iban') }}" name="iban" placeholder="Enter IBAN">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="swift" class="form-label">SWIFT</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="swift"  value="{{ $advertiser->bankDetails->swift ??  old('swift') }}" name="swift" placeholder="" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label><label class="text-danger">*</label>
                            <select class="form-control" id="currency"  name="currency" required>
                                <option selected>Select Currency</option>
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" onclick="onCancelModel(this)" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="" data-dismiss="modal">Save Details</button>
            </div>
        </div>
    </div>

</div>{{-- End of Bank Details Modal  --}}