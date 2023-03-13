@extends('layouts.vertical', ['title' => 'Report Fields Form'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3 text-uppercase"><i class="mdi mdi-office-building me-1"></i> Account Info</h5>
                <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    const passwordCharset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    function generateNewPassword() {
        var passwordLength = Math.floor(Math.random() * 16);
        if (passwordLength < 8) passwordLength += 8;
        password = "";
        for (var i = 0, n = passwordCharset.length; i < passwordLength; ++i) {
            password += passwordCharset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("password-input-field").value = password;
    }
    generateNewPassword();


    document.getElementById("country-code-input")
        .addEventListener("change", (e) => {
            let phoneCode = e.target.options[e.target.selectedIndex].getAttribute("phone-code");
            document.getElementById("phone-number-input").value = phoneCode;
        })
</script>
<!-- Plugins js-->
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection