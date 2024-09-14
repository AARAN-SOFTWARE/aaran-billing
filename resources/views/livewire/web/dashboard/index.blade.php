<div class="bg-[#F8F8FF]">
    <x-slot name="header">Dashboard</x-slot>
    <div class="flex-col flex gap-10 tracking-wider p-2">
        <!-- Col 1 -->
        <div class=" bg-[#F8F8FF] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg">
            <x-web.dashboard.greetings/>
            @if(session()->get('role_id')==1|| session()->get('role_id')==2|| session()->get('role_id')==3 )
                {{--                @if(Aaran\Aadmin\Src\DbMigration::hasEntry())--}}
                <x-web.dashboard.sales :transactions="$transactions"/>
                <x-web.dashboard.cards :transactions="$transactions"/>

                {{--                @endif--}}
            @endif
            {{--            <x-web.dashboard.cards/>--}}
        </div>
        <!-- Col 2 -->
        <div class=" bg-[#F8F8FF] gap-10 flex sm:flex-row flex-col tracking-wider rounded-lg ">
            <x-web.dashboard.customer :contacts="$contacts"/>
            <x-web.dashboard.entries :entries="$entries"/>
            <x-web.dashboard.statistics/>
        </div>
    </div>

</div>
