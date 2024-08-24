<div>
    <x-slot name="header">Purchase</x-slot>

    <!-- Top Control -------------------------------------------------------------------------------------------------->
    <x-forms.m-panel>

        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Purchase'">
            {{$list->count()}}
        </x-table.caption>

        <!-- Table Header --------------------------------------------------------------------------------------------->
        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="{{$getListForm->sortAsc}}">
                    Order No
                </x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="{{$getListForm->sortAsc}}">
                    Purchase No
                </x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="none"> Purchase Date
                </x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="none"> Party Name
                </x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="none">Total Qty</x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="none">Total Taxable
                </x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="none">Total Gst</x-table.header-text>
                <x-table.header-text wire:click="sortBy('purchase_no')" sortIcon="none">Grand Total
                </x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)

                    <x-table.row>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->order->vname}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->purchase_no}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->purchase_date}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->contact_id}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->total_qty}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->total_taxable}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->total_gst}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text>
                            <a href="{{route('purchase.upsert',[$row->id])}}"> {{$row->grand_total}}</a>
                        </x-table.cell-text>

                        <!-- Table Action ----------------------------------------------------------------------------->
                        <x-table.cell-text>
                            <div class="w-full flex justify-center gap-3">
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                    <a href="{{route('purchase.upsert',[$row->id])}}"
                                       class="flex text-gray-600 truncate text-xl text-center">
                                        <div
                                            class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div
                                                    class="bg-blue-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                    Edit
                                                </div>
                                                <div
                                                    class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-blue-500 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <x-button.link>&nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                            </svg>
                                        </x-button.link>
                                    </a>
                                </div>
                                <div class="group inline-block relative cursor-pointer max-w-fit min-w-fit">
                                    <x-button.link wire:click="getDelete({{$row->id}})">&nbsp;
                                        <div
                                            class="absolute hidden group-hover:block pr-0.5 whitespace-nowrap top-1 w-full">
                                            <div class="flex flex-col justify-start items-center -translate-y-full">
                                                <div
                                                    class="bg-red-500  shadow-md text-white rounded-lg py-1 px-3 cursor-default text-base">
                                                    delete
                                                </div>
                                                <div
                                                    class="w-0 h-0 border-l-[12px] border-r-[12px] border-t-[8px] border-l-transparent border-r-transparent border-t-red-500 -mt-[1px]"></div>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                        </svg>
                                    </x-button.link>
                                </div>
                            </div>
                        </x-table.cell-text>

                    </x-table.row>

                @endforeach
            </x-slot:table_body>

        </x-table.form>
        <x-modal.delete/>
    </x-forms.m-panel>
</div>
