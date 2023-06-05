@extends('layouts.vertical', ['title' => 'Personal Profile'])
@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-category">
                    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-account-circle mr-2"></i>
                        Personal Profile
                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="amFirstName" name="amFirstName" placeholder="first name" required value="{{ $advertiser->amFirstName ??  old('amFirstName') }}">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="amLastName" name="amLastName" placeholder="last name" required value="{{ $advertiser->amLastName ??  old('amLastName') }}">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amEmail" class="form-label"> Email</label>
                                <input type="email" class="form-control" id="amEmail" name="amEmail" placeholder="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required value="{{ $advertiser->amEmail ??  old('amEmail') }}">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">
                                    You must enter valid input
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amPhone" class="form-label">Phone</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend" style="min-width: 150px;">
                                        <select class="form-control " id="phone-code-dropdown" data-toggle="select2">
                                        </select>
                                    </div>
                                    <input type="number" class="form-control ml-2" id="amPhone" name="amPhone" placeholder="Enter phone number" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amSkype" class="form-label">Skype</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                    <input type="text" class="form-control" id="amSkype" name="amSkype" placeholder="@username" value="{{ $advertiser->amSkype ??  old('amSkype') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="amLinkedIn" class="form-label">Linkedin</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                    <input type="url" class="form-control" id="amLinkedIn" name="amLinkedIn" placeholder="Url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" value="{{ $advertiser->amLinkedIn ??  old('amLinkedIn') }}">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">
                                        You must enter valid input
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <div class="row mt-2 px-2">
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                    <a href="{{ route('advertiser.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
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