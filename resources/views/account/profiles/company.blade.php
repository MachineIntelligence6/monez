@extends('layouts.vertical', ['title' => 'Compandy Profile'])
@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i>Company Profile</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="dbaId" class="form-label">Advertiser ID</label>
                                <input type="text" disabled class="form-control" id="dbaId" name="dbaId" data-autovalidate="false" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company / Legal Name</label>
                                <input type="text" disabled class="form-control" id="companyName" name="companyName">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="regId" class="form-label">Registration / National ID</label>
                                <input type="text" disabled class="form-control" id="regId" name="regId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="vat" class="form-label">VAT ID</label>
                                <input type="text" disabled class="form-control" id="vat" name="vat">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="url" class="form-label">Website</label>
                                <input type="text" disabled class="form-control" id="website-url-input" name="url">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="accEmail" class="form-label">Account Email</label>
                                <input type="email" disabled class="form-control" id="accEmail" name="accEmail">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address</label>
                                <input type="text" disabled class="form-control" id="address1" name="address1">
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Address 2</label>
                                <input type="text" disabled class="form-control" id="address2" name="address2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">City</label>
                                <input type="text" disabled class="form-control" id="city" name="city_id">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">State / Province</label>
                                <input type="text" disabled class="form-control" id="state_id" name="state_id">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address1" class="form-label">Zip Code</label>
                                <input type="text" disabled class="form-control" id="zipCode" name="zipCode">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-control" disabled name="country_id" id="country-dropdown" data-toggle="select2">
                                <option>Country</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row mb-3">
                        <div class="col-md-6 h-100 mb-3">
                            <label for="documents" class="form-label">Documents</label>
                            <input type="file" name="documents" disabled class="dropify" data-height="200" data-allowed-file-extensions="pdf jpg" accept="image/jpeg,application/pdf" data-max-file-size="5M" multiple />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/dropify/dropify.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script src="{{asset('assets/js/modal-init.js')}}"></script>

<script>
    $('.dropify').dropify();
    window.addEventListener("DOMContentLoaded", () => {
        generateRandomPassword(null)
    })


    function setCountryCodeToPhone(countryCode) {
        $("#phone-code-dropdown").select2().val(countryCode).trigger("change");
    }

    document.querySelectorAll(".enable-on-valid").forEach((el) => {
        let input = document.getElementById(el.getAttribute("data-enable-target"));
        input.addEventListener("change", (e) => {
            el.disabled = e.target.value === "";
        })
    })
    document.querySelectorAll(".display-on-valid").forEach((el) => {
        let input = document.getElementById(el.getAttribute("data-enable-target"));
        input.addEventListener("change", (e) => {
            if (e.target.value !== "") el.classList.remove("d-none");
            else el.classList.add("d-none")
        })
    })

    //Report Type Popup Script
    const reportTypeModal = document.getElementById("report-type-modal");
    const reportCredsInputs = reportTypeModal.getElementsByClassName("report-creds-input");

    function showReportCredsPopup(value) {
        for (let i = 0; i < reportCredsInputs.length; i++) {
            reportCredsInputs[i].classList.add("d-none");
            // reportCredsInputs[i].querySelector("input").setAttribute("required", false);
        }
        if (value !== "") {
            reportTypeModal.getElementsByClassName(value + "-input-group")
                .forEach((inpGroup) => {
                    inpGroup.classList.remove("d-none");
                    // inpGroup.querySelector("input").setAttribute("required", true);
                })
            reportTypeModal.classList.add("show");
            reportTypeModal.style.display = "block";
        }
    }


    $(document).ready(function() {
        $('#dbaId').on('input', function() {
            var inputVal = $(this).val();
            if (inputVal.length > 0) {
                $.ajax({
                    url: '{{ route("check.unique.value") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        input_field: inputVal
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'error') {
                            validateInput("#dbaId", false);
                            $("#dba-invalid").text('Advertiser ID already exists.');
                        } else {
                            console.log(response);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            } else {
                $("#dba-invalid").text('You must enter valid input.');
            }
        });
    });


    function onSaveColumnsModal() {
        let allInpValid = true;
        $("#define-report-columns-modal").find("input,select").each((i, inp) => {
            if (inp.value === "") {
                allInpValid = false;
            }
        })
        let reportColsInp = $("#reportColumns")
        reportColsInp.val("Report Columns Set");
        validateInput(reportColsInp);
    }
    $(document).ready(() => {
        $("#add-bank-details-modal").find("#bankName").on("input", (e) => {
            $("#bank").val(e.target.value)
            console.log(e.target.value);
            validateInput("#bank");
        })
    })
</script>

@endsection