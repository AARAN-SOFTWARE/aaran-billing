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
$totalSales = 0;
?>

<table class="w-full border-b border-gray-300">
    <thead class="font-semibold text-[10px] bg-gray-50">
    <tr class="py-2 border-l border-b border-r border-gray-300 tracking-wider">
        <th class="py-2 w-[50%] border-r border-gray-300">Month</th>
        <th class="py-2 w-[50%] border-r border-gray-300">Total sales</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Helper\Months::months() as $index=>$row)
        <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
            <td class="py-2 text-center border-l border-r border-gray-300">{{$row}}</td>
            <td class="py-2 text-center border-r border-gray-300">{{\App\Http\Controllers\Report\Sales\SummaryController::monthlySales($index+1,$year)}}</td>
        </tr>
            <?php
            $totalSales += \App\Http\Controllers\Report\Sales\SummaryController::monthlySales($index + 1, $year)
            ?>
    @endforeach
    <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
        <td class="py-2 text-center border-l border-r border-gray-300" >TOTAL</td>
        <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$totalSales}}</td>
    </tr>
    </tbody>
</table>

</body>
</html>

