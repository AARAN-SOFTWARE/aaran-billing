<div>
    <x-slot name="header">BankBook</x-slot>

    <x-forms.m-panel>

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial></x-table.header-serial>

{{--                <x-table.header-text wire:click.prevent="sortBy ('contact_id')" sort-icon="{{$getListForm->sortAsc}}">--}}
{{--                    VCH NO--}}
{{--                </x-table.header-text>--}}

{{--                <x-table.header-text wire:click.prevent="sortBy ('contact_id')" sort-icon="{{$getListForm->sortAsc}}">--}}
{{--                    Contact--}}
{{--                </x-table.header-text>--}}

                <x-table.header-text wire:click.prevent="sortBy('contact_id')"
                                     sort-icon="none">Type
                </x-table.header-text>

                <x-table.header-text sort-icon="none">Mode of Payments</x-table.header-text>

                <x-table.header-text sort-icon="none">Amount</x-table.header-text>

            </x-slot:table_header>

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)
{{--@dd($list);--}}

                    <x-table.row>

                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

{{--                        <x-table.cell-text>{{$row->vch_no+0}}</x-table.cell-text>--}}

{{--                        <x-table.cell-text left>{{$row->contact->vname}}</x-table.cell-text>--}}

                        <x-table.cell-text>{{\Aaran\Transaction\Models\Transaction::common($row->receipttype_id)}}</x-table.cell-text>

                        <x-table.cell-text>{{($row->mode->vname)}}</x-table.cell-text>

                        <x-table.cell-text right>{{$row->vname+0}}</x-table.cell-text>

                    </x-table.row>

                @endforeach

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>


    </x-forms.m-panel>
</div>
