<form action="{{route('team-members.store')}}" method="POST" class="needs-validation modal-content shadow shadow-5" novalidate>
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
                            <input type="password" id="password-input-field" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text btn">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            <div class="pl-2">
                                <div class="btn btn-secondary" onclick="generateRandomPassword(this)">Regenerate</div>
                            </div>
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            You must enter valid input
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="amPhone" class="form-label">Phone</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend" style="min-width: 150px;">
                                    <select class="form-control " id="phone-code-dropdown" data-toggle="select2">
                                        @foreach ($countries as $key => $country)
                                        <option value="{{$country->countryCode}}">{{$country->countryCode}} ({{$country -> title}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="number" class="form-control ml-2" id="amPhone" name="amPhone" placeholder="Enter phone number">
                            </div>
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
                            <input type="url" class="form-control" id="linkedin" name="linkedin" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" placeholder="Url">
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
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>