@props([
    'label' => '',
])
{{--<div class = "relative h-11 sm:w-[500px]  min-w-[200px] sm:mx-0.5 mx-auto {{$width}}" >--}}
{{--    <input {{$attributes}}--}}
{{--        class="peer h-full w-full rounded-md border border-gray-600 focus:ring-0  bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"--}}
{{--        placeHolder=" "--}}
{{--    />--}}
{{--    <label class="before:content[' '] after:content[' ']--}}
{{--    pointer-events-none absolute left-0 -top-1.5 flex h-full w-full  select-none text-[11px] font-normal leading-tight text-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">--}}
{{--        {{$placeholder}}--}}
{{--    </label>--}}
{{--    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"--}}
{{--         aria-hidden="true"--}}
{{--         class="absolute right-3 bottom-0.5 size-5 -translate-y-1/2 text-slate-700/50 dark:text-slate-300/50">--}}
{{--        <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>--}}
{{--    </svg>--}}
{{--</div>--}}

<div class="relative w-full">
    <input {{$attributes}} type="Search" id="floating_outlined"
           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none
           dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
           placeholder=" " autocomplete="off"/>
    <label for="floating_outlined"
           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
           bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
           peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4
           rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{$label}}</label>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
         aria-hidden="true"
         class="absolute right-3 bottom-0.5 size-5 -translate-y-1/2 text-slate-700/50 dark:text-slate-300/50">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
    </svg>
</div>

