<div>
    <x-slot name="header">Sales Log</x-slot>

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

        {{--        @if(!$sales->isEmpty())--}}
        {{--            <div>hello </div>--}}
        {{--        @endif--}}
        <div class="w-10/12 mx-auto font-lex space-y-5">
            @if($sales)
                <div class="w-1/3 text-3xl font-merri">{{$sales->contact->vname}}</div>
                <div class="w-1/2  flex justify-between">
                    <div class=" text-gray-600 flex justify-between space-x-5"><span
                            class="font-merri ">Invoice No:</span><span class="">{{$sales->invoice_no}}</span></div>
                    <div class=" text-gray-600 flex justify-between space-x-5"><span
                            class="font-merri ">Invoice Date:</span><span class="">{{$sales->invoice_date}}</span></div>
                </div>
                <div class="w-1/3 text-gray-600 flex justify-between"><span
                        class="font-merri w-1/3">Total Quantity:</span><span class="w-1/3">{{$sales->total_qty}}</span>
                </div>
                <div class="w-1/3 text-gray-600 flex justify-between"><span
                        class="font-merri w-1/3">Total Taxable:</span><span
                        class="w-1/3">{{$sales->total_taxable}}</span></div>
                <div class="w-1/3 text-gray-600 flex justify-between"><span
                        class="font-merri w-1/3">Total GST:</span><span class="w-1/3">{{$sales->total_gst}}</span></div>
                <div class="w-1/3 text-gray-600 flex justify-between"><span class="font-merri w-1/3">Grand Total:</span><span
                        class="w-1/3">{{$sales->grand_total}}</span></div>

            @endif

        </div>
        <div>

{{--            @foreach($salesItems as $row)--}}
{{--                <div>{{$row->po_no}}</div>--}}
{{--                <div>{{$row->dc_no}}</div>--}}
{{--                <div>{{$row->no_of_roll}}</div>--}}
{{--                <div>{{$row->product_name}}</div>--}}
{{--                <div>{{$row->product_id}}</div>--}}
{{--                <div>{{$row->qty}}</div>--}}
{{--                <div>{{$row->price}}</div>--}}

{{--            @endforeach--}}


        </div>
        @if(!$logs->isEmpty())
            <div class="w-10/12 mx-auto font-merri">Log
            </div>
        @endif
        @foreach($logs as $row)
            <div class="relative w-10/12 mx-auto">
                <div class=" border-l-4 border-dotted px-8 space-y-3">
                    <div class="flex gap-x-5">
                        <div>{{$row->vname}}</div>
                        <div>{{$row->user->name}}</div>
                    </div>
                    <div
                        class="text-gray-600 text-xs font-semibold">{{date('M d, Y', strtotime($row->created_at))}}</div>
                    <div class="text-sm leading-5 tracking-wider">{{$row->description}}</div>
                </div>
                <div class="absolute top-0 -ml-1 h-3 w-3 rounded-full bg-teal-600"></div>
            </div>
        @endforeach

    </x-forms.m-panel>
</div>
