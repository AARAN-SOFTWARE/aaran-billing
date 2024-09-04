<x-app-layout class="bg-[#F0F1F7]">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex gap-5 tracking-wider p-5">
        <!-- Col 1 -->
        <div class="w-3/12 h-auto flex-col flex gap-5">
            <x-web.dashboard.greetings/>
            <x-web.dashboard.customer/>
        </div>
        <!-- Col 2 -->
        <div class="w-3/12 h-auto bg-[#F0F1F7] border-t-2 border-[#23B7E5] rounded-lg space-y-5">
            <x-web.dashboard.sales/>
            <x-web.dashboard.billing/>
        </div>
        <!-- Col 3 -->
        <div class="w-6/12 h-auto bg-[#F0F1F7] space-y-5">
            <x-web.dashboard.cards/>
            <x-jet.welcome>
                <x-web.dashboard.statistics/>
            </x-jet.welcome>
        </div>
    </div>
    <div class="h-16 bg-white flex justify-center items-center text-sm text-gray-600 tracking-wider gap-2">
        <span class="font-semibold">Aaran InfoTech</span><span> © 2020 - 2024 — All Rights Reserved.</span>
    </div>
</x-app-layout>
