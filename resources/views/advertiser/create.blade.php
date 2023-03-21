@extends('layouts.vertical', ['title' => 'Advertisers Profile'])
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building mr-2"></i> Account Info</h5>
                    <form class="needs-validation" method="post" action="{{ route('advertiser.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('POST')
                        @include('advertiser.form')
                        @include('advertiser.modals.report-columns')
                        @include('advertiser.modals.bank-details-modal')
                        @include('advertiser.modals.reports-modal')
                    </form>
                </div>
            </div>
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


        // document.querySelectorAll(".remote-form-control").forEach((el) => {
        //     console.log(el.dataset.targetInput);
        //     document.getElementById(el.getAttribute("data-target-input")).addEventListener("change", (e) => {
        //         el.value = e.target.value;
        //         console.log(e.target.value)
        //     })
        // })

        // document.querySelectorAll(".form-control").forEach((el) => {
        //     el.addEventListener("change", (e) => {
        //         document.querySelectorAll("#" + el.id).forEach((otherEl) => {
        //             otherEl.value = e.target.value
        //         })
        //     })
        // })

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

        // reportTypeModal.querySelector("#report-type-input")
        //     .addEventListener("change", (e) => {
        //         for (let i = 0; i < reportCredsInputs.length; i++) {
        //             reportCredsInputs[i].classList.add("d-none");
        //             // reportCredsInputs[i].querySelector("input").setAttribute("required", false);
        //         }
        //         if (e.target.value !== "") {
        //             reportTypeModal.getElementsByClassName(e.target.value + "-input-group")
        //                 .forEach((inpGroup) => {
        //                     inpGroup.classList.remove("d-none");
        //                     // inpGroup.querySelector("input").setAttribute("required", true);
        //                 })
        //         }
        //     })
    </script>
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection
