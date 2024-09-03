{{--<div class="w-full h-40 pattern_1 bg-blue-50">--}}
{{--    <div class="flex-col flex relative py-12 font-roboto tracking-wider">--}}
{{--        <div class=" ml-5 font-semibold text-2xl text-black">--}}
{{--            <span class="w-full">{{ App\Helper\Core::greetings() }}, </span>&nbsp;<span>{{Auth::user()->name}}</span>&nbsp;&nbsp;<span>👋</span>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="text-base font-sans text-blue-800 ml-5">{!! App\Helper\Slogan::getRandomQuote() !!}</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="w-full h-[19.5rem] rounded-lg">
    @if (App\Helper\Core::greetings() == 'Good morning')
        <div class="relative h-full">
            <img src="../../../../images/wall1.webp" alt="" class="w-full h-full brightness-50 rounded-lg">
            <div class="absolute top-24 w-full text-center p-5 space-y-4">
                <div class="w-full text-center font-semibold text-2xl text-white">
                    <span class="w-full">{{ App\Helper\Core::greetings() }},
                    </span>&nbsp;<span>{{ Auth::user()->name }}</span>&nbsp;&nbsp;<span>👋</span>
                </div>
                <div>
                    <span class="text-base font-sans text-white">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
                </div>
            </div>
        </div>
    @elseif (App\Helper\Core::greetings() == 'Good afternoon')
        <div class="relative h-full">
            <img src="../../../../images/wall2.webp" alt="" class="w-full h-full brightness-50 rounded-lg">
            <div class="absolute top-24 w-full text-center p-5 space-y-4">
                <div class="w-full text-center font-semibold text-2xl text-white">
                    <span class="w-full">{{ App\Helper\Core::greetings() }},
                    </span>&nbsp;<span>{{ Auth::user()->name }}</span>&nbsp;&nbsp;<span>👋</span>
                </div>
                <div>
                    <span class="text-base font-sans text-white">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
                </div>
            </div>
        </div>
    @elseif (App\Helper\Core::greetings() == 'Good evening')
        <div class="relative h-full">
            <img src="../../../../images/wall3.webp" alt="" class="w-full h-full brightness-50 rounded-lg">
            <div class="absolute top-24 w-full text-center p-5 space-y-4">
                <div class="w-full text-center font-semibold text-2xl text-white">
                    <span class="w-full">{{ App\Helper\Core::greetings() }},
                    </span>&nbsp;<span>{{ Auth::user()->name }}</span>&nbsp;&nbsp;<span>👋</span>
                </div>
                <div>
                    <span class="text-base font-sans text-white">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
                </div>
            </div>
        </div>
    @else
        <div class="relative h-full">
            <img src="../../../../images/wall4.webp" alt="" class="w-full h-full brightness-50 rounded-lg">
            <div class="absolute top-24 w-full text-center p-5 space-y-4">
                <div class="w-full text-center font-semibold text-2xl text-white">
                    <span class="w-full">{{ App\Helper\Core::greetings() }},
                    </span>&nbsp;<span>{{ Auth::user()->name }}</span>&nbsp;&nbsp;<span>👋</span>
                </div>
                <div>
                    <span class="text-base font-sans text-white">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
                </div>
            </div>
        </div>
    @endif
</div>



