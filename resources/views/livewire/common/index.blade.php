<div>
    <x-slot name="header">{{$module->vname}}</x-slot>

    <x-forms.m-panel>
        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <div class="flex gap-3">

            <x-table.caption caption="{{$module->vname}}">
                {{$list->count()}}
            </x-table.caption>

        </div>

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>


                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}" left>
                    Name
                </x-table.header-text>

                @if($module->cols === 2)
                    <x-table.header-text sortIcon="none">
                        Description
                    </x-table.header-text>
                @endif

                @if($module->cols === 3)
                    <x-table.header-text sortIcon="none">
                        Description-2
                    </x-table.header-text>
                @endif

                {{-- <x-table.header-text>Status</x-table.header-text>--}}

                <x-table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)
                    <x-table.row>

                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                       <x-table.cell-text left> <span class="capitalize">{{$row->vname}}</span></x-table.cell-text>

                        @if($module->cols === 2)
                            <x-table.cell-text>{{$row->desc}}</x-table.cell-text>
                        @endif

                        @if($module->cols === 3)
                            <x-table.cell-text>{{$row->desc_1}}</x-table.cell-text>
                        @endif

                        {{--                        <x-table.cell-status active="{{$row->active_id}}"/>--}}

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

        <x-forms.create :id="$common->vid">
            <div class="flex flex-col  gap-3">

                <x-input.model-text wire:model="common.vname" :label="'Name'"/>

                @if($module->cols === 2)
                    <x-input.model-text wire:model="desc" :label="'desc'"/>
                @endif

                @if($module->cols === 3)
                    <x-input.model-text wire:model="desc_1" :label="'desc 1'"/>
                @endif

            </div>
        </x-forms.create>
    </x-forms.m-panel>
</div>
