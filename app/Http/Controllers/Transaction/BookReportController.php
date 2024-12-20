<?php

namespace App\Http\Controllers\Transaction;

use Aaran\Common\Models\Common;
use Aaran\Entries\Models\Purchase;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\ContactDetail;
use Aaran\Transaction\Models\Transaction;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookReportController extends Controller
{

    public function __invoke($party, $start_date, $end_date)
    {
        $payment = $this->getList($party, $start_date, $end_date);
        $this->getBalance($party, $start_date, $end_date);
        Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif','fontDir']);

        $pdf = PDF::loadView('pdf-view.Transaction.bookReport'
            , [
                'list' => Transaction::get(),
                'cmp' => Company::printDetails(session()->get('company_id')),
                'start_date' => date('d-m-Y', strtotime($start_date)),
                'end_date' => date('d-m-Y', strtotime($end_date)),
                'party'=>$party
            ]);
        $pdf->render();

        return $pdf->stream();
    }
    #region[opening_balance]


    public mixed $opening_balance;
    public mixed $receipt_total = 0;
    public mixed $payment_total = 0;
    public mixed $contact_detail_id ;
    public function getBalance($party, $start_date, $end_date)
    {
        $obj = Contact::find($party);
        $this->opening_balance = $obj->opening_balance;

        $this->payment_total = Transaction::whereDate('vdate', '<', $start_date)
            ->where('contact_id','=',$party)
            ->where('mode_id','=',110)
            ->sum('vname');

        $this->receipt_total = Transaction::whereDate('vdate', '<', $start_date)
            ->where('contact_id','=',$party)
            ->where('mode_id','=',111)
            ->sum('vname');

        $this->opening_balance = $this->opening_balance + $this->payment_total - $this->receipt_total;

        $this->contact_detail_id=ContactDetail::where('contact_id', '=', $party)->first()->id;

    }
    #endregion

    #region[List]
    public function getList($party, $start_date, $end_date)
    {
        $payment = Transaction::select([
            'transactions.company_id',
            'transactions.contact_id',
            DB::raw("'receipt' as mode"),
            "transactions.id as vno",
            'transactions.vdate as vdate',
            DB::raw("'' as grand_total"),
            'transactions.vname as payment_amount',
        ])
            ->where('active_id', '=', 1)
            ->where('contact_id', '=', $party)
            ->where('mode_id', '=', 110)
            ->whereDate('vdate', '>=', [$start_date, $end_date])
            ->whereDate('vdate', '<=', [$start_date, $end_date])
            ->where('company_id', '=', session()->get('company_id'));
        return Transaction::select([
            'transactions.company_id',
            'transactions.contact_id',
            DB::raw("'payment' as mode"),
            "transactions.id as vno",
            'transactions.vdate as vdate',
            DB::raw("'' as grand_total"),
            'transactions.vname as receipt_amount',
        ])
            ->where('active_id', '=', 1)
            ->where('contact_id', '=', $party)
            ->where('mode_id', '=', 111)
            ->whereDate('vdate', '>=', [$start_date, $end_date])
            ->whereDate('vdate', '<=', [$start_date, $end_date])
            ->where('company_id', '=', session()->get('company_id'))
            ->union($payment)
            ->get();
    }

}
