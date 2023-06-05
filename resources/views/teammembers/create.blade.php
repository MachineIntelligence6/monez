@extends('layouts.vertical', ['title' => 'TeamMember Profile'])
@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@php
$condition='view';
$currentUrl = url()->current();
$Segmenttwo = request()->segment(2);
$segments = request()->segments();
$lastSegment = last($segments);

@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- {{ route('team-members.store') }} -->

                <form class="needs-validation" method="post" action="{{ url()->current() == route('team-members.create') ? route('team-members.store') : route('team-members.update', $teamMember->id) }}" novalidate>
                    @csrf
                    @if($lastSegment=='edit')
                    @method('PUT')
                    @else
                    @method('POST')
                    @endif
                    @include('teammembers.form')
                </form>
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


    $('#email').on('input', function() {
        var inputVal = $(this).val();
        if (inputVal.length > 0) {
            $.ajax({
                url: '{{ route("check.unique.teamEmail") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    input_field: inputVal
                },
                dataType: 'json',
                success: function(response) {
                    console.log("Ali " + response)
                    if (response.status === 'error') {
                        validateInput("#email", false);
                        $("#email-invalid").text('Email already registered.');
                    } else {
                        console.log(response);
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        } else {
            $("#email-invalid").text('You must enter valid input.');
        }
    });

    const passwordCharset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    const specialChars = "!$%#^&|?"

    function generateNewPassword() {
        var passwordLength = Math.floor(Math.random() * 12);
        if (passwordLength < 8) passwordLength += 8;
        passwordLength = Math.min(12, passwordLength);
        var password = "";
        for (var i = 0, n = passwordCharset.length; i < passwordLength; ++i) {
            password += passwordCharset.charAt(Math.floor(Math.random() * n));
        }
        password += specialChars[Math.floor(Math.random() * specialChars.length)]
        document.getElementById("password-input-field").value = password;
    }

    generateNewPassword();

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