<div>
    <x-slot name="header">Cash Book</x-slot>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>

{{--        <x-table.caption :caption="'Cash Book'">--}}
{{--            {{$list->count()}}--}}
{{--        </x-table.caption>--}}

        <!-- Table Header --------------------------------------------------------------------------------------------->

{{--        <x-table.form>--}}

{{--            <x-slot:table_header name="table_header" class="bg-green-100">--}}

{{--                <x-table.header-serial width="20%"/>--}}
{{--                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Contact Name--}}
{{--                </x-table.header-text>--}}
{{--                <x-table.header-text sortIcon="none">Opening Balance</x-table.header-text>--}}
{{--                <x-table.header-text sortIcon="none">Opening Date</x-table.header-text>--}}
{{--                <x-table.header-action/>--}}

{{--            </x-slot:table_header>--}}

{{--            <!-- Table Body ------------------------------------------------------------------------------------------->--}}

{{--            <x-slot:table_body name="table_body">--}}

{{--                @foreach($cashBookData as $index=>$row)--}}

{{--                    @if($row->account_book_id == $row->id) @endif--}}

{{--                    <x-table.row>--}}
{{--                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>--}}
{{--                        <x-table.cell-text left>{{$row->vname}}</x-table.cell-text>--}}
{{--                        <x-table.cell-text>{{  $row->opening_balance }}--}}
{{--                        </x-table.cell-text>--}}
{{--                        <x-table.cell-text>{{ date('d-m-Y',strtotime($row->opening_date))}}</x-table.cell-text>--}}
{{--                        <x-table.cell-action id="{{$row->id}}"/>--}}
{{--                    </x-table.row>--}}

{{--                @endforeach--}}

{{--            </x-slot:table_body>--}}
{{--        </x-table.form>--}}

        <x-modal.delete/>

        <div class="grid grid-cols-3 justify-items-center">
        <x-cards.card-3 :list="$cashBookData" :data="$payments"/>
        </div>
{{--        <div class="pt-5">{{ $list->links() }}</div>--}}

        <!-- Create  -------------------------------------------------------------------------------------------------->
        <x-forms.create :id="$common->vid">

            <div class="flex flex-col gap-3">
                <x-input.floating wire:model.live="common.vname" label="Contact Name"/>
                <x-input.floating wire:model.live="opening_balance" label="Opening Balance"/>
                <x-input.floating wire:model.live="opening_date" type="date" label="Opening date"/>
                <x-input.floating wire:model.live="notes" label="Notes"/>
            </div>
        </x-forms.create>
    </x-forms.m-panel>
</div>
