<?php

namespace App\Livewire\Reports\Statement;

use Aaran\Entries\Models\Purchase;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Aaran\Transaction\Models\Transaction;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Payables extends Component
{
    use CommonTraitNew;
    #region[properties]
    public Collection $contacts;
    public $byParty;
    public $byOrder;
    public $start_date;
    public $end_date;
    public mixed $opening_balance = '0';
    public mixed $sale_total = 0;
    public mixed $receipt_total = 0;
    public mixed $invoiceDate_first = '';
    #endregion

    public function mount()
    {
        $this->byParty = null;
        $this->start_date = null;
        $this->end_date = null;

    }

    #region[Contact]
    public function getContact()
    {
        $this->contacts = Contact::where('company_id', '=', session()->get('company_id'))->where('contact_type_id','123')->get();
    }
    #endregion

    #region[opening_balance]

    public function opening_Balance()
    {
        if ($this->byParty) {
            $obj = Contact::find($this->byParty);
            $this->opening_balance = $obj->opening_balance;

            $this->invoiceDate_first = Carbon::now()->subYear()->format('Y-m-d');

            $this->sale_total = Purchase::whereDate('purchase_date', '<', $this->start_date?:$this->invoiceDate_first)
                ->where('contact_id','=',$this->byParty)
                ->sum('grand_total');

            $this->receipt_total = Transaction::whereDate('vdate', '<', $this->start_date?:$this->invoiceDate_first)
                ->where('contact_id','=',$this->byParty)
                ->where('mode_id','=',110)
                ->sum('vname');

            $this->opening_balance = $this->opening_balance + $this->sale_total - $this->receipt_total;
        }
        return $this->opening_balance;
    }
    #endregion


    public function getList()
    {
        $this->opening_Balance();

        $salesQuery = Transaction::select([
            'transactions.company_id',
            'transactions.contact_id',
            DB::raw("'receipt' as mode"),
            "transactions.id as vno",
            'transactions.vdate as vdate',
            DB::raw("'' as grand_total"),
            'transactions.vname',
        ])
            ->where('active_id', '=', 1)
            ->where('mode_id', '=', 110)
            ->where('company_id', '=', session()->get('company_id'));

        if ($this->byParty) {
            $salesQuery->where('contact_id', '=', $this->byParty);
        }
        if ($this->start_date) {
            $salesQuery->whereDate('vdate', '>=', $this->start_date);
        }

        if ($this->end_date) {
            $salesQuery->whereDate('vdate', '<=', $this->end_date);
        }
        $sales = $salesQuery;
        $invoiceQuery = Sale::select([
            'sales.company_id',
            'sales.contact_id',
            DB::raw("'invoice' as mode"),
            "sales.invoice_no as vno",
            'sales.invoice_date as vdate',
            'sales.grand_total',
            DB::raw("'' as transaction_amount"),
        ])
            ->where('active_id', '=', 1)
            ->where('company_id', '=', session()->get('company_id'));

        if ($this->byParty) {
            $invoiceQuery->where('contact_id', '=', $this->byParty);
        }

        if ($this->start_date) {
            $invoiceQuery->whereDate('invoice_date', '>=', $this->start_date);
        }

        if ($this->end_date) {
            $invoiceQuery->whereDate('invoice_date', '<=', $this->end_date);
        }

        return $invoiceQuery->union($sales)
            ->orderBy('vdate')
            ->orderBy('mode')
            ->get();
    }
    public function print()
    {

        if ($this->byParty != null) {
            $this->redirect(route('payables.print',
                [
                    'party' => $this->byParty, 'start_date' => $this->start_date ?: $this->invoiceDate_first,
                    'end_date' => $this->end_date ?: Carbon::now()->format('Y-m-d'),
                ]));
        }
    }

    #region[Render]
    public function render()
    {
        $this->getContact();
        return view('livewire.reports.statement.payables')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
