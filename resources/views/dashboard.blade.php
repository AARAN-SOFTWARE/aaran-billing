<x-app-layout class="bg-[#F0F1F7]">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-web.dashboard.greetings/>

    <div class="flex m-5 gap-5 tracking-wider">

        <!-- Col 1 -->

        <div class="w-3/12 h-auto flex-col flex gap-5">
            <div class=" h-auto bg-white p-5 rounded-md ">
                <div class="flex justify-between">
                    <div class="space-y-2">
                        <div class="text-lg font-semibold">Total Sales</div>
                        <div class="text-violet-600 text-xl font-semibold">₹ 20,00,000</div>
                        <div class="text-xs font-semibold text-gray-600">this month</div>
                        <div class="text-sm text-violet-600 font-semibold">₹ 44000</div>
                    </div>
                    <div>
                        <svg width="80px" height="80px" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="self-end pr-2 mt-2">
                            <path d="M4 4V16C4 18.2091 5.79086 20 8 20H20" stroke="#845ADF" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path
                                d="M6.59869 14.5841C6.43397 14.8057 6.48012 15.1189 6.70176 15.2837C6.9234 15.4484 7.2366 15.4022 7.40131 15.1806L6.59869 14.5841ZM19.4779 4.85296C19.3967 4.58903 19.1169 4.4409 18.853 4.52211L14.552 5.8455C14.288 5.92671 14.1399 6.2065 14.2211 6.47043C14.3023 6.73436 14.5821 6.88249 14.846 6.80128L18.6692 5.62493L19.8455 9.44805C19.9267 9.71198 20.2065 9.8601 20.4704 9.7789C20.7344 9.69769 20.8825 9.41789 20.8013 9.15396L19.4779 4.85296ZM13.5434 12.4067L13.1671 12.7359L13.5434 12.4067ZM15.1797 12.2161L15.6216 12.45L15.1797 12.2161ZM7.40131 15.1806L10.6621 10.7929L9.85952 10.1964L6.59869 14.5841L7.40131 15.1806ZM11.4397 10.7619L13.1671 12.7359L13.9196 12.0774L12.1923 10.1034L11.4397 10.7619ZM15.6216 12.45L19.4419 5.23394L18.5581 4.76606L14.7378 11.9821L15.6216 12.45ZM13.1671 12.7359C13.8594 13.5272 15.1297 13.3792 15.6216 12.45L14.7378 11.9821C14.5739 12.2919 14.1504 12.3412 13.9196 12.0774L13.1671 12.7359ZM10.6621 10.7929C10.8522 10.5371 11.2299 10.522 11.4397 10.7619L12.1923 10.1034C11.5628 9.38385 10.4298 9.42903 9.85952 10.1964L10.6621 10.7929Z"
                                fill="#845ADF"/>
                        </svg>
                    </div>
                </div>

                <div class="flex gap-1 relative">
                    <div class="flex-col flex gap-2 py-5 text-gray-400">
                        <span class="text-[10px]">200K</span>
                        <span class="text-[10px]">100K</span>
                        <span class="text-[10px]">50K</span>
                        <span class="text-[10px]">10K</span>
                        <span class="text-[10px]">2K</span>
                    </div>
                    <img
                        src="data:image/svg+xml;utf8,%3Csvg id=%22chart%22 width=%22100%25%22 height=%22auto%22 viewBox=%220 0 2000 667%22 xmlns=%22http:%2F%2Fwww.w3.org%2F2000%2Fsvg%22 %3E %3Cpath d=%22M 0%2C357.2294284657359 C 30.8%2C361.30038618004147 92.39999999999999%2C380.96289209707317 154%2C377.5842170372638 C 215.60000000000002%2C374.2055419774544 246.4%2C316.2400292109543 308%2C340.336053166689 C 369.6%2C364.4320771224237 400.4%2C503.215233037307 462%2C498.0643368159373 C 523.6%2C492.9134405945676 554.4%2C322.54238905964127 616%2C314.58157205984054 C 677.6%2C306.6207550600398 708.4%2C471.65288878157895 770%2C458.2602518169336 C 831.6%2C444.8676148522882 862.4%2C311.4963763986155 924%2C247.61838723661378 C 985.6%2C183.74039807461207 1016.4%2C173.58336347766337 1078%2C138.87030600692503 C 1139.6%2C104.15724853618671 1170.4%2C46.52234436444621 1232%2C74.0530998829222 C 1293.6%2C101.58385540139818 1324.4%2C261.201597976636 1386%2C276.524083599305 C 1447.6%2C291.84656922197405 1478.4%2C169.2548044268149 1540%2C150.66552799626731 C 1601.6%2C132.07625156571973 1632.4%2C146.2310384621617 1694%2C183.57770144656712 C 1755.6%2C220.92436443097256 1786.4%2C287.67474151602175 1848%2C337.39884291829446 C 1909.6%2C387.12294432056717 1971.2%2C413.2383353500034 2002%2C432.19820845793066L 2000 667 L 0 667Z%22 fill=%22%23444cf71a%22 %2F%3E %3Cpath d=%22M 0%2C357.2294284657359 C 30.8%2C361.30038618004147 92.39999999999999%2C380.96289209707317 154%2C377.5842170372638 C 215.60000000000002%2C374.2055419774544 246.4%2C316.2400292109543 308%2C340.336053166689 C 369.6%2C364.4320771224237 400.4%2C503.215233037307 462%2C498.0643368159373 C 523.6%2C492.9134405945676 554.4%2C322.54238905964127 616%2C314.58157205984054 C 677.6%2C306.6207550600398 708.4%2C471.65288878157895 770%2C458.2602518169336 C 831.6%2C444.8676148522882 862.4%2C311.4963763986155 924%2C247.61838723661378 C 985.6%2C183.74039807461207 1016.4%2C173.58336347766337 1078%2C138.87030600692503 C 1139.6%2C104.15724853618671 1170.4%2C46.52234436444621 1232%2C74.0530998829222 C 1293.6%2C101.58385540139818 1324.4%2C261.201597976636 1386%2C276.524083599305 C 1447.6%2C291.84656922197405 1478.4%2C169.2548044268149 1540%2C150.66552799626731 C 1601.6%2C132.07625156571973 1632.4%2C146.2310384621617 1694%2C183.57770144656712 C 1755.6%2C220.92436443097256 1786.4%2C287.67474151602175 1848%2C337.39884291829446 C 1909.6%2C387.12294432056717 1971.2%2C413.2383353500034 2002%2C432.19820845793066%22 fill=%22none%22 stroke=%22%23444cf7%22 stroke-width=%222px%22 %2F%3E %3Cg%3E %3Ccircle cx=%220%22 cy=%22357.2294284657359%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%22154%22 cy=%22377.5842170372638%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%22308%22 cy=%22340.336053166689%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%22462%22 cy=%22498.0643368159373%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%22616%22 cy=%22314.58157205984054%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%22770%22 cy=%22458.2602518169336%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%22924%22 cy=%22247.61838723661378%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%221078%22 cy=%22138.87030600692503%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%221232%22 cy=%2274.0530998829222%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%221386%22 cy=%22276.524083599305%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%221540%22 cy=%22150.66552799626731%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%221694%22 cy=%22183.57770144656712%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%221848%22 cy=%22337.39884291829446%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3Ccircle cx=%222002%22 cy=%22432.19820845793066%22 r=%226%22 fill=%22%23444cf7%22 %2F%3E %3C%2Fg%3E %3C%2Fsvg%3E"
                        alt="" class="w-full">
                    <div class="absolute w-16 h-12 bg-gray"></div>
                </div>
                <divc class="flex justify-between gap-4 text-gray-400">
                    <span class="text-[10px]">APL</span>
                    <span class="text-[10px]">MAY</span>
                    <span class="text-[10px]">JUN</span>
                    <span class="text-[10px]">JUL</span>
                    <span class="text-[10px]">AUG</span>
                    <span class="text-[10px]">SEP</span>
                    <span class="text-[10px]">OCT</span>
                    <span class="text-[10px]">NOV</span>
                    <span class="text-[10px]">DEC</span>
                </divc>
            </div>
{{--            <div--}}
{{--                class="h-36 w-full bg-gradient-to-b from-violet-300 via-violet-400 to-violet-700 rounded-md p-5--}}
{{--                text-white flex font-semibold justify-between items-center ">--}}
{{--                <div class="w-2/3 space-y-2">--}}
{{--                    <div class="text-lg">Your Target is incomplete</div>--}}
{{--                    <div class="text-xs text-gray-100">You have completed 48% of the given target, you can also check--}}
{{--                        your status--}}
{{--                    </div>--}}
{{--                    <div class="underline">Click here</div>--}}
{{--                </div>--}}
{{--                <div class="w-1/3">--}}
{{--                    <div--}}
{{--                        class="rounded-full w-24 h-24 border-8 border-white font-bold inline-flex items-center justify-center">--}}
{{--                        <span>48%</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="w-full h-auto bg-white rounded-md">
                <div class="">
                    <div class="w-full py-3 border-b border-gray-200 inline-flex items-center justify-between px-2">
                         <span class="inline-flex items-center gap-2">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 text-red-700">
                              <path fill-rule="evenodd"
                                    d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.176 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152-.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248ZM15.75 14.25a3.75 3.75 0 1 1-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 0 1 1.925-3.546 3.75 3.75 0 0 1 3.255 3.718Z"
                                    clip-rule="evenodd"/>
                            </svg>
                            <span class="font-semibold font-roboto">Top Deals</span>
                        </span>
                        <span>
                            <x-dropdown.icon>
                                <div class="px-6 py-1 hover:bg-slate-100 hover:text-violet-600 text-sm font-semibold">Week</div>
                                <div class="px-6 py-1 hover:bg-slate-100 hover:text-violet-600 text-sm font-semibold">Month</div>
                                <div class="px-6 py-1 hover:bg-slate-100 hover:text-violet-600 text-sm font-semibold">Year</div>
                            </x-dropdown.icon>
                        </span>
                    </div>
                    <div class="p-3 space-y-3">
                        @for($i=1; $i<=5; $i++)
                            <div class="flex justify-between items-center">
                                <div class="inline-flex items-center gap-3">
                                    <img src="../../../../images/t2.jpg" alt="" class="w-8 h-8 rounded-full">
                                    <div class="text-xs flex-col flex gap-1">
                                        <div class="font-bold">Michael Jordan</div>
                                        <div class="text-gray-600">michael.jordan@example.com</div>
                                    </div>
                                </div>
                                <div class="text-md font-semibold">$2,670</div>
                            </div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>

        <!-- Col 2 -->

        <div class="w-6/12 h-auto bg-[#F0F1F7]">
            <x-web.dashboard.cards/>
            <x-jet.welcome>
                <x-web.dashboard.statistics/>
            </x-jet.welcome>
        </div>

        <!-- Col 3 -->

        <div class="w-3/12 h-auto bg-[#F0F1F7]"></div>
    </div>

    {{--@<livewire:web.todo.index />--}}




</x-app-layout>
