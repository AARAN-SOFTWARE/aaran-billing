<?php

namespace App\Livewire\Reports\Transaction;

use Aaran\Transaction\Models\AccountBook;
use Aaran\Transaction\Models\Transaction;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Bank extends Component
{
    use CommonTraitNew;
    use WithPagination;

//    public $byParty;
//    public mixed $opening_balance = '0';
//    public mixed $transaction_total = 0;
//    public mixed $receipt_total = 0;
//
//    #region[mount]
//    public function mount($id)
//    {
//        $this->byParty = $id;
//    }
//
//    #endregion
//
//    public function opening_Balance()
//    {
//        if ($this->byParty) {
//            $obj = Transaction::find($this->byParty);
//            $this->opening_balance = $obj->balance;
//
//            $this->transaction_total = Transaction::whereDate('date', '<', $this->start_date ?: $this->invoiceDate_first)
//                ->where('account_book_id', '=', $this->byParty)
//                ->sum('grand_total');
//
//            $this->receipt_total = Transaction::whereDate('vdate', '<', $this->start_date ?: $this->invoiceDate_first)
//                ->where('account_book_id', '=', $this->byParty)
//                ->where('mode_id', '=', 111)
//                ->sum('vname');
//
//            $this->opening_balance = $this->opening_balance + $this->transaction_total - $this->receipt_total;
//
//        }
//
//    }
//
//    #region[List]
//
//    public function getList()
//    {
//        $this->opening_Balance();
//
//        $receipt = Transaction::select([
//            'transactions.account_book_id',
//            'transactions.contact_id',
//            DB::raw("'receipt' as mode"),
//            "transactions.id as vno",
//            'transactions.vdate as vdate',
//            DB::raw("'' as grand_total"),
//            'transactions.vname',
//        ])
//            ->where('active_id', '=', 1)
//            ->where('contact_id', '=', $this->byParty)
//            ->where('mode_id', '=', 111)
//            ->whereDate('vdate', '>=', $this->start_date ?: $this->invoiceDate_first)
//            ->whereDate('vdate', '<=', $this->end_date ?: Carbon::now()->format('Y-m-d'));
//
//                  $payment = Transaction::select([
//                      'transactions.account_book_id',
//                      'transactions.contact_id',
//                      DB::raw("'payment' as mode"),
//                      "transactions.id as vno",
//                      'transactions.vdate as vdate',
//                      DB::raw("'' as grand_total"),
//                      'transactions.vname',
//                  ])
//                      ->where('active_id', '=', 1)
//                      ->where('contact_id', '=', $this->byParty)
//                      ->where('mode_id', '=', 110)
//                      ->whereDate('vdate', '>=', $this->start_date ?: $this->invoiceDate_first)
//                      ->whereDate('vdate', '<=', $this->end_date ?: carbon::now()->format('Y-m-d'))
//                      ->where('company_id', '=', session()->get('company_id'));
//    }
//
//    #endregion

//    public $account_book_id;
//    public function ()
//    {
//
//}

    public $transaction;
    public $accountId;

    public function mount($id)
    {
        $this->transaction = AccountBook::find($id);
        $this->accountId = $this->transaction->id;
    }

    public function render()
    {
        $list = Transaction::with('contact')
        ->where('account_book_id', $this->accountId)
            ->get();

        return view('livewire.reports.transaction.bank')->with([
            'list' => $list,
        ]);
    }
}
