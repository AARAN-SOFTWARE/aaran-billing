<html lang="en">

<head>
    <title>Transaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white-100 p-10">

<!-- Address  --------------------------------------------------------------------------------------------------------->


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

<div class=" w-full bg-gray-100 text-sm py-2 px-1 font-bold border-l border-b border-r border-gray-300">
    {{$trans_type_name}}
</div>

<table class="w-full border-b border-gray-300">


    <thead class="font-semibold text-[10px] bg-gray-50">
    <tr class="py-2 border-b border-r border-gray-300 tracking-wider">
        <th class="py-2 w-[3%] px-1 border-r border-l border-gray-300 text-center">S.No</th>
        <th class="py-2  border-r border-gray-300">Contact</th>
        <th class="py-2 w-[5%] border-r border-gray-300">Payment</th>
        <th class="py-2 w-[20%] border-r border-gray-300">Receipt</th>
        @if( $trans_type_id != 108)
        <th class="py-2 w-[20%] border-r border-gray-300">Type</th>
        @endif
        <th class="py-2 w-[10%] border-r px-1 border-gray-300">Balance</th>
    </tr>
    </thead>
    <tbody>
    @php
        $balance = 0;
        $OpenBalance = 0;
        $totalBalance = 0;
        $totalPayment = 0;
        $totalReceipt = 0;
    @endphp


    @foreach($list as $index=>$row)
        @php
            if ($row->mode_id ==110)
            {
                $totalPayment  += floatval($row->vname + 0);
            }
            elseif($row->mode_id ==111)
            {
                $totalReceipt  += floatval($row->vname + 0);
            }
        @endphp
        <tr class="text-[10px] border-b border-r border-gray-300 self-start ">
            <td class="py-2 text-center border-l border-r border-gray-300">{{$index+1}}</td>
            <td class="py-2 text-start border-r border-gray-300">{{$row->contact->vname}}</td>
            @if($row->mode_id == 110)
                 <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->vname+0}}</td>
            @else
                <td class="py-2 text-center px-0.5 border-r border-gray-300"></td>
            @endif

            @if($row->mode_id == 111)
                <td class="py-2 text-end px-0.5 border-r border-gray-300">{{$row->vname+0}}</td>
            @else
                <td class="py-2 text-end px-0.5 border-r border-gray-300"></td>
            @endif

            @if( $trans_type_id != 108)
                <td class="py-2 text-end px-0.5 border-r border-gray-300">{{\Aaran\Transaction\Models\Transaction::common($row->receipttype_id)}}</td>
                <x-table.cell-text></x-table.cell-text>
            @endif

            <td class="py-2 text-end px-0.5 border-r border-gray-300">  {{  $balance  = $totalReceipt-$totalPayment}}</td>
        </tr>
    @endforeach

        <tr class="text-[10px] border-r border-gray-300 font-semibold">
            <td class="py-2 text-end border-l border-r border-gray-300 px-0.5" colspan="2">Total</td>
            <td class="py-2 text-end border-r border-gray-300 px-0.5">{{$totalPayment}}</td>
            <td class="py-2 text-end border-r border-gray-300 px-0.5">{{$totalReceipt}}</td>
            <td class="py-2 text-end border-r border-gray-300 px-0.5 text-blue-600"> {{$totalReceipt - $totalPayment }}</td>
        </tr>
    </tbody>
</table>




</body>
</html>
