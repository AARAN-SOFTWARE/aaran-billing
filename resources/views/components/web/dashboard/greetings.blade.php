<div class="w-full h-40 pattern_1 bg-blue-50">
    <div class="flex-col flex relative py-12 font-roboto tracking-wider">
        <div class=" ml-5 font-semibold text-2xl text-black">
            <span class="w-full">{{ App\Helper\Core::greetings() }}, </span>&nbsp;<span>{{Auth::user()->name}}</span>&nbsp;&nbsp;<span>👋</span>
        </div>
        <div >
            <span class="text-base font-sans text-blue-800 ml-5">{!! App\Helper\Slogan::getRandomQuote() !!}</span>
        </div>
    </div>
</div>
