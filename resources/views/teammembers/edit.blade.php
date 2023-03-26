<div class="modal fade" id="edit-member-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <form action="{{route('team-members.update',$teamMember->id ?? '')}}" method="POST" class="modal-content shadow shadow-5">
            @csrf
            @method('PATCH')
            <div class="modal-header">
                <h5 class="mb-3 text-uppercase modal-title">Update Team Member</h5>
                <button type="reset" class="btn p-0" data-dismiss="modal" aria-label="Close">
                    <h3 class="fe-x m-0"></h3>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name</label><label class="text-danger">*</label>
                        <input type="text" class="form-control" value="{{$teamMember->name ?? ''}}" id="name" name="name"
                               required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label><label class="text-danger">*</label>
                        <input type="email" class="form-control" value="{{$teamMember->email ??''}}" id="email" name="email"
                               required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                        <div class="input-group input-group-merge" disabled="true">
                            <input type="password" id="password-input-field" class="form-control" name="password"
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="{{$teamMember->password ??''}}" required>
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
                            <input type="text" class="form-control" id="skype" name="skype" value="{{$teamMember->skype ??''}}"
                                   placeholder="@username">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                            <input type="url" class="form-control" id="linkedin" name="linkedin"
                                   value="{{$teamMember->linkedin ??''}}" placeholder="Url">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                You must enter valid input
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
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

