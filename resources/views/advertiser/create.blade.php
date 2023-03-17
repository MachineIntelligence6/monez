@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i> Account Info</h5>
                    <form class="needs-validation" method="post" action="{{ route('advertiser.store') }}"
                          enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('POST')
                        @include('advertiser.form')
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-bank-details-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow shadow-5">
                <div class="modal-header">
                    <h5 class="mb-3 text-uppercase modal-title"><i class="mdi mdi-bank mr-2"></i>Add Bank Details</h5>
                    <button type="button" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="beneficiaryName" class="form-label">Beneficiary Name</label><label
                                    class="text-danger">*</label>
                                <input type="text" class="form-control" id="beneficiaryName" name="beneficiaryName"
                                       placeholder="Enter Beneficiary Name" required>
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
                                <input type="text" class="form-control" id="beneficiaryAddress"
                                       name="beneficiaryAddress" placeholder="Enter Beneficiary Address" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="bankName" class="form-label">Bank Name</label><label
                                    class="text-danger">*</label>
                                <input type="text" class="form-control" id="bankName" name="bankName"
                                       placeholder="Enter Bank name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="bankAddress" class="form-label">Bank Full Address</label><label
                                    class="text-danger">*</label>
                                <input type="text" class="form-control" id="bankAddress" name="bankAddress"
                                       placeholder="Enter Bank Address" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">Account Number</label><label
                                    class="text-danger">*</label>
                                <input type="text" class="form-control" id="accountNumber" name="accountNumber"
                                       placeholder="Enter Bank account number" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="routingNumber" class="form-label">Routing Number</label><label
                                    class="text-danger">*</label>
                                <input type="number" class="form-control" id="routingNumber" name="routingNumber"
                                       placeholder="Enter Routing number" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="iban" class="form-label">IBAN</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="iban" name="iban" placeholder="Enter IBAN"
                                       required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="swift" class="form-label">SWIFT</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="swift" name="swift" placeholder="" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label><label
                                    class="text-danger">*</label>
                                <select class="form-control" id="currency" name="currency" required>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Details</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="report-type-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <form action="#" method="post" class="modal-content shadow shadow-5">
                <div class="modal-header">
                    <h5 class="mb-3 text-uppercase modal-title">Add Report Details</h5>
                    <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="reportType" class="form-label">Type</label><label class="text-danger">*</label>
                            <select class="form-control" id="report-type-input" name="reportType" required>
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
                        <div class="col-12 mb-3 d-none report-creds-input api-input-group">
                            <label for="apiKey" class="form-label">API Key</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" id="apiKey" name="apiKey">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input dashboard-input-group">
                            <label for="dashboardPath" class="form-label">Dashboard Path</label><label
                                class="text-danger">*</label>
                            <input type="text" class="form-control" id="dashboardPath" name="dashboardPath">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="email" class="form-label">Email</label><label class="text-danger">*</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input email-input-group">
                            <label for="password" class="form-label">Password</label><label
                                class="text-danger">*</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-input-field" class="form-control" name="password"
                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
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
                            <label for="gdriveEmail" class="form-label">GDrive Email</label><label
                                class="text-danger">*</label>
                            <input type="email" class="form-control" id="gdriveEmail" name="gdriveEmail">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none report-creds-input gdrive-input-group">
                            <label for="gdrivePassword" class="form-label">GDrive Password</label><label
                                class="text-danger">*</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-input-field" class="form-control" name="password"
                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
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
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Details</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="define-report-columns-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <form action="#" method="post" class="modal-content shadow shadow-5">
                <div class="modal-header">
                    <h5 class="mb-3 text-uppercase modal-title">Add Report Columns</h5>
                    <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                        <h3 class="fe-x m-0"></h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dateKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="date" id="dateKey" name="dateKey"
                                   required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dateColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="dateColValue" name="dateColValue" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feedKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="feed" id="feedKey" name="feedKey"
                                   required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feedColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="feedColValue" name="feedColValue" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subidKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="subid" id="subidKey" name="subidKey"
                                   required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subidColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="subidColValue" name="subidColValue" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countryKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="country" id="countryKey"
                                   name="countryKey" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="countryColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="countryColValue" name="countryColValue"
                                   required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalSearchesKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="total searches"
                                   id="totalSearchesKey" name="totalSearchesKey" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalSearchesColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="totalSearchesColValue"
                                   name="totalSearchesColValue" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monitizedSearchesKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="monitized searches"
                                   id="monitizedSearchesKey" name="monitizedSearchesKey" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monitizedSearchesColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="monitizedSearchesColValue"
                                   name="monitizedSearchesColValue" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paidClicksKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="paid clicks" id="paidClicksKey"
                                   name="paidClicksKey" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paidClicksColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="paidClicksColValue" name="paidClicksColValue"
                                   required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="revenueKey" class="form-label">Key</label>
                            <input type="text" class="form-control" disabled value="revenue" id="revenueKey"
                                   name="revenueKey" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="revenueColValue" class="form-label">Value</label>
                            <input type="text" class="form-control" id="revenueColValue" name="revenueColValue"
                                   required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Details</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')

    <script>

        const passwordCharset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        const specialChars = "!$%#^&|?"

        function generateNewPassword() {
            var passwordLength = Math.floor(Math.random() * 16);
            if (passwordLength < 8) passwordLength += 8;
            var password = "";
            for (var i = 0, n = passwordCharset.length; i < passwordLength; ++i) {
                password += passwordCharset.charAt(Math.floor(Math.random() * n));
            }
            password += specialChars[Math.floor(Math.random() * specialChars.length)]
            document.getElementById("password-input-field").value = password;
        }

        generateNewPassword();

        document.getElementById("country-code-input")
            .addEventListener("change", (e) => {
                let phoneCode = e.target.options[e.target.selectedIndex].getAttribute("phone-code");
                document.getElementById("phone-code-dropdown").value = phoneCode;
            })

        const allModals = document.querySelectorAll(".modal");
        for (let i = 0; i < allModals.length; i++) {
            const modal = allModals[i];
            let dismissBtns = modal.querySelectorAll('[data-dismiss="modal"]');
            for (let j = 0; j < dismissBtns.length; j++) {
                dismissBtns[j].addEventListener("click", () => {
                    modal.classList.remove("show");
                    modal.style.display = "none"
                })
            }
        }

        const modalTriggerBtns = document.querySelectorAll('[data-trigger="modal"]');
        for (let i = 0; i < modalTriggerBtns.length; i++) {
            modalTriggerBtns[i].addEventListener("click", () => {
                let modal = document.getElementById(modalTriggerBtns[i].getAttribute("data-target"))
                modal.classList.add("show");
                modal.style.display = "block"
            })
        }


        //Report Type Popup Script
        const reportTypeModal = document.getElementById("report-type-modal");
        const reportCredsInputs = reportTypeModal.getElementsByClassName("report-creds-input");
        console.log("ALi " + reportTypeModal.querySelector("#report-type-input"))
        reportTypeModal.querySelector("#report-type-input")
            .addEventListener("change", (e) => {
                for (let i = 0; i < reportCredsInputs.length; i++) {
                    reportCredsInputs[i].classList.add("d-none");
                    reportCredsInputs[i].querySelector("input").setAttribute("required", false);
                }
                if (e.target.value !== "") {
                    reportTypeModal.getElementsByClassName(e.target.value + "-input-group")
                        .forEach((inpGroup) => {
                            inpGroup.classList.remove("d-none");
                            inpGroup.querySelector("input").setAttribute("required", true);
                        })
                }
            })
    </script>
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection
