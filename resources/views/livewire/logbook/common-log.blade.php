<div>
    <x-slot name="header">Log</x-slot>

    <x-forms.m-panel>

{{--        <div class="flex sm:flex-row sm:justify-between sm:items-center  flex-col gap-6 py-4 print:hidden">--}}
{{--            <div class="w-2/4 flex items-center space-x-2">--}}

{{--                <x-input.search-bar wire:model.live="getListForm.searches"--}}
{{--                                    wire:keydown.escape="$set('getListForm.searches', '')" label="Search"/>--}}
{{--                <x-input.toggle-filter :show-filters="$showFilters"/>--}}
{{--            </div>--}}

{{--            <div class="flex sm:justify-center justify-between">--}}
{{--                <x-forms.per-page/>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Table Header  ------------------------------------------------------------------------------------------>

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial></x-table.header-serial>
                <x-table.header-text sort-icon="none">Model</x-table.header-text>
                <x-table.header-text sort-icon="none">Action</x-table.header-text>
                <x-table.header-text sort-icon="none">Description</x-table.header-text>
                <x-table.header-text sort-icon="none">User</x-table.header-text>

            </x-slot:table_header>

            <!-- Table Body  ------------------------------------------------------------------------------------------>

            <x-slot:table_body name="table_body">

                @foreach($logs as $index=>$row)
                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                        <x-table.cell-text>
                            {{$row->vname}}
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <div class="line-clamp-1">
                                {{$row->action }}
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <div class="line-clamp-1">
                                {!! $row->description !!}
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            {{$row->user->name}}
                        </x-table.cell-text>

                    </x-table.row>
                @endforeach
            </x-slot:table_body>
        </x-table.form>

    </x-forms.m-panel>
</div>
