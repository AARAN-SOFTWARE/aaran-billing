<button {{$attributes}}
        class="relative group text-gray-500 transition-colors duration-200 dark:hover:text-purple-500
        dark:text-gray-300 hover:text-purple-600 focus:outline-none animate">
    <x-icons.icon icon="printer" class="w-5 h-5"/>
    <div class="absolute invisible group-hover:visible -top-9 -right-2">
        <div class="bg-purple-600 text-white text-xs px-2 py-1 rounded-md">
            Print
        </div>
        <div
            class="absolute left-[18px] w-0 h-0 border-l-[5px] border-l-transparent border-t-[7.5px]
            border-t-purple-600 border-r-[5px] border-r-transparent"></div>
    </div>
</button>

