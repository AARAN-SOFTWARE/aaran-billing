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
$taxableValueTotal = 0;
$gstTotal = 0;
$CGSTTotal = 0;
?>


<table class="w-full border-b border-gray-300">
    <thead class="font-semibold text-[10px] bg-gray-50">
    <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
        <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
        <th class="py-2 w-[10%] border-r border-gray-300">GSTIN NO</th>
        <th class="py-2 border-r border-gray-300">Party Name</th>
        <th class="py-2 w-[5%] border-r border-gray-300">Bill No</th>
        <th class="py-2 w-[7%] border-r border-gray-300">Date</th>
        <th class="py-2 w-[8%] border-r px-1 border-gray-300">Invoice Amount</th>
        <th class="py-2 w-[8%] border-r px-1 border-gray-300">Taxable Amount</th>
        <th class="py-2 w-[3%] border-r px-1 border-gray-300">CGST %</th>
        <th class="py-2 w-[5%] border-r px-1 border-gray-300">CGST TAX</th>
        <th class="py-2 w-[3%] border-r px-1 border-gray-300">SGST %</th>
        <th class="py-2 w-[5%] border-r px-1 border-gray-300">SGST TAX</th>
        <th class="py-2 w-[3%] border-r px-1 border-gray-300">IGST %</th>
        <th class="py-2 w-[5%] border-r px-1 border-gray-300">IGST TAX</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index=>$row)
            <?php
            $invoiceTotal += $row->grand_total;
            $taxableValueTotal += $row->total_taxable;
            $gstTotal += $row->sales_type == '1' ? $row->total_gst : 0;
            $CGSTTotal += $row->sales_type != '1' ? $row->total_gst : 0;
            ?>

        <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
            <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
            <td class="py-2 text-center border-r border-gray-300">{{$row->contact->gstin}}</td>
            <td class="py-2 text-start px-0.5 border-r border-gray-300">{{$row->contact->vname}}</td>
            <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->invoice_no}}</td>
            <td class="py-2 text-center px-0.5 border-r border-gray-300"> {{ date('d-m-Y', strtotime( $row->invoice_date))}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->grand_total}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->total_taxable}}</td>
            <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->sales_type=='1'?\App\Http\Controllers\Report\Sales\MonthlyReportController::getPercent($row->id,$row->sales_type):0}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->sales_type=='1'?$row->total_gst/2:0}}</td>
            <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->sales_type=='1'?\App\Http\Controllers\Report\Sales\MonthlyReportController::getPercent($row->id,$row->sales_type):0}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->sales_type=='1'?$row->total_gst/2:0}}</td>
            <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->sales_type!='1'?\App\Http\Controllers\Report\Sales\MonthlyReportController::getPercent($row->id,$row->sales_type):0}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->sales_type!='1'?$row->total_gst:0}}</td>
        </tr>
    @endforeach
    <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
        <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">Total</td>
        <td class="py-2 text-center border-l border-r border-gray-300"></td>
        <td class="py-2 text-center border-l border-r border-gray-300"></td>
        <td class="py-2 text-end px-0.5 border-l border-r border-gray-300">{{\App\Helper\ConvertTo::rupeesFormat($invoiceTotal)}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{\App\Helper\ConvertTo::rupeesFormat($taxableValueTotal)}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{\App\Helper\ConvertTo::rupeesFormat($gstTotal/2)}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{\App\Helper\ConvertTo::rupeesFormat($gstTotal/2)}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{\App\Helper\ConvertTo::rupeesFormat($CGSTTotal)}}</td>
    </tr>

    </tbody>
</table>

</body>
</html>
