<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

    <div class="bg-blue-100 rounded-md border border-blue-300 p-6 shadow-md shadow-black/10 hover:bg-blue-200 duration-700 transition-all">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold">5.3K</div>
                </div>
                <div class="text-sm font-medium text-blue-800">Users</div>
            </div>
            <div>
                <x-icons.icon :icon="'user-group'" class="w-10 h-auto text-blue-600"/>
            </div>
        </div>

        <a href="#" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
    </div>

    <div class="bg-green-100 rounded-md border border-gray-300 p-6 shadow-md shadow-black/10 hover:bg-green-200 duration-700 transition-all">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold">80</div>
                    <div
                        class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">
                        +30%
                    </div>
                </div>
                <div class="text-sm font-medium text-green-800">Companies</div>
            </div>
            <div>
                <x-icons.icon :icon="'perfomance'" class="w-10 h-auto text-green-600"/>
            </div>
        </div>
        <a href="#" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
    </div>
    <div class="bg-red-100 rounded-md border border-gray-300 p-6 shadow-md shadow-black/10 hover:bg-red-200 duration-700 transition-all">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">1.5K</div>
                <div class="text-sm font-medium text-red-800">Blogs</div>
            </div>
            <div>
                <x-icons.icon :icon="'window'" class="w-10 h-auto text-red-600"/>
            </div>
        </div>
        <a href="#" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
    </div>
</div>
