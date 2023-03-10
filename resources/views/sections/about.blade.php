<!-- Start ui-block-03 -->
<section class="about-sec ui-block-03 margin-3" id="about_us">
    <div class="container-fluid">
        <!-- Heading Area -->
        <div class="row about-details text-center mt-5">
            <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 wow zoomIn heading-area"
                 data-wow-duration="1s" data-wow-delay=".1s">
                <h3 class="heading text-center arabic" @if(App::isLocale('ar'))) style="padding-top: 0px;" @endif>@lang('about.Who We Are')</h3>
                <p class="text text-center arabic">@lang('about.Text')</p>
            </div>
        </div>
        <div class="row our-about-sec text-center bg-img" id ="mission_vision_values">
            <!-- First Box -->
            <div class="col-12 col-lg-4 wow slideInLeft about-card" data-wow-duration="1s">
                <a href="javascript:void(0);">
                    <div class="image-holder text-green"><i class="fas fa-eye fa-5x"></i></div>
                    <h3 class="about-card-heading">@lang('vision.Our Vision')</h3>
                    <p class="about-card-detail">@lang('vision.Text')</p>
                </a>
            </div>
            <!-- Second Box -->
            <div class="col-12 col-lg-4 wow slideInUp about-card active selected" data-wow-duration="1s">
                <a href="javascript:void(0);">
                    <div class="image-holder text-blue"><i class="fas fa-rocket fa-5x"></i></div>
                    <h3 class="about-card-heading">@lang('message.Our Message')</h3>
                    <p class="about-card-detail">@lang('message.Text')</p>
                </a>
            </div>
            <!-- Third Box -->
            <div class="col-12 col-lg-4 wow slideInRight about-card" data-wow-duration="1s">
                <a href="javascript:void(0);">
                    <div class="image-holder text-purple"><i class="fas fa-gem fa-5x"></i></div>
                    <h3 class="about-card-heading">@lang('values.Our Values')</h3>
                    <p class="">
                    <ul class="text-left about-card-detail" style="list-style: none;">
                        <div class="row">
                            <div class="col-1">
                                <li><i class="far fa-check-circle list-icon"></i></li>
                            </div>
                            <div class="col">
                                <li class="arabic"> @lang('values.Point 1')</li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <li><i class="far fa-check-circle list-icon"></i></li>
                            </div>
                            <div class="col">
                                <li class="arabic"> @lang('values.Point 2')</li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <li><i class="far fa-check-circle list-icon"></i></li>
                            </div>
                            <div class="col">
                                <li class="arabic"> @lang('values.Point 3')</li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <li><i class="far fa-check-circle list-icon"></i></li>
                            </div>
                            <div class="col">
                                <li class="arabic "> @lang('values.Point 4')</li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <li><i class="far fa-check-circle list-icon"></i></li>
                            </div>
                            <div class="col">
                                <li class="arabic"> @lang('values.Point 5')</li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <li><i class="far fa-check-circle list-icon"></i></li>
                            </div>
                            <div class="col">
                                <li class="arabic"> @lang('values.Point 6')</li>
                            </div>
                        </div>
                    </ul>
                    </p>
                </a>
            </div>
        </div>
    </div>
</section>
