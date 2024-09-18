<?php

namespace App\Http\Controllers\Report\Sales;

use Aaran\Entries\Models\Purchase;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use function Spatie\LaravelPdf\Support\pdf;

class GstReportController extends Controller
{
    public function __invoke($month,$year)
    {

        return pdf('pdf-view.report.sales.gst-report', [
            'sales'=>$this->getSales($month,$year),
            'purchase'=>$this->getPurchase($month,$year),
            'cmp' => Company::printDetails(session()->get('company_id')),
        ]);
    }

    public function getSales($month,$year)
    {
        return Sale::whereMonth('invoice_date','=',$month?:Carbon::now()->format('m'))
            ->whereYear('invoice_date','=',$year?:Carbon::now()->format('Y'))
            ->where('company_id','=',session()->get('company_id'))->get();
    }

    public function getPurchase($month,$year)
    {
        return Purchase::whereMonth('purchase_date','=',$month?:Carbon::now()->format('m'))
            ->whereYear('purchase_date','=',$year?:Carbon::now()->format('Y'))
            ->where('company_id','=',session()->get('company_id'))->get();
    }
}
