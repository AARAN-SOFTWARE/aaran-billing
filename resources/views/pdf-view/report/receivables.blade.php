<html lang="en">
<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 p-10">
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


<div class="text-xs space-y-1 border-l  border-r border-gray-300 p-1">
    <div class="text-xl font-semibold">M/s.{{$contact->vname}}</div>
    <div class="">{{$billing_address->get('address_1')}}</div>
    <div class="">{{$billing_address->get('address_2')}}</div>
    <div class="">{{$billing_address->get('address_3')}}</div>
    <div class="">GST IN : {{$contact->gstin}}</div>
</div>

<table class="w-full border-b border-t border-gray-300">
    <thead class="font-semibold text-[10px] bg-gray-50">
    <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
        <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
        <th class="py-2 w-[15%] border-r border-gray-300">Type</th>
        <th class="py-2 border-r border-gray-300">Particulars</th>
        <th class="py-2 w-[10%] border-r border-gray-300">Invoice Amount</th>
        <th class="py-2 w-[10%] border-r border-gray-300">Receipt Amount</th>
        <th class="py-2 w-[10%] border-r px-1 border-gray-300">Balance</th>
    </tr>
    </thead>
    <tbody>
    @php
        $totalSales = 0+$opening_balance;
        $totalReceipt = 0;
    @endphp
    <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
        @if($party !=null)
            <td class="py-2 text-center px-0.5 border-l border-r border-gray-300" colspan="3">Opening Balance</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{ $opening_balance}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$opening_balance}}</td>
        @endif
    </tr>
    @foreach($list as $index=>$row)
        @php
            $totalSales += floatval($row->grand_total);
            $totalReceipt += floatval($row->transaction_amount);
        @endphp
        <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
            <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
            <td class="py-2 text-center border-r border-gray-300">{{ $row->mode }}</td>
            <td class="py-2 text-center px-0.5 border-r border-gray-300">{{$row->mode=='invoice' ?$row->vno.' / ':''}}{{date('d-m-Y', strtotime($row->vdate))}}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300"> {{ $row->grand_total }}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{ $row->transaction_amount }}</td>
            <td class="py-2 text-end px-0.5 border-r border-gray-300">{{  $balance  = $totalSales-$totalReceipt}}</td>
        </tr>
    @endforeach
    <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
        <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">TOTALS</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$totalSales+$opening_balance}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{ $totalReceipt}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
    </tr>
    <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
        <td class="py-2 text-center border-l border-r border-gray-300" colspan="3">Balance</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300">{{ $totalSales-$totalReceipt}}</td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
        <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
    </tr>
    </tbody>
</table>

</body>
</html>
