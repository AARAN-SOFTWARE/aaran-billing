<div>
    <x-slot name="header">Orders</x-slot>

    <x-forms.m-panel>

        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Orders'">
            {{$list->count()}}
        </x-table.caption>

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">
                    Name
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">
                    Order
                </x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body name="table_body">

                        @foreach($list as $index=>$row)

                                <x-table.row>
                                    <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->vname}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->order_name}}</x-table.cell-text>
                                    <x-table.cell-action id="{{$row->id}}"/>
                                </x-table.row>

                        @endforeach

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

        <x-forms.create :id="$common->vid">
            <div class="flex flex-col  gap-3">
                <x-input.model-text wire:model="common.vname" :label="'Name'"/>
                <x-input.model-text wire:model="order_name" :label="'Order Name'"/>
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
