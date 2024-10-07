<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garments</title>
    {{--    <link rel="stylesheet" href="/public/invoice.css" type="text/css">--}}
    <link rel="stylesheet" href="https://cdn.curlwind.com">
    <style type="text/css">
        /*common class*/
        * {
            font-family: Verdana, Arial, sans-serif, Helvetica, Times;
        }

        .page-break {
            page-break-after: always;
        }

        .wrap {
            overflow-wrap: anywhere;
        }

        table {
            width: 100%;
        }

        .bg-gray {
            background-color: #F9FAFB;
        }

        .w-full {
            width: 100%;
        }

        .border {
            border: 1px solid darkgrey;
            border-collapse: collapse;
        }

        .border-none {
            border: none;
        }

        .border-t {
            border-top: 1px solid darkgrey;
            border-collapse: collapse;
        }

        .border-r {
            border-right: 1px solid darkgrey;
            border-collapse: collapse;
        }

        .border-b {
            border-bottom: 1px solid darkgrey;
            border-collapse: collapse;
        }

        .border-l {
            border-left: 1px solid darkgrey;
            border-collapse: collapse;
        }

        .border-t-none {
            border-top: none;
        }

        .border-r-none {
            border-right: none;
        }

        .border-b-none {
            border-bottom: none;
        }

        .border-l-none {
            border-left: none;
        }

        .font-semibold {
            font-weight: lighter;
        }

        .font-bold {
            font-weight: bold;
        }

        .times {
            font-family: "Times New Roman", serif;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .lh-0 {
            line-height: 0.5;
        }

        .lh-1 {
            line-height: 1;
        }

        .lh-2 {
            line-height: 1.5;
        }

        .lh-3 {
            line-height: 2.5;
        }

        .lh-4 {
            line-height: 3;
        }

        .lh-5 {
            line-height: 3.5;
        }

        .lh-6 {
            line-height: 4;
        }

        .v-align-t {
            vertical-align: top;
        }

        .v-align-c {
            vertical-align: middle;
        }

        .v-align-b {
            vertical-align: bottom;
        }

        .p-0 {
            padding: 0;
        }

        .p-1 {
            padding: 1px;
        }

        .p-5 {
            padding: 5px;
        }

        .p-10 {
            padding: 10px;
        }

        .px-1 {
            padding: 0 1px;
        }

        .px-5 {
            padding: 0 5px;
        }

        .px-10 {
            padding: 0 10px;
        }

        .py-1 {
            padding: 1px 0;
        }

        .py-5 {
            padding: 5px 0;
        }

        .py-10 {
            padding: 10px 0;
        }

        .text-4xl {
            font-size: 36px;
        }

        .text-3xl {
            font-size: 28px;
        }

        .text-2xl {
            font-size: 24px;
        }

        .text-xl {
            font-size: 20px;
        }

        .text-lg {
            font-size: 16px;
        }

        .text-md {
            font-size: 12px;
        }

        .text-sm {
            font-size: 10px;
        }

        .text-xs {
            font-size: 9px;
        }
    </style>
</head>

<body>
<div class="w-full text-xs right p-1">Original Copy</div>
<table class="border ">
    <tr class="bg-gray center font-bold text-md">
        <td class="center " colspan="3">TAX INVOICE</td>
    </tr>
    <tr>
        <td width="40%" class="lh-0 text-xs border px-5" rowspan="2">
            <p class="font-bold">Exporter</p>
            <p>{{$cmp->get('company_name')}}</p>
            <p>{{$cmp->get('address_1')}}</p>
            <p>{{$cmp->get('address_2')}}, </p>
            <p>{{$cmp->get('city')}}</p>
            <p>{{$cmp->get('contact')}}</p>
        </td>
        <td class="lh-0 text-xs border px-5">
            <p>Invoice No: {{$obj->invoice_no}}</p>
            <p>Date: {{$obj->invoice_date ?date('d-m-Y', strtotime($obj->invoice_date)):''}}</p>
            <p>&nbsp;</p>
        </td>
        <td class="lh-0  text-xs border px-5">
            <p>Exporter' Ref</p>
            <p>IEC NO: AEUFS45TED</p>
            <p>{{$cmp->get('gstin')}}</p>
        </td>
    </tr>
    <tr>
        <td class="text-xs lh-0 v-align-t border px-5" colspan="2">
            <p>Buyer's style:</p>
        </td>
    </tr>
</table>
<table class="border border-t-none">
    <tr class=" text-xs v-align-t">
        <td width="40%" class="lh-0 text-xs  px-5">
            <p class="font-bold">consignee</p>
            <p>{{$obj->contact_name}}</p>
            <p>{{$consignee_address->get('address_1')}}</p>
            <p>{{$consignee_address->get('address_2')}}</p>
            <p>{{$consignee_address->get('address_3')}}</p>
            <p>{{$consignee_address->get('gstcell')}}</p>
        </td>
        <td class="lh-0 text-xs  px-5 border-l">
            <p>Buyer (if other than consignee)</p>
            <p>{{$obj->contact_name}}</p>
            <p>Lorem ipsum dolor sit amet, consectetur.</p>
            <p>Lorem ipsum dolor.</p>
            <p>Lorem ipsum dolor sit amet, consectetur.</p>
            <p>Lorem ipsum dolor.</p>
        </td>

    </tr>
</table>
<table class="border border-t-none lh-2 ">
    <tr class="text-xs ">
        <td width="20%" class="border-r px-5">Pre - Carriage by</td>
        <td width="20%" class="border-r px-5">Place of Receipt by</td>
        <td width="20%" class="border-r px-5">Country of Origin Goods</td>
        <td width="20%" class=" px-5">Country of final destination</td>
    </tr>
    <tr class="text-xs border-l ">
        <td width="20%" class="border-r border-b px-5">{{$obj->pre_carriage}}</td>
        <td width="20%" class="border-r border-b px-5">{{$obj->place_of_Receipt}}</td>
        <td width="20%" class="border- px-5">&nbsp;</td>
        <td width="20%" class=" px-5">&nbsp;</td>
    </tr>
    <tr class="text-xs">
        <td width="20%" class="border-r px-5">Vessel/Flight No</td>
        <td width="20%" class="border-r px-5">Port of Loading</td>
        <td width="20%" class="border-t px-5" colspan="2">Terms of Delivery and Payment</td>
    </tr>
    <tr class="text-xs border-l ">
        <td width="20%" class="border-r border-b px-5">{{$obj->vessel_flight_no}}</td>
        <td width="20%" class="border-r border-b px-5">{{$obj->port_of_discharge}}</td>
        <td width="20%" class=" px-5" colspan="2">&nbsp;</td>
    </tr>
    <tr class="text-xs ">
        <td width="20%" class="border-r px-5">Port of Discharge</td>
        <td width="20%" class="border-r px-5">Final destination</td>
        <td width="20%" class="px-5" colspan="2">C&F BY SEA</td>
    </tr>
    <tr class="text-xs border-l ">
        <td width="20%" class="border-r px-5">{{$obj->port_of_discharge}}</td>
        <td width="20%" class="border-r px-5">{{$obj->final_destination}}</td>
        <td width="20%" class=" px-5" colspan="2">&nbsp;</td>
    </tr>
</table>
<table class="border border-t-none">
    <tr class="text-xs font-bold lh-1 bg-gray">
        <th class="center border-r" rowspan="2">S.No</th>
        <th class="center border-r">Marks & Nos.</th>
        <th class="center border-r" rowspan="2">No. & Kinds of Pkgs</th>
        <th class="center border-r" rowspan="2">Description of Goods</th>
        <th class="center border-r">Qty</th>
        <th class="center border-r">C & F Rate</th>
        <th class="center border-r">Amount</th>
    </tr>
    <tr class="text-xs font-bold lh-1 border-b bg-gray">
        <th class="cnetr border-r">Container No.</th>

        <th class="center border-r">PCS</th>
        <th class="center border-r">IN USD</th>
        <th class="center">C&F in usd</th>
    </tr>
    @php
        $gstPercent = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr class="text-sm center v-align-t ">
            <td class="center border-r p-1">{{$index + 1}}</td>
            <td class="center border-r p-1">{{$row['pkgs_type']}}</td>
            <td class="center border-r p-1">{{$row['no_of_count']}} </td>
            <td class="center border-r p-1">{{$row['product_name']}} </td>
            <td class="center border-r p-1">{{$row['qty']+0}}</td>
            <td class="right border-r p-1">&nbsp;{{number_format($row['price'],2,'.','')}}</td>
            <td class="right border-r p-1">&nbsp;{{number_format($row['qty']*$row['price'],2,'.','')}}</td>
        </tr>
        @php
            $gstPercent = $row['gst_percent'];
        @endphp
    @endforeach
    {{-- Spacing  --}}
    @for($i = 0; $i < 8-$list->count(); $i++)
        <tr class="">
            <td height="38px" class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
            <td height="38px" class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
            <td class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
            <td class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
            <td class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
            <td class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
            <td class="border-r text-sm v-align-t p-1 center">&nbsp;</td>
        </tr>
    @endfor
    <tr>
        td
    </tr>
</table>
</body>
</html>
