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

<div class=" font-roboto tracking-wider flex justify-between items-center p-5 ">
    <div>
        <div class="text-xl font-semibold">
            <span class="">{{ App\Helper\Core::greetings() }}, </span>&nbsp;<span>{{Auth::user()->name}}</span>&nbsp;&nbsp;<span>👋</span>
        </div>
        <div>
            <span class="text-base text-sky-800">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
        </div>
    </div>
    <div>
        <button class="inline-flex items-center gap-2 border border-sky-600 text-sky-600 px-2 py-1 rounded-md font-semibold hover:bg-sky-600 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
            </svg>
            <span>Export</span>
        </button>
    </div>
</div>


