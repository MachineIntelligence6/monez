<header>
    <div class="h_left">
        <div class="logo" style="">
            <a href="{{ route('site')}}">
                <img src="{{asset('img/logo-with-arabic.svg')}}" alt="">
            </a>
        </div>
    </div>
    <div class="h_right">
        <div class="info foldt2">
            <ul class="mt-05-rem">
                <li>
                    <a class="hover-color" href="{{ route('site', app()->getLocale() == 'en' ? 'ar' : 'en')}}">
                        @if(app()->getLocale() == 'en')
                            <img src="{{ asset('img/saudi-arabia.svg')}}" height="32px">    عربي
                        @else
                            <img src="{{ asset('img/united-states.svg')}}" height="32px"> English
                        @endif
                    </a>
                </li>
                <li>
                    <a href="tel: +966 11 2244008">
                        <span class="hover-color">&#x200E;<i class="fas fa-phone-square text-white"></i> +966 11 2244008</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Misbar-Builds-104528568623865" class="hover-color">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/misbarbuilds" class="hover-color">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="h_nav foldtl">
            <label for="menu">Menu</label>
            <input type="checkbox" name="menu" id="menu">
            <ul class="mt-05-n-rem">
                <li><a href="#home" class="font-weight-bold arabic hover-menu-items">@lang('header.Home')</a></li>
                <li><a href="#about_us" class="font-weight-bold arabic hover-menu-items">@lang('header.About Us')</a>
                </li>
                <li><a href="#mission_vision_values"
                       class="font-weight-bold arabic hover-menu-items">@lang('header.Vision & Mission')</a></li>
                <li><a href="#team" class="font-weight-bold arabic hover-menu-items">@lang('header.Team')</a></li>
                <li><a href="#contact" class="font-weight-bold arabic hover-menu-items">@lang('header.Contact Us')</a>
                </li>
                <li class="dropdown dropleft">
                    <span type="button" class="dropdown-toggle font-weight-bold " data-toggle="dropdown">
                        @lang('header.Links')
                    </span>
                    <div class="dropdown-menu menu-design">
                        <h6 class="dropdown-header">@lang('header.Links')</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="https://www.the-architect.com/ar/business"><i class="lni lni-construction"></i> @lang('header.The Architect')</a>
                        <a class="dropdown-item" target="_blank" href="https://sca.sa/"><i class="lni lni-construction"></i> @lang('header.Saudi Contractors Authority')
                        </a>
                        <a class="dropdown-item" target="_blank" href="https://www.saudieng.sa"><i class="lni lni-construction"></i> @lang('header.Saudi Council of Engineers')
                        </a>
                        <a class="dropdown-item" target="_blank"
                           href="https://www.sbc.gov.sa/Ar/ConnectUS/Pages/FAQ.aspx "><i class="lni lni-construction"></i> @lang('header.Saudi Building Code National Committee')
                        </a>
                        <a class="dropdown-item" target="_blank"
                           href="https://apps.apple.com/sa/app/%D9%81-%D8%B1%D8%B5/id1372788277"><i class="lni lni-construction"></i> @lang('header.Momra Furas')</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">@lang('header.PDF')</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="https://www.mostadam.sa/sites/default/files/2020-12/%D8%AF%D9%84%D9%8A%D9%84%20%D9%85%D8%B3%D8%AA%D8%AF%D8%A7%D9%85%20%D9%84%D9%84%D9%85%D8%A8%D8%A7%D9%86%D9%8A%20%D8%A7%D9%84%D8%B3%D9%83%D9%86%D9%8A%D8%A9%20%28%D8%A7%D9%84%D8%AA%D8%B5%D9%85%D9%8A%D9%85%20%2B%20%D8%A7%D9%84%D8%A5%D9%86%D8%B4%D8%A7%D8%A1%29.pdf
"><i class="lni lni-construction"></i> @lang('header.Sustainable Building')</a>
                        <a class="dropdown-item" target="_blank"
                           href="https://www.my.gov.sa/downloads/manuals/0b3cb2e1-b8ca-4329-9005-3eb9442aa7e1.pdf"><i class="lni lni-construction"></i> @lang('header.GOSI Online Guide for Establishment')
                        </a>
                        <a class="dropdown-item" target="_blank"
                           href="https://mc.gov.sa/ar/guides/MerchantGuide/Pages/default.aspx "><i class="lni lni-construction"></i> @lang('header.Merchant Guide')</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div style="clear:both"></div>
</header>