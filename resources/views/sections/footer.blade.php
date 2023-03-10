<div class="footer bg-dark mt-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-12 text-center align-self-center border-b-margin-b">
                <span class="text-white">@lang('footer.All Rights Reserved')</span>
                <span style="color: #f7b319;">@lang("footer.Construction Probe Contracting")</span>
                <span class="text-white">@lang("footer.Copyright")
                    @if(App::isLocale('en'))
                        {{ now()->year }}-{{ now()->addYears(1)->year }}
                    @else
                        {{App\User::getArabicYear(now()->year)}} - {{App\User::getArabicYear(now()->addYears(1)->year)}}
                    @endif
                    . </span>
                {{--<span class="text-white">@lang("footer.Site designed by")</span>--}}
                {{--<a href="http://intercraftsol.com/"><span class="border-left p-1 ml-1"><img src="{{ asset('img/inter-craft-logo.svg') }}" height="24px"></span></a>--}}
                {{--<a href="http://www.asaheeb.co/en/"><span class=" pt-1 pb-1 pl-2"><img src="{{ asset('img/asaheeb-logo.png') }}" height="20px"></span></a>--}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" text-white text-center">
                <div class="border text-white mb-2">@lang("footer.Technology Partners")</div>
                <a href="http://intercraftsol.com/"><span class=" pt-1 pb-1 "><img
                                src="{{ asset('img/inter-craft-logo.svg') }}" height="24px"></span></a>
                <a href="http://www.asaheeb.co/en/"><span class=" pt-1 pb-1 pl-2"><img
                                src="{{ asset('img/asaheeb-logo.png') }}" height="20px"></span></a>
            </div>
        </div>
    </div>
</div>