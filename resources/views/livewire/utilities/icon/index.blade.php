<div>

    <x-slot name="header">Icons</x-slot>

    <x-forms.m-panel>



        {{--<----row-1----->--}}
        <div class="bg-white-900">
            <div class="flex flex-row gap-2">

                @foreach($list as $row)
                <x-icons.utilities icon=" {{$row['icon'] }}"/>
                @endforeach

            </div>
        </div>
    </x-forms.m-panel>
</div>


