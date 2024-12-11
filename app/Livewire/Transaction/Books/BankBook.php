<?php

namespace App\Livewire\Transaction\Books;

use Aaran\Common\Models\Common;
use Aaran\Entries\Models\Payment;
use Aaran\Transaction\Models\AccountBook;
use Aaran\Transaction\Models\Transaction;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Aaran\Transaction\Models\BankBook as BankBookModel;

class BankBook extends Component
{
    use CommonTraitNew;

//    #region[properties]
//    public $account_no;
//    public $ifsc_code;
//    public $branch;
//    public $opening_balance;
//    public $opening_date;
//    public $notes;
//    #endregion
//
//    #region[Validation]
//    public function rules(): array
//    {
//        return [
//            'common.vname' => 'required',
//            'account_no' => 'required',
//            'ifsc_code' => 'required',
//            'bank_id' => 'required',
//            'account_type_id' => 'required',
//            'opening_balance' => 'required',
//        ];
//    }
//
//    public function messages()
//    {
//        return [
//            'common.vname.required' => ' Enter Your :attribute',
//            'account_no.required' => ' Enter :attribute',
//            'ifsc_code.required' => ' Required :attribute',
//            'bank_id.required' => ' Mention the :attribute',
//            'account_type_id.required' => ' Enter Your :attribute',
//            'opening_balance.required' => ' Enter Your :attribute',
//        ];
//    }
//
//    public function validationAttributes()
//    {
//        return [
//            'common.vname' => 'Account Name',
//            'account_no' => 'Account No',
//            'ifsc_code' => 'IFSC code',
//            'bank_id' => 'Bank Name',
//            'account_type_id' => 'Account Type',
//            'opening_balance' => 'Opening Balance',
//        ];
//    }
//    #endregion
//
//    #region[Get-Save]
//    public function getSave(): void
//    {
//        $this->validate($this->rules());
//
//        if ($this->common->vname != '') {
//            if ($this->common->vid == '') {
//                $this->common->vname = preg_replace('/[^A-Za-z0-9\-]/', '', $this->common->vname);
//                $bank_book = new BankBookModel();
//                $extraFields = [
//                    'account_no' => $this->account_no,
//                    'ifsc_code' => $this->ifsc_code,
//                    'bank_id' => $this->bank_id,
//                    'account_type_id' => $this->account_type_id,
//                    'branch' => $this->branch,
//                    'opening_balance' => $this->opening_balance,
//                    'opening_date' => $this->opening_date,
//                    'notes' => $this->notes,
//                    'user_id' => auth()->id(),
//                    'company_id' => session()->get('company_id'),
//                ];
//                $this->common->save($bank_book, $extraFields);
//                $message = "Saved";
//            } else {
//                $bank_book = BankBookModel::find($this->common->vid);
//                $extraFields = [
//                    'account_no' => $this->account_no,
//                    'ifsc_code' => $this->ifsc_code,
//                    'bank_id' => $this->bank_id,
//                    'account_type_id' => $this->account_type_id,
//                    'branch' => $this->branch,
//                    'opening_balance' => $this->opening_balance,
//                    'opening_date' => $this->opening_date,
//                    'notes' => $this->notes,
//                    'user_id' => auth()->id(),
//                    'company_id' => session()->get('company_id'),
//                ];
//                $this->common->edit($bank_book, $extraFields);
//                $message = "Updated";
//            }
//            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
//        }
//    }
//    #endregion
//
//    #region[bank]
//    public $bank_name = '';
//    public $bank_id = '';
//    public Collection $bankCollection;
//    public $highlightBank = 0;
//    public $bankTyped = false;
//
//    public function decrementBank(): void
//    {
//        if ($this->highlightBank === 0) {
//            $this->highlightBank = count($this->bankCollection) - 1;
//            return;
//        }
//        $this->highlightBank--;
//    }
//
//    public function incrementBank(): void
//    {
//        if ($this->highlightBank === count($this->bankCollection) - 1) {
//            $this->highlightBank = 0;
//            return;
//        }
//        $this->highlightBank++;
//    }
//
//    public function setBank($name, $id): void
//    {
//        $this->bank_name = $name;
//        $this->bank_id = $id;
//        $this->getBankList();
//    }
//
//    public function enterBank(): void
//    {
//        $obj = $this->bankCollection[$this->highlightBank] ?? null;
//
//        $this->bank_name = '';
//        $this->bankCollection = Collection::empty();
//        $this->highlightBank = 0;
//
//        $this->bank_name = $obj['vname'] ?? '';
//        $this->bank_id = $obj['id'] ?? '';
//    }
//
//    public function refreshBank($v): void
//    {
//        $this->bank_id = $v['id'];
//        $this->bank_name = $v['name'];
//        $this->bankTyped = false;
//    }
//
//    public function bankSave($name)
//    {
//        $obj = Common::create([
//            'label_id' => 9,
//            'vname' => $name,
//            'active_id' => '1'
//        ]);
//        $v = ['name' => $name, 'id' => $obj->id];
//        $this->refreshBank($v);
//    }
//
//    public function getBankList(): void
//    {
//        $this->bankCollection = $this->bank_name ?
//            Common::search(trim($this->bank_name))->where('label_id', '=', '9')->get() :
//            Common::where('label_id', '=', '9')->get();
//    }
//#endregion
//
//    #region[account_type]
//    public $account_type_name = '';
//    public $account_type_id = '';
//    public Collection $account_typeCollection;
//    public $highlightAccountType = 0;
//    public $account_typeTyped = false;
//
//    public function decrementAccountType(): void
//    {
//        if ($this->highlightAccountType === 0) {
//            $this->highlightAccountType = count($this->account_typeCollection) - 1;
//            return;
//        }
//        $this->highlightAccountType--;
//    }
//
//    public function incrementAccountType(): void
//    {
//        if ($this->highlightAccountType === count($this->account_typeCollection) - 1) {
//            $this->highlightAccountType = 0;
//            return;
//        }
//        $this->highlightAccountType++;
//    }
//
//    public function setAccountType($name, $id): void
//    {
//        $this->account_type_name = $name;
//        $this->account_type_id = $id;
//        $this->getAccountTypeList();
//    }
//
//    public function enterAccountType(): void
//    {
//        $obj = $this->account_typeCollection[$this->highlightAccountType] ?? null;
//
//        $this->account_type_name = '';
//        $this->account_typeCollection = Collection::empty();
//        $this->highlightAccountType = 0;
//
//        $this->account_type_name = $obj['vname'] ?? '';
//        $this->account_type_id = $obj['id'] ?? '';
//    }
//
//    public function refreshAccountType($v): void
//    {
//        $this->account_type_id = $v['id'];
//        $this->account_type_name = $v['name'];
//        $this->account_typeTyped = false;
//    }
//
//    public function accountTypeSave($name)
//    {
//        $obj = Common::create([
//            'label_id' => 24,
//            'vname' => $name,
//            'active_id' => '1'
//        ]);
//        $v = ['name' => $name, 'id' => $obj->id];
//        $this->refreshAccountType($v);
//    }
//
//    public function getAccountTypeList(): void
//    {
//        $this->account_typeCollection = $this->account_type_name ?
//            Common::search(trim($this->account_type_name))->where('label_id', '=', '24')->get() :
//            Common::where('label_id', '=', '24')->get();
//    }
//#endregion
//
//    #region[Get-Obj]
//    public function getObj($id)
//    {
//        if ($id) {
//            $bank_book = BankBookModel::find($id);
//            $this->common->vid = $bank_book->id;
//            $this->common->vname = $bank_book->vname;
//            $this->common->active_id = $bank_book->active_id;
//            $this->bank_id = $bank_book->bank_id;
//            $this->bank_name = $bank_book->bank->vname;
//            $this->account_type_id = $bank_book->account_type_id;
//            $this->account_type_name = $bank_book->accountType->vname;
//            $this->account_no = $bank_book->account_no;
//            $this->ifsc_code = $bank_book->ifsc_code;
//            $this->branch = $bank_book->branch;
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
//        $this->bank_id = '';
//        $this->bank_name = '';
//        $this->account_type_id = '';
//        $this->account_type_name = '';
//        $this->account_no = '';
//        $this->ifsc_code = '';
//        $this->branch = '';
//        $this->opening_balance = '';
//        $this->opening_date = Carbon::now()->format('Y-m-d');
//        $this->notes = '';
//
//    }
//    #endregion
//
//    #region[render]
//    public function getList()
//    {
//        return BankBookModel::select(
//            'bank_books.*',
//            'bank.vname as bank_name',
//            'account_type.vname as account_type_name',
//        )
//            ->join('commons as bank', 'bank.id', '=', 'bank_books.bank_id')
//            ->join('commons as account_type', 'account_type.id', '=', 'bank_books.account_type_id')
//            ->where('bank_books.active_id', '=', $this->getListForm->activeRecord)
//            ->where('bank_books.company_id', '=', session()->get('company_id'))
//            ->orderBy('bank_books.id', $this->getListForm->sortAsc ? 'asc' : 'desc')
//            ->paginate($this->getListForm->perPage);
//    }

//    public function mount($id)
//    {
//        $this->accountData = AccountBook::find($id);
//
//    }


    #region[Bankbook]
    public $bankBookData = [];
    public $payments = [];

//    public function mount()
//    {
//        $this->getBankbookData();
//        $this->getPayment();
//    }

    public function getBankbookData()
    {
        $this->bankBookData = AccountBook::where('trans_type_id', 109)->get();
    }

    #endregion

    public function getPayment()
    {
        $this->payments = Transaction::with('accountBook')->where('trans_type_id', 109)->get();
    }


    public function render()
    {
//        $this->getBankList();
//        $this->getAccountTypeList();
        $this->getBankbookData();
        $this->getPayment();
        return view('livewire.transaction.books.bank-book');
    }
    #endregion
}
