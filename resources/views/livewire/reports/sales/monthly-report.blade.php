<div>
    <x-slot name="header">Sales Report</x-slot>
    <x-forms.m-panel>
        <div x-data="{ open: 3}" class="flex flex-col items-center w-full">
            <div class="flex items-center mb-4 ">
                <button @click="open = 1"
                        :class="open === 1 ? 'bg-yellow-500 text-white' : 'bg-gray-200 hover:bg-gray-300'"
                        class="px-4 py-2 rounded-l-lg focus:outline-none">
                    Summary
                </button>
                <button @click="open = 2"
                        :class="open === 2 ? 'bg-yellow-500 text-white' : 'bg-gray-200 hover:bg-gray-300'"
                        class="px-4 py-2 focus:outline-none">
                    Monthly Report
                </button>
                <button @click="open = 3"
                        :class="open === 3 ? 'bg-yellow-500 text-white' : 'bg-gray-200 hover:bg-gray-300'"
                        class="px-8 py-2 rounded-r-lg focus:outline-none">
                    All
                </button>
            </div>

            <div x-show="open === 1" class="w-full">
                <div class="space-y-2 w-full">
                    <div class="flex flex-row justify-evenly space-x-3">
                        <div class="w-full">
                            <div class="w-1/2">
                                <x-input.model-select wire:model.live="year" :label="'Year'">
                                    <option value="">Choose...</option>
                                    @for($year=2017;$year<=\Illuminate\Support\Carbon::now()->format('Y');$year++)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor

                                </x-input.model-select>
                            </div>
                        </div>
                        <div>
                            <x-button.secondary wire:click="prit">Print</x-button.secondary>
                        </div>
                    </div>
                    <?php
                    $totalSales = 0;
                    ?>
                    <x-table.form>
                        <x-slot:table_header name="table_header" class="bg-green-600">
                            <x-table.header-text sortIcon="none">Month</x-table.header-text>
                            <x-table.header-text sortIcon="none">Total Sales</x-table.header-text>
                        </x-slot:table_header>

                        <!-- Table Body ------------------------------------------------------------------------------------------->

                        <x-slot:table_body name="table_body">
                            @foreach(\App\Helper\Months::months() as $index=>$row)
                                <x-table.row>
                                    <x-table.cell-text>{{$row}}</x-table.cell-text>
                                    <x-table.cell-text>{{\App\Livewire\Reports\Sales\MonthlyReport::monthlySales($index+1)}}</x-table.cell-text>
                                </x-table.row>
                                    <?php
                                    $totalSales += \App\Livewire\Reports\Sales\MonthlyReport::monthlySales($index + 1);
                                    ?>
                            @endforeach
                            <x-table.row>
                                <x-table.cell-text right>Total</x-table.cell-text>
                                <x-table.cell-text>{{$totalSales}}</x-table.cell-text>
                            </x-table.row>
                        </x-slot:table_body>

                    </x-table.form>
                </div>
            </div>

            <div x-show="open === 2" class="w-full" x-cloak>
                <div class="space-y-2 w-full">
                    <div class="flex flex-row justify-evenly space-x-3">
                        <div class="w-full">

                            <x-input.model-select wire:model.live="month" :label="'Month'">
                                <option value="">Choose...</option>
                                @foreach(\App\Helper\Months::months() as $index=>$row)
                                    <option value="{{$index+1}}">{{$row}}</option>
                                @endforeach
                            </x-input.model-select>
                        </div>
                        <div class="w-full">
                            <x-input.model-select wire:model.live="year" :label="'Year'">
                                <option value="">Choose...</option>
                                @for($year=2017;$year<=\Illuminate\Support\Carbon::now()->format('Y');$year++)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endfor

                            </x-input.model-select>
                        </div>
                        <div>
                            <x-button.secondary wire:click="prit">Print</x-button.secondary>
                        </div>
                    </div>
                    <?php
                    $invoiceTotal = 0;
                    $taxableValueTotal = 0;
                    $gstTotal = 0;
                    $CGSTTotal = 0;
                    ?>

                    <x-table.form>
                        <x-slot:table_header name="table_header" class="bg-green-600">
                            <x-table.header-serial width="20%"/>
                            <x-table.header-text sortIcon="none">GSTIN NO</x-table.header-text>
                            <x-table.header-text sortIcon="none">Party Name</x-table.header-text>
                            <x-table.header-text sortIcon="none">Bill No</x-table.header-text>
                            <x-table.header-text sortIcon="none">Date</x-table.header-text>
                            <x-table.header-text sortIcon="none">Invoice Amount</x-table.header-text>
                            <x-table.header-text sortIcon="none">Taxable Value</x-table.header-text>
                            <x-table.header-text sortIcon="none">CGST %</x-table.header-text>
                            <x-table.header-text sortIcon="none">CGST TAX</x-table.header-text>
                            <x-table.header-text sortIcon="none">SGST %</x-table.header-text>
                            <x-table.header-text sortIcon="none">SGST TAX</x-table.header-text>
                            <x-table.header-text sortIcon="none">IGST %</x-table.header-text>
                            <x-table.header-text sortIcon="none">IGST TAX</x-table.header-text>
                        </x-slot:table_header>

                        <!-- Table Body ------------------------------------------------------------------------------------------->

                        <x-slot:table_body name="table_body">
                            @foreach($list as $index=>$row)
                                    <?php
                                    $invoiceTotal += $row->grand_total;
                                    $taxableValueTotal += $row->total_taxable;
                                    $gstTotal += $row->sales_type == 'CGST-SGST' ? $row->total_gst : 0;
                                    $CGSTTotal += $row->sales_type != 'CGST-SGST' ? $row->total_gst : 0;
                                    ?>

                                <x-table.row>
                                    <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->contact->gstin}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->invoice_no}}</x-table.cell-text>
                                    <x-table.cell-text> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->grand_total}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->total_taxable}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->sales_type=='CGST-SGST'?\App\Livewire\Reports\Sales\MonthlyReport::getPercent($row->id,$row->sales_type):0}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->sales_type=='CGST-SGST'?$row->total_gst/2:0}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->sales_type=='CGST-SGST'?\App\Livewire\Reports\Sales\MonthlyReport::getPercent($row->id,$row->sales_type):0}}</x-table.cell-text>
                                    <x-table.cell-text>{{$row->sales_type=='CGST-SGST'?$row->total_gst/2:0}}</x-table.cell-text>
                                    <x-table.cell-text>
                                        {{$row->sales_type!='CGST-SGST'?\App\Livewire\Reports\Sales\MonthlyReport::getPercent($row->id,$row->sales_type):0}}
                                    </x-table.cell-text>
                                    <x-table.cell-text>
                                        {{$row->sales_type!='CGST-SGST'?$row->total_gst:0}}
                                    </x-table.cell-text>
                                </x-table.row>

                            @endforeach
                            <x-table.row>
                                <x-table.cell-text colspan="3">Total</x-table.cell-text>
                                <x-table.cell-text></x-table.cell-text>
                                <x-table.cell-text></x-table.cell-text>
                                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal)}}</x-table.cell-text>
                                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($taxableValueTotal)}}</x-table.cell-text>
                                <x-table.cell-text></x-table.cell-text>
                                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($gstTotal/2)}}</x-table.cell-text>
                                <x-table.cell-text></x-table.cell-text>
                                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($gstTotal/2)}}</x-table.cell-text>
                                <x-table.cell-text></x-table.cell-text>
                                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($CGSTTotal)}}</x-table.cell-text>
                            </x-table.row>
                        </x-slot:table_body>
                    </x-table.form>
                </div>
            </div>

            <div x-show="open === 3" class="w-full" x-cloak>
              <div>
                  <div>
                    <div class="flex">
                        <select class="bg-gray-100 border-l rounded-l-lg w-36 border-r-0" wire:model.live="filterField">
                            <option value="">Select...</option>
                            <option value="invoice_no"> Invoice NO</option>
                            <option value="invoice_date"> Invoice Date</option>
                            <option value="contact_id"> Party Name</option>
                        </select>
                        @if($filterField=='contact_id')
                            <select wire:model.live="filterValue" class="rounded-r-lg">
                                <option value="">Choose...</option>
                                @foreach($contects as $contact)
                                    <option value="{{$contact->id}}">{{$contact->vname}}</option>
                                @endforeach
                            </select>
                        @elseif($filterField=='invoice_date')
                        <input type="date" wire:model.live="filterValue" class="rounded-r-lg">
                        @else
                        <input wire:model.live="filterValue" class="rounded-r-lg">
                        @endif
                    </div>


                  </div>
                  <x-table.form>
                      <x-slot:table_header name="table_header" class="bg-green-600">
                          <x-table.header-text sortIcon="none">
                              Invoice NO
                          </x-table.header-text>
                          <x-table.header-text sortIcon="none">
                              Invoice Date
                          </x-table.header-text>
                          <x-table.header-text  sortIcon="none">Party Name</x-table.header-text>
                          <x-table.header-text sortIcon="none">Total Qty</x-table.header-text>
                          <x-table.header-text sortIcon="none">Total Taxable
                          </x-table.header-text>
                          <x-table.header-text sortIcon="none">Total Gst</x-table.header-text>
                          <x-table.header-text sortIcon="none">Grand Total</x-table.header-text>
                      </x-slot:table_header>

                      <!-- Table Body ------------------------------------------------------------------------------------------->

                      <x-slot:table_body name="table_body">
                          @foreach($salesAll as $index=>$row)
                              <x-table.row>
                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{$row->invoice_no}}</a>
                                  </x-table.cell-text>

                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</a>
                                  </x-table.cell-text>

                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{$row->contact->vname}}</a>
                                  </x-table.cell-text>

                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{$row->total_qty}}</a>
                                  </x-table.cell-text>

                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{$row->total_taxable}}</a>
                                  </x-table.cell-text>

                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{$row->total_gst}}</a>
                                  </x-table.cell-text>

                                  <x-table.cell-text>
                                      <a href="{{route('sales.upsert',[$row->id])}}"> {{$row->grand_total}}</a>
                                  </x-table.cell-text>
                              </x-table.row>
                          @endforeach
                      </x-slot:table_body>
                  </x-table.form>
              </div>
            </div>
        </div>

    </x-forms.m-panel>
</div>
