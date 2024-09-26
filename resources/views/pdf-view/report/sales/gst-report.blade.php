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


<div class="grid grid-cols-2 gap-3">
    <table class="w-full border-b  border-gray-300">
        <thead class="font-semibold text-[10px] bg-gray-50">
        <tr class="py-2  border-l border-b border-r border-gray-300 tracking-wider">
            <th class="py-2 text-center " colspan="6">Sales Report</th>
        </tr>
        <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
            <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
            <th class="py-2  border-r border-gray-300">Party Name</th>
            <th class="py-2 w-[10%] border-r border-gray-300">Bill No</th>
            <th class="py-2 w-[15%] border-r px-1 border-gray-300">Date</th>
            <th class="py-2 w-[15%] border-r border-gray-300">Invoice Amount</th>
            <th class="py-2 w-[12%] border-r border-gray-300">Receipt Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sales as $index=>$row)
                <?php
                $invoiceTotal += $row->grand_total;
                $sales_gstTotal += $row->total_gst;
                ?>

            <tr class="text-[9px] border-b border-r border-gray-300 self-start ">
                <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
                <td class="py-2 text-start px-0.5 border-r border-gray-300">{{$row->contact->vname}}</td>
                <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->invoice_no}}</td>
                <td class="py-2 text-end px-0.5 border-r border-gray-300"> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</td>
                <td class="py-2 text-end px-1 border-r border-gray-300">{{$row->grand_total}}</td>
                <td class="py-2 text-center px-1 border-r border-gray-300">{{$row->total_gst}}</td>
            </tr>
        @endforeach
        <tr class="text-[10px] border-b border-r border-gray-300 self-start font-semibold">
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="2">Total Sales</td>
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="2">{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal)}}</td>
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="2">{{\App\Helper\ConvertTo::rupeesFormat($sales_gstTotal)}}</td>
        </tr>
        <tr class="text-[10px] border-b border-r border-gray-300 self-start font-semibold">
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">Difference (Sales-Purchase)</td>
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal-$purchaseTotal)}}</td>

        </tr>
        </tbody>
        <tbody>

        </tbody>
    </table>
    <table class="w-full border-b border-gray-300">
        <thead class="font-semibold text-[10px] bg-gray-50">
        <tr class="py-2 border-b border-l border-r border-gray-300 tracking-wider">
            <th class="py-2 text-center  " colspan="6">Purchase Report</th>
        </tr>
        <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
            <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
            <th class="py-2 border-r border-gray-300">Party Name</th>
            <th class="py-2  w-[10%] border-r border-gray-300">Bill No</th>
            <th class="py-2 w-[15%] border-r px-1 border-gray-300">Date</th>
            <th class="py-2 w-[15%] border-r border-gray-300">Invoice Amount</th>
            <th class="py-2 w-[12%] border-r border-gray-300">Receipt Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchase as $index=>$row)
                <?php
                $purchaseTotal += $row->grand_total;
                $purchase_gstTotal += $row->total_gst;
                ?>

            <tr class="text-[9px] border-b border-r border-gray-300 self-start ">
                <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
                <td class="py-2 text-start px-0.5 border-r border-gray-300">{{$row->contact->vname}}</td>
                <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->purchase_no}}</td>
                <td class="py-2 text-end px-0.5 border-r border-gray-300"> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</td>
                <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->grand_total}}</td>
                <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->total_gst}}</td>
            </tr>
        @endforeach
        <tr class="text-[10px] border-b border-r border-gray-300 self-start font-semibold">
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="2">Total Purchase</td>
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="2">{{\App\Helper\ConvertTo::rupeesFormat($purchaseTotal)}}</td>
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="2">{{\App\Helper\ConvertTo::rupeesFormat($purchase_gstTotal)}}</td>
        </tr>
        <tr class="text-[10px] border-b border-r border-gray-300 self-start font-semibold">
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">GST (Sales-Purchase)</td>
            <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">{{\App\Helper\ConvertTo::rupeesFormat($sales_gstTotal-$purchase_gstTotal)}}</td>
        </tr>
        </tbody>
    </table>
</div>

@pageBreak
</body>
</html>
