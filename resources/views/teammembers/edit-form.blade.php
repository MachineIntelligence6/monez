<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <form action="{{route('team-members.update',[$teamMember->id])}}" method="POST" class="modal-content shadow shadow-5">
            @csrf
            @method('POST')
            <div class="modal-header">
                <h5 class="mb-3 text-uppercase modal-title">Add Team Member</h5>
                <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name</label><label class="text-danger">*</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label><label class="text-danger">*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password-input-field" class="form-control" name="password"
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text btn">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            <div class="pl-2">
                                <div class="btn btn-secondary" onclick="generateNewPassword()">Regenerate</div>
                            </div>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="skype" class="form-label">Skype</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-skype"></i></span>
                            <input type="text" class="form-control" id="skype" name="skype" placeholder="@username">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                            <input type="url" class="form-control"  id="linkedin" name="linkedin" placeholder="Url">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="{{ route('team-members.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
            </div>
        </form>
            </div>
        </div>
    </div>
</div>

@section('script')

    <script>
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
    </script>

@endsection
