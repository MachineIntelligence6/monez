<!-- Start ui-block-08 -->
<section class="team-sec position-relative ui-block-08 py-0 " id="team">
    <div class=" about-details text-center mt-5">
        <div class="col-12 wow zoomIn heading-area"
             data-wow-duration="1s" data-wow-delay=".1s">
            <h3 class="heading text-center arabic" @if(App::isLocale('ar')) style="padding-top: 0px;" @endif>@lang('team.Our Team')</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row inner-team-sec padding-top padding-bottom ">
            <div class="col-12">
                <div class="team-area wow fadeInRight" >
                    <div class="row no-gutters team-carousel owl-carousel owl-theme" >
                        <div class="item text-center">
                            <div class="team-box">
                                <div class="img-holder position-relative">
                                    <img src="{{ asset("img/image-1-1.jpeg") }}">
                                    <div class="overlay d-flex justify-content-center align-items-center flex-column"></div>
                                </div>
                                <div class="team-info text-white">
                                    <h4 class="team-name team-heading-name-pb-b">@lang('team.Zakaria Sobhy Habib')</h4>
                                    <p class="team-designation  mb-0">@lang('team.General Manager')</p>
                                    <a href="#" class="btn btn-sm text-white" data-toggle="modal" data-target="#zakaria-sobhy-habib">@lang('team.View Profile')</a>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="team-box">
                                <div class="img-holder position-relative">
                                    <img src="{{ asset("img/sameer-zidan.jpg") }}">
                                    <div class="overlay d-flex justify-content-center align-items-center flex-column">
                                    </div>
                                </div>
                                <div class="team-info text-white">
                                    <h4 class="team-name team-heading-name-pb-b">@lang('team.Eng Sameer Zidan')</h4>
                                    <p class="team-designation mb-0 ">@lang('team.Executive Director')</p>
                                    <a  href="#" class="btn btn-sm text-white" data-toggle="modal" data-target="#sameer-zidan">@lang('team.View Profile')</a>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="team-box">
                                <div class="img-holder position-relative">
                                    <img src="{{ asset("img/ayman-muhanna.jpg") }}">
                                    <div class="overlay d-flex justify-content-center align-items-center flex-column">
                                    </div>
                                </div>
                                <div class="team-info text-white">
                                    <h4 class="team-name team-heading-name-pb-b">@lang('team.Ayman Muhanna')</h4>
                                    <h5 class="team-designation mb-0 ">@lang('team.Marketing/Public Relation Manager')</h5>
                                    <h6 class="team-designation-subtitle mb-0">@lang('team.Chemical Engineer/Consultant')</h6>
                                    <a  href="#" class="btn btn-sm text-white" data-toggle="modal" data-target="#ayman-muhanna">@lang('team.View Profile')</a>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="team-box">
                                <div class="img-holder position-relative">
                                    <img src="{{ asset("img/aala-muhanna.jpg") }}" width="50%">
                                    <div class="overlay d-flex justify-content-center align-items-center flex-column"></div>
                                </div>
                                <div class="team-info text-white">
                                    <h4 class="team-name team-heading-name-pb-b">@lang('team.Alaa Muhanna')</h4>
                                    <p class="team-designation mb-0" >@lang('team.Services Manager') </p>
                                    <a class="btn btn-sm text-white" data-toggle="modal" data-target="#aala-muhanna">@lang('team.View Profile')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="team-nav team-prev" id="team-prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a class="team-nav team-next" id="team-next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('sections.teammodals')
</section>


<!-- Cut the script tag including the script and paste it before the body ending tag at the bottom of your html file -->

<!-- End ui-block-08 -->
