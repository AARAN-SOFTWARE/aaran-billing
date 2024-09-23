<html lang="en">
<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 p-5">
<!------Top Company Area------------------------------------------------------------------------------------------>
<div class="flex items-center justify-center gap-x-6 border border-gray-300 py-2">
    <div class="">
        @if($cmp->get('logo')!='no_image')
            <img src="{{ public_path('/storage/images/'.$cmp->get('logo'))}}" alt="company logo" class="w-[90px]"/>
        @else
            <img src="{{ public_path('images/sk-logo.jpeg') }}" alt="" class="w-[90px]">
        @endif
    </div>

    <div class="flex-col">
        <h1 class="text-2xl font-bold tracking-wider  uppercase">{{$cmp->get('company_name')}}</h1>
        <p class="text-xs">{{$cmp->get('address_1')}},{{$cmp->get('address_2')}}, {{$cmp->get('city')}}</p>
        <p class="text-xs">{{$cmp->get('contact')}} - {{$cmp->get('email')}}</p>
        <p class="text-xs">{{$cmp->get('gstin')}}</p>
    </div>
</div>

<?php
$invoiceTotal = 0;
$sales_gstTotal = 0;
$purchase_gstTotal = 0;
$purchaseTotal = 0
?>

<div class="bg-gray-100 font-bold text-xl text-center w-full grid grid-cols-2 gap-1">
    <div>Sales Report</div>
    <div>Purchase Report</div>
</div>
<div class="grid grid-cols-2 gap-3">
    <table class="w-full border-b border-t border-gray-300">
        <thead class="font-semibold text-[10px] bg-gray-50">
        <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
            <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
            <th class="py-2  border-r border-gray-300">Party Name</th>
            <th class="py-2 w-[10%] border-r border-gray-300">Bill No</th>
            <th class="py-2 w-[10%] border-r border-gray-300">Invoice Amount</th>
            <th class="py-2 w-[10%] border-r border-gray-300">Receipt Amount</th>
            <th class="py-2 w-[10%] border-r px-1 border-gray-300">Date</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <table class="w-full border-b border-t border-gray-300">
        <thead class="font-semibold text-[10px] bg-gray-50">
        <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
            <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
            <th class="py-2 border-r border-gray-300">Party Name</th>
            <th class="py-2  w-[10%] border-r border-gray-300">Bill No</th>
            <th class="py-2 w-[10%] border-r px-1 border-gray-300">Date</th>
            <th class="py-2 w-[10%] border-r border-gray-300">Invoice Amount</th>
            <th class="py-2 w-[10%] border-r border-gray-300">Receipt Amount</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<div class="flex flex-row gap-3">
    <div class="w-full">
        <div class="text-xl text-center py-2 font-bold tracking-wider">Sales Report</div>
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text sortIcon="none">Party Name</x-table.header-text>
                <x-table.header-text sortIcon="none">Bill No</x-table.header-text>
                <x-table.header-text sortIcon="none">Date</x-table.header-text>
                <x-table.header-text sortIcon="none">Invoice Amount</x-table.header-text>
                <x-table.header-text sortIcon="none">GST Amount</x-table.header-text>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">
                @foreach($sales as $index=>$row)
                        <?php
                        $invoiceTotal += $row->grand_total;
                        $sales_gstTotal += $row->total_gst;
                        ?>

                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->invoice_no}}</x-table.cell-text>
                        <x-table.cell-text> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->grand_total}}</x-table.cell-text>
                        <x-table.cell-text>
                            {{$row->total_gst}}
                        </x-table.cell-text>
                    </x-table.row>

                @endforeach

            </x-slot:table_body>
        </x-table.form>
    </div>

    <div class="w-full">
        <div class="text-xl text-center py-2 font-bold tracking-wider">Purchase Report</div>
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text sortIcon="none">Party Name</x-table.header-text>
                <x-table.header-text sortIcon="none">Bill No</x-table.header-text>
                <x-table.header-text sortIcon="none">Date</x-table.header-text>
                <x-table.header-text sortIcon="none">Invoice Amount</x-table.header-text>
                <x-table.header-text sortIcon="none">GST Amount</x-table.header-text>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">
                @foreach($purchase as $index=>$row)
                        <?php
                        $purchaseTotal += $row->grand_total;
                        $purchase_gstTotal += $row->total_gst;
                        ?>

                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->purchase_no}}</x-table.cell-text>
                        <x-table.cell-text> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->grand_total}}</x-table.cell-text>
                        <x-table.cell-text>
                            {{$row->total_gst}}
                        </x-table.cell-text>
                    </x-table.row>

                @endforeach

            </x-slot:table_body>
        </x-table.form>
    </div>
</div>

<div class="mt-3">
    <x-table.form>
        <x-slot:table_body name="table_body">
            <x-table.row>
                <x-table.cell-text right>Total Sales</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal)}}</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($sales_gstTotal)}}</x-table.cell-text>
                <x-table.cell-text right>Total Purchase</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($purchaseTotal)}}</x-table.cell-text>
                <x-table.cell-text>{{\App\Helper\ConvertTo::rupeesFormat($purchase_gstTotal)}}</x-table.cell-text>
            </x-table.row>
            <x-table.row>
                <x-table.cell-text colspan="2" right>
                    <div class="font-bold">Difference (Sales-Purchase)</div>
                </x-table.cell-text>
                <x-table.cell-text>
                    <div
                        class="font-bold">{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal-$purchaseTotal)}}</div>
                </x-table.cell-text>
                <x-table.cell-text colspan="2" right>
                    <div class="font-bold">GST (Sales-Purchase)</div>
                </x-table.cell-text>
                <x-table.cell-text>
                    <div
                        class="font-bold">{{\App\Helper\ConvertTo::rupeesFormat($sales_gstTotal-$purchase_gstTotal)}}</div>
                </x-table.cell-text>
            </x-table.row>
        </x-slot:table_body>
    </x-table.form>
</div>

</body>
</html>
