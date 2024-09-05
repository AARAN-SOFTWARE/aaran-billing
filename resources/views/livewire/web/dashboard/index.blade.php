<div class="bg-[#F8F8FF]">
    <x-slot name="header">Dashboard</x-slot>
    <div class="flex-col flex gap-10 tracking-wider p-2">
        <!-- Col 1 -->
        <div class=" bg-[#F8F8FF] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg">
            <x-web.dashboard.greetings/>
            <x-web.dashboard.sales/>
            <x-web.dashboard.cards/>
        </div>
        <!-- Col 2 -->
        <div class=" bg-[#F8F8FF] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg ">
            <x-web.dashboard.customer/>
            <x-web.dashboard.billing/>
            <x-web.dashboard.statistics />
        </div>
    </div>


</div>
