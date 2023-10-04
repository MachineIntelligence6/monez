@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
@section('css')
<!-- Plugins css -->
<link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@php
$condition = 'view';
$currentUrl = url()->current();
$segments = request()->segments();
$lastSegment = last($segments);
@endphp
@if ($errors->any())
@foreach ($errors->all() as $error)
<div>{{$error}}</div>
@endforeach
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @include('advertiser.create-form')

            </div>
        </div>
    </div>
</div>
@endsection

@section('script-bottom')
<!-- Plugins js-->
<script src="{{ asset('assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js') }}"></script>


<!-- Page js-->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ asset('assets/js/modal-init.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>

<script>
    function confirmEmail() {
        if ($("#confemail").val() === "") return;
        $($("#confemail")).removeClass('is-valid is-invalid')
            .addClass(($("#accEmail").val() === $("#confemail").val()) ? ($("#confemail")[0].checkValidity() ?
                'is-valid' : 'is-invalid') : 'is-invalid');
    }


    window.addEventListener("DOMContentLoaded", () => {
        generateRandomPassword(null)
    })


    $("#country-dropdown").on("change", (e) => {
        console.log(e.target);
        let countryCode = $("#country-dropdown option:selected").attr("phone-code");
        console.log(countryCode)
        $("#phone-code-dropdown").select2().val(countryCode).trigger("change");

    })

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

    document.addEventListener("DOMContentLoaded", function () {
        // Add an event listener to the button
        document.getElementById("previous-tab").addEventListener("click", function () {
            // Activate Tab 2
            document.getElementById("accountInfoTab").click();
        });
    });













    $("#accountInfoform").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                $("#contactInfoTabbutton").click()
                console.log(response);
            },
            error: (error) => {
                console.log(error);
                var errors = $.parseJSON(error.responseText);
                $.each(errors, function(key, value) {
                    alert(value);
                });
            }
        });
    });









    $(".previous-tab-btn").click((e) => {
        $(".tab-pane").removeClass("active").removeClass("show");
        let targetTab = $(e.target).closest(".tab-pane");
        $(".tab-pane").eq(targetTab.index() - 1).addClass("active show");
        $(".nav-item>a").removeClass("active");
        $(".nav-item").eq(targetTab.index() - 1).find("a").addClass("active");
    })


    $(document).ready(function() {

    });
</script>
@endsection
