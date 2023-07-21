{{-- Start of Bank Details Modal  --}}
<div class="modal fade" id="add-bank-details-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow shadow-5">
            <form id="bankDetailsForm" action="{{ route('publisher.store.bank') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="text-uppercase modal-title"><i class="mdi mdi-bank mr-2"></i>Add Bank Details</h5>
                    <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body modal-scroll">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="beneficiaryName" class="form-label">Beneficiary Name</label><label class="text-danger">*</label>
                                <input type="text" @if($lastSegment!='view' ) @else disabled @endif class="form-control" id="beneficiaryName" name="bank_beneficiary_name" value="{{(session()->has('publisher') && session()->get('publisher.bank_beneficiary_name')) ? session()->get('publisher.bank_beneficiary_name'):$publisher->bank_beneficiary_name }}" placeholder="Enter Beneficiary Name" required>
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
                                <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="beneficiaryAddress" name="bank_beneficiary_address" value="{{(session()->has('publisher') && session()->get('publisher.bank_beneficiary_address')) ? session()->get('publisher.bank_beneficiary_address'):$publisher->bank_beneficiary_address }}" placeholder="Enter Beneficiary Address" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="bankName" class="form-label">Bank Name</label><label class="text-danger">*</label>
                                <input type="text" id="bankName" class="form-control" @if($lastSegment!='view' ) @else disabled @endif name="bank_name" value="{{(session()->has('publisher') && session()->get('publisher.bank_name')) ? session()->get('publisher.bank_name'): $publisher->bank_name }}" placeholder="Enter Bank name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="bankAddress" class="form-label">Bank Full Address</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="bankAddress" name="bank_address" value="{{(session()->has('publisher') && session()->get('publisher.bank_address')) ? session()->get('publisher.bank_address'):$publisher->bank_address }}" placeholder="Enter Bank Address" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">Account Number</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="accountNumber" name="bank_account_number" value="{{(session()->has('publisher') && session()->get('publisher.bank_account_number') ) ? session()->get('publisher.bank_account_number'):$publisher->bank_account_number}}" placeholder="Enter Bank account number" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="routingNumber" class="form-label">Routing Number</label>
                                <input type="number" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="routingNumber" name="bank_routing_number" value="{{(session()->has('publisher') && session()->get('publisher.bank_routing_number')) ? session()->get('publisher.bank_routing_number') : $publisher->bank_routing_number }}" placeholder="Enter Routing number">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="iban" class="form-label">IBAN</label>
                                <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="iban" value="{{(session()->has('publisher') && session()->get('publisher.bank_iban')) ? session()->get('publisher.bank_iban'):$publisher->bank_iban }}" name="bank_iban" placeholder="Enter IBAN">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="swift" class="form-label">SWIFT</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" @if($lastSegment!='view' ) @else disabled @endif id="swift" value="{{(session()->has('publisher') && session()->get('publisher.bank_swift')) ? session()->get('publisher.bank_swift'):$publisher->bank_swift}}" name="bank_swift" placeholder="" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label><label class="text-danger">*</label>
                                <select class="form-control" id="currency" data-toggle="select2" @if($lastSegment!='view' ) @else disabled @endif name="bank_currency" required>
                                    <option selected>Select Currency</option>
                                 @foreach ($currencyList as $cur)
                                    <option @if((session()->has('publisher') && session()->get('publisher.bank_currency')) ? session()->get('publisher.bank_currency') : $publisher->bank_currency == $cur) selected @endif value='{{$cur}}'>{{$cur}}</option>
                                    @endforeach  
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if($lastSegment=='create')
                    <button type="submit" class="btn btn-primary">Save Details</button>
                    @else
                    <button @if ($lastSegment != 'financeinfo') disabled @endif type="submit" class="btn btn-primary">Save Details</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

</div>{{-- End of Bank Details Modal  --}}
