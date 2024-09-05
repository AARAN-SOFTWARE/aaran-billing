<div class="">
    <x-slot name="header">Dashboard</x-slot>
    <div class="flex-col flex gap-10 tracking-wider p-2">
        <!-- Col 1 -->
        <div class=" bg-[#F0F1F7] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg">
            <x-web.dashboard.greetings/>
            <x-web.dashboard.sales/>
            <x-web.dashboard.cards/>
        </div>
        <!-- Col 2 -->
        <div class=" bg-[#F0F1F7] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg ">
            <x-web.dashboard.customer/>
            <x-web.dashboard.billing/>
            <x-web.dashboard.statistics />
        </div>
    </div>

    <div class="h-16 bg-white flex justify-center items-center text-sm text-gray-600 tracking-wider gap-2">
        <span class="font-semibold">Aaran InfoTech</span><span> © 2020 - 2024 — All Rights Reserved.</span>
    </div>
</div>
