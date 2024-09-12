<div>
    <x-slot name="header">Sales Report</x-slot>
    <x-forms.m-panel>
        <div class="flex flex-row justify-evenly space-x-3">
            <div class="w-full">

                <x-input.model-select wire:model.live="month" :label="'Month'">
                    <option value="">Choose...</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </x-input.model-select>
            </div>
            <div class="w-full">
                <x-input.model-select wire:model.live="year" :label="'Year'">
                        <option value="">Choose...</option>
                        @for($year=2000;$year<=\Illuminate\Support\Carbon::now()->format('Y');$year++)
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

    </x-forms.m-panel>
</div>
