<?php

namespace App\Livewire\Reports\Transaction;

use Aaran\Transaction\Models\AccountBook;
use Aaran\Transaction\Models\Transaction;
use Livewire\Component;

class Cash extends Component
{

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

        return view('livewire.reports.transaction.cash')->with([
            'list' => $list,
        ]);
    }
}
