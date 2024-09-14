<?php

namespace App\Http\Controllers\Report\Sales;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use function Spatie\LaravelPdf\Support\pdf;

class SummaryController extends Controller
{
    public function __invoke($year)
    {
        return pdf('pdf-view.report.sales.summary-report', [
            'year' => $year,
            'cmp' => Company::printDetails(session()->get('company_id')),
        ]);
    }

    #region[monthlySales]
    public static function monthlySales($month,$year)
    {
        return Sale::whereMonth('invoice_date','=',$month)
            ->whereYear('invoice_date','=',$year?:Carbon::now()->format('Y'))
            ->where('company_id','=',session()->get('company_id'))->sum('grand_total');
    }
    #endregion

}
