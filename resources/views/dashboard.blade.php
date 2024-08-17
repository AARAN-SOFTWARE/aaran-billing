<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-web.dashboard.greetings />

    <div class="py-4">
        <div class="bg-white overflow-hidden">
            <x-jet.welcome/>
        </div>
    </div>
</x-app-layout>
