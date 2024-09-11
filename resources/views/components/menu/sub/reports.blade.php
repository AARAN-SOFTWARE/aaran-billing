<!--  10 - Common -->
<li class="flex align-center flex-col cursor-pointer">

    <div
        @click="selected !== 10 ? selected = 10 : selected = null"
        class="relative flex flex-row justify-between items-center h-11 focus:outline-none hover:bg-gray-1000
                                text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-3">

                        <span class="inline-flex justify-center items-center ml-4">
                            <x-icons.icon-fill :iconfill="'dashboard'" :colour="'#656d7b'" class="w-4 h-auto block"/>

                            <span
                                class="ml-3 flex font-semibold text-sm tracking-wide truncate my-4 font-sans uppercase">
                                Reports
                            </span>

                        </span>

        <span class="inline-flex justify-center items-center">
                        <svg fill="currentColor" viewBox="0 0 20 20"
                             :class="{'rotate-0': selected ==null, 'rotate-180': selected === 10}"
                             class="inline w-10 h-10 float-right transition-transform duration-500 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                  d="M5.2103 10.2103a1 1 0 011.414 0L10 10.5810l3.2103-3.2103a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg></span>


    </div>

    <div x-show="selected === 10" class="p-1 flex flex-col">

        <ul class="grid-cols-1 grid bg-gray-800">

            @include('components.menu.items.report-menu')
            <li class="bg-gray-1000 mt-0.5"></li>
        </ul>
    </div>
</li>
