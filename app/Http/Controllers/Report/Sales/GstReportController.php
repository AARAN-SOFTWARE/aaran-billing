<?php

namespace App\Http\Controllers\Report\Sales;

use App\Http\Controllers\Controller;
use function Spatie\LaravelPdf\Support\pdf;

class GstReportController extends Controller
{
    public function __invoke($month,$year)
    {

        return pdf('pdf-view.report.sales.gst-report', [

        ]);
    }
}
