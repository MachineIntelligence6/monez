<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrapper img" @if(App::isLocale('en')) style="background-image: url(img/img.jpg);" @else style="background-image: url(img/img-ar.jpg);" @endif>
                    <div class="row">
                        <div class="col-md-9 col-lg-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">@lang('contactform.Get in touch with us')</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm"
                                      novalidate="novalidate" action="{{ route('send-mail') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">@lang('contactform.Name')</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="@lang('contactform.Name')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">@lang('contactform.Email')</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                       placeholder="@lang('contactform.Email')">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">@lang('contactform.Subject')</label>
                                                <select class="form-control" name="subject" id="subject">
                                                    <option value="@lang('contactform.Enquiry')">@lang('contactform.Enquiry')</option>
                                                    <option value="@lang('contactform.Suggestion')">@lang('contactform.Suggestion')</option>
                                                    <option value="@lang('contactform.Complaint')">@lang('contactform.Complaint')</option>
                                                    <option value="@lang('contactform.Other')">@lang('contactform.Other')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">@lang('contactform.Message')</label>
                                                <textarea name="message" class="form-control" id="message" cols="30"
                                                          rows="4" placeholder="@lang('contactform.Message')"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="@lang('contactform.Send Message')" class="btn btn-success">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>