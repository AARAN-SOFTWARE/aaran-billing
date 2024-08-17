<div>
    <x-slot name="header">Common</x-slot>

    <x-forms.m-panel>
        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Common'">
            {{$list->count()}}
        </x-table.caption>
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Common Name
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Description
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Description-2
                </x-table.header-text>
                <x-table.header-text>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>
            <x-slot:table_body name="table_body">
                @foreach($list as $index=>$row)
                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->desc}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->desc_1}}</x-table.cell-text>
                        <x-table.cell-status active="{{$row->active_id}}"/>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach
            </x-slot:table_body>
        </x-table.form>
        <x-modal.delete/>

        <x-forms.create :id="$common->vid">
            <div class="flex flex-col  gap-3">
                <x-input.model-select wire:model="label_id" :label="'Title'">
                    <option value="">Choose..</option>
                    @foreach($labelData as $value)
                        <option value="{{$value->id}}">{{$value->vname}}</option>
                    @endforeach
                </x-input.model-select>
                <x-input.model-text wire:model="common.vname" :label="'Name'"/>
                <x-input.model-text wire:model="desc" :label="'desc'"/>
                <x-input.model-text wire:model="desc_1" :label="'desc 1'"/>
            </div>
        </x-forms.create>
    </x-forms.m-panel>
</div>
