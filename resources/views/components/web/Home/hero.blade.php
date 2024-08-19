<!--red #FF321E -->
<!--yellow #F7C028 -->
<!--blue #3DC1F0 -->

<div class="sm:h-screen flex flex-col sm:flex-row justify-between items-center sm:p-5 p-3">

    <x-storyset.programer/>

    <div
        class="w-full animate__animated wow animate__fadeInDown sm:p-5 p-3 font-roboto tracking-wider">

        <div class="relative inline-block">
            <span class=" text-3xl sm:text-6xl font-bold font-asul animate__animated wow animate__fadeOut">
                CODEXSUN
            </span>
            <span
                class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-red-500 via-orange-400 to-yellow-600 rounded-full animate__animated wow animate__fadeIn whitespace-nowrap infinite linear"
                data-wow-duration="3s"></span>
        </div>

        <h1 class="text-zinc-400 pt-5 text-lg font-semibold">Software make simple</h1>

        <h1 class="py-2 font-semibold  text-2xl sm:text-4xl text-zinc-500">Manage your business like never
            before</h1>

        <p class="py-2 text-zinc-500 text-balance max-w-5xl leading-7">
            The perfect key for unlocking business growth is Infusing Intelligence to your business.
            Start getting complete business solution package with end-to-end management.</p>

        <a
{{--            href="{{ route('demo-requests.upsert') }}"--}}
            href="#"
            class="animate-pulse focus:animate-none hover:animate-none inline-flex sm:text-2xl text-xl bg-[#3DC1F0] sm:px-4 sm:py-2 mt-3 px-2 py-1 rounded-lg cursor-pointer
                    tracking-wide text-white  font-bold">
            <span class="px-5"> Book for demo</span>
            <x-icons.elements :icon="'notebook'" class="w-10 h-auto block"/>
        </a>

    </div>
</div>



