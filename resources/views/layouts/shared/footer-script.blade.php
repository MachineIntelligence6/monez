<!-- bundle -->
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
@yield('script')
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="{{asset('assets/libs/sumomultiselect/jquery.sumoselect.min.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>


<!-- Plugins js-->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
<script src="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Init js-->
<script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>


<!-- Forms Validation Trigger Script  -->
<script>
    function validateInput(target, success = true) {
        $(target).removeClass('is-valid is-invalid')
            .addClass(success ? ($(target)[0].checkValidity() ? 'is-valid' : 'is-invalid') : 'is-invalid');
    }
    $('form').find('input,select,textarea').on('input', function() {
        if ($(this).attr("data-autovalidate") === "false") return;
        validateInput(this);
    });

    function generateRandomPassword(target, inputFieldId = 'password-input-field') {
        var inputField;
        if (target !== undefined && target !== null) {
            inputField = target.parentNode.parentNode.parentNode.querySelector("input#" + inputFieldId);
        } else {
            inputField = document.getElementById(inputFieldId);
        }
        var passwordLength = 12;
        const chars = {
            num: "1234567890",
            specialChar: "!@#$%&<=>?~",
            lowerCase: "abcdefghijklmnopqrstuvwxyz",
            upperCase: "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
        };

        const shuffleStr = str => str.split('').sort(() => 0.5 - Math.random()).join('')
        let factor = passwordLength / 4;
        let str = ''
        str += shuffleStr(chars.upperCase.repeat(factor)).substr(0, factor)
        str += shuffleStr(chars.lowerCase.repeat(factor)).substr(0, factor)
        str += shuffleStr(chars.num.repeat(factor)).substr(0, factor)
        str += shuffleStr(chars.specialChar.repeat(factor)).substr(0, factor)

        let password = shuffleStr(str).substr(0, passwordLength)
        console.log(password);
        inputField.value = password;
        validateInput(inputField);
    }
</script>

@yield('script-bottom')