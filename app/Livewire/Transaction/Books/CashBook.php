<?php

namespace App\Livewire\Transaction\Books;

use Aaran\Transaction\Models\AccountBook;
use App\Livewire\Trait\CommonTraitNew;
use Livewire\Component;
use Aaran\Transaction\Models\CashBook as CashBookModel;

class CashBook extends Component
{
    use CommonTraitNew;

//    #region[properties]
//    public $opening_balance;
//    public $opening_date;
//    public $notes;
//    #endregion
//
//    #region[Get-Save]
//    public function getSave(): void
//    {
//        if ($this->common->vname != '') {
//            if ($this->common->vid == '') {
//                $this->common->vname = preg_replace('/[^A-Za-z0-9\-]/', '', $this->common->vname);
//                $cash_book = new CashBookModel();
//                $extraFields = [
//                    'opening_balance' => $this->opening_balance,
//                    'opening_date' => $this->opening_date,
//                    'notes' => $this->notes,
//                    'user_id' => auth()->id(),
//                    'company_id' => session()->get('company_id'),
//                ];
//                $this->common->save($cash_book, $extraFields);
//                $message = "Saved";
//            } else {
//                $cash_book = CashBookModel::find($this->common->vid);
//                $extraFields = [
//                    'opening_balance' => $this->opening_balance,
//                    'opening_date' => $this->opening_date,
//                    'notes' => $this->notes,
//                    'user_id' => auth()->id(),
//                    'company_id' => session()->get('company_id'),
//                ];
//                $this->common->edit($cash_book, $extraFields);
//                $message = "Updated";
//            }
//            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
//        }
//    }
//    #endregion
//
//    #region[Get-Obj]
//    public function getObj($id)
//    {
//        if ($id) {
//            $bank_book = CashBookModel::find($id);
//            $this->common->vid = $bank_book->id;
//            $this->common->vname = $bank_book->vname;
//            $this->common->active_id = $bank_book->active_id;
//            $this->opening_balance = $bank_book->opening_balance;
//            $this->opening_date = $bank_book->opening_date;
//            $this->notes = $bank_book->notes;
//            return $bank_book;
//        }
//        return null;
//    }
//    #endregion
//
//    #region[Clear-Fields]
//    public function clearFields(): void
//    {
//        $this->common->vid = '';
//        $this->common->vname = '';
//        $this->common->active_id = '1';
//        $this->opening_balance='';
//        $this->opening_date='';
//        $this->notes='';
//    }
//    #endregion
//
//    #region[render]
//    public function getList()
//    {
//        return CashBookModel::select(
//            'cash_books.*',
//        )
//            ->where('cash_books.active_id', '=', $this->getListForm->activeRecord)
//            ->where('cash_books.company_id', '=', session()->get('company_id'))
//            ->orderBy('cash_books.id', $this->getListForm->sortAsc ? 'asc' : 'desc')
//            ->paginate($this->getListForm->perPage);
//    }


    public $cashBookData;
    public function getCashbookData()
    {
        $this->cashBookData = AccountBook::where('trans_type_id','108')->get();

}
    public function render()
    {
        $this->getCashbookData();
        return view('livewire.transaction.books.cash-book')->with([
//            'list' => $this->getList()
        ]);
    }
    #endregion
}
