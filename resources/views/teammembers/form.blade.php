<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-category">

                    <div>

                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <h5 class="mb-3 text-uppercase"><i class="mdi mdi-account-circle mr-2"></i>
                                    Add Team Member
                                </h5>
                            </div>

                            <div class="col-auto">
                                @if($Segmenttwo=='create')

                                @elseif($lastSegment=='edit')
                                <a href="{{route('team-members.view',$teamMember->id)}}" class="btn btn-secondary">
                                    <!-- <span class="fas fa-edit mr-1"></span> -->
                                    Cancel
                                </a>
                                <button class="btn btn-primary" type="submit"><span class="fas fa-check mr-1"></span>
                                    Save Info
                                </button>
                                @else
                                <a href="{{route('team-members.edit',$teamMember->id)}}" class="btn btn-secondary">
                                    <span class="fas fa-edit mr-1"></span>
                                    Edit Info
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-auto" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label><label class="text-danger">*</label>
                                        <input type="text" class="form-control" id="name" value="{{old('name', $teamMember->name ?? '')}}" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif name="name" placeholder="name" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">
                                            You must enter valid input
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label"> Email</label><label class="text-danger">*</label>
                                        <input type="email" class="form-control" id="email" data-check-unique="oninput" data-invalid-message="Email already registered." data-unique-path="{{ route('check.unique.teamEmail') }}" value="{{old('email', $teamMember->email ?? '')}}" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif name="email" placeholder="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div id="email-invalid" class="invalid-feedback">
                                            You must enter valid input
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label><label class="text-danger">*</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password-input-field" value="{{old('password', $teamMember->password ?? '')}}" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <div class="input-group-append" data-password="false">
                                                <div class="input-group-text btn">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            <div class="pl-2">
                                                <!-- <div class="btn btn-secondary" onclick="@if($condition==$lastSegment || $condition==$Segmenttwo) disabled  generateRandomPassword(this) @endif">Regenerate</div> -->
                                                @if($lastSegment == 'create' || $lastSegment=='edit')

                                                <div class="btn btn-secondary" onclick="generateRandomPassword(this)">Regenerate</div>
                                                @else

                                                @endif

                                            </div>
                                        </div>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">
                                            You must enter valid input
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="amPhone" class="form-label">Phone</label><label class="text-danger">*</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend" style="min-width: 150px;">
                                                <select name="country_code" class="form-control " @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif id="phone-code-dropdown" data-toggle="select2" required>
                                                    @foreach ($countries as $key => $country)
                                                    <option value="{{$country->id}}" @if (isset($selectedcountry) && $country->id == $selectedcountry) selected @endif>{{$country->countryCode}} ({{$country -> title}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="number" class="form-control ml-2" value="{{old('phone', $teamMember->phone ?? '')}}" data-invalid-message="Phone Number already registered." data-check-unique="oninput" data-unique-path="{{ route('check.unique.teamPhone') }}" id="amPhone" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif name="phone" placeholder="Enter phone number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="skype" class="form-label">Skype</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                            <input type="text" class="form-control" id="skype" value="{{old('skype', $teamMember->skype ?? '')}}" name="skype" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif placeholder="@username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="linkedin" class="form-label">Linkedin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                            <input type="url" class="form-control" id="linkedin" value="{{old('linkedin', $teamMember->linkedin ?? '')}}" name="linkedin" @if($condition==$lastSegment || $condition==$Segmenttwo) disabled @endif placeholder="Url" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})">
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">
                                                You must enter valid input
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end row -->
                        </div>

                        @if($lastSegment=='create')
                        <div class="row pl-2">

                            <button class="btn btn-primary" type="submit">
                                Add </button>

                            <a href="{{ route('team-members.index') }}" class="btn btn-secondary ml-1" type="button">Cancel</a>
                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
