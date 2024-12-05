<?php

namespace App\Livewire\Transaction\AccountBook;

use Aaran\Common\Models\Common;
use Aaran\Transaction\Models\AccountBook;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    use CommonTraitNew;

    public $opening_balance;
    public $opening_balance_date;
    public $notes;
    public $account_no;
    public $ifsc_code;
    public $branch;

    #region[Validation]
    public function rules(): array
    {
        return [
            'common.vname' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'common.vname.required' => ' Mention The :attribute',
        ];
    }

    public function validationAttributes()
    {
        return [
            'common.vname' => 'Account name',
        ];
    }
    #endregion

    #region[Get-Save]
    public function getSave(): void
    {
        if ($this->common->vname != '') {
            if ($this->common->vid == '') {
                $AccountBook = new AccountBook();
                $extraFields = [
                    'trans_type_id' => $this->trans_type_id,
                    'opening_balance' => $this->opening_balance,
                    'opening_balance_date' => $this->opening_balance_date,
                    'notes' => $this->notes,
                    'account_no' => $this->account_no,
                    'ifsc_code' => $this->ifsc_code,
                    'bank_id' => $this->bank_id,
                    'account_type_id' => $this->account_type_id,
                    'branch' => $this->branch,
                    'user_id' => auth()->id(),
                    'company_id' => session()->get('company_id'),
                ];
                $this->common->save($AccountBook, $extraFields);
                $message = "Saved";
            } else {
                $AccountBook = AccountBook::find($this->common->vid);
                $extraFields = [
                    'trans_type_id' => $this->trans_type_id,
                    'opening_balance' => $this->opening_balance,
                    'opening_balance_date' => $this->opening_balance_date,
                    'notes' => $this->notes,
                    'account_no' => $this->account_no,
                    'ifsc_code' => $this->ifsc_code,
                    'bank_id' => $this->bank_id,
                    'account_type_id' => $this->account_type_id,
                    'branch' => $this->branch,
                    'user_id' => auth()->id(),
                    'company_id' => session()->get('company_id'),
                ];
                $this->common->edit($AccountBook, $extraFields);
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }

    #endregion

    #region[bank]
    public $bank_name = '';
    public $bank_id = '';
    public Collection $bankCollection;
    public $highlightBank = 0;
    public $bankTyped = false;

    public function decrementBank(): void
    {
        if ($this->highlightBank === 0) {
            $this->highlightBank = count($this->bankCollection) - 1;
            return;
        }
        $this->highlightBank--;
    }

    public function incrementBank(): void
    {
        if ($this->highlightBank === count($this->bankCollection) - 1) {
            $this->highlightBank = 0;
            return;
        }
        $this->highlightBank++;
    }

    public function setBank($name, $id): void
    {
        $this->bank_name = $name;
        $this->bank_id = $id;
        $this->getBankList();
    }

    public function enterBank(): void
    {
        $obj = $this->bankCollection[$this->highlightBank] ?? null;

        $this->bank_name = '';
        $this->bankCollection = Collection::empty();
        $this->highlightBank = 0;

        $this->bank_name = $obj['vname'] ?? '';
        $this->bank_id = $obj['id'] ?? '';
    }

    public function refreshBank($v): void
    {
        $this->bank_id = $v['id'];
        $this->bank_name = $v['name'];
        $this->bankTyped = false;
    }

    public function bankSave($name)
    {
        $obj = Common::create([
            'label_id' => 9,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshBank($v);
    }

    public function getBankList(): void
    {
        $this->bankCollection = $this->bank_name ?
            Common::search(trim($this->bank_name))->where('label_id', '=', '9')->get() :
            Common::where('label_id', '=', '9')->get();
    }
#endregion

    #region[account_type]
    public $account_type_name = '';
    public $account_type_id = '';
    public Collection $account_typeCollection;
    public $highlightAccountType = 0;
    public $account_typeTyped = false;

    public function decrementAccountType(): void
    {
        if ($this->highlightAccountType === 0) {
            $this->highlightAccountType = count($this->account_typeCollection) - 1;
            return;
        }
        $this->highlightAccountType--;
    }

    public function incrementAccountType(): void
    {
        if ($this->highlightAccountType === count($this->account_typeCollection) - 1) {
            $this->highlightAccountType = 0;
            return;
        }
        $this->highlightAccountType++;
    }

    public function setAccountType($name, $id): void
    {
        $this->account_type_name = $name;
        $this->account_type_id = $id;
        $this->getAccountTypeList();
    }

    public function enterAccountType(): void
    {
        $obj = $this->account_typeCollection[$this->highlightAccountType] ?? null;

        $this->account_type_name = '';
        $this->account_typeCollection = Collection::empty();
        $this->highlightAccountType = 0;

        $this->account_type_name = $obj['vname'] ?? '';
        $this->account_type_id = $obj['id'] ?? '';
    }

    public function refreshAccountType($v): void
    {
        $this->account_type_id = $v['id'];
        $this->account_type_name = $v['name'];
        $this->account_typeTyped = false;
    }

    public function accountTypeSave($name)
    {
        $obj = Common::create([
            'label_id' => 24,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshAccountType($v);
    }

    public function getAccountTypeList(): void
    {
        $this->account_typeCollection = $this->account_type_name ?
            Common::search(trim($this->account_type_name))->where('label_id', '=', '24')->get() :
            Common::where('label_id', '=', '24')->get();
    }
#endregion

    #region[trans_type]
    public $trans_type_id = '';
    public $trans_type_name = '';
    public \Illuminate\Support\Collection $trans_typeCollection;
    public $highlightTransType = 0;
    public $trans_typeTyped = false;

    public function decrementTransType(): void
    {
        if ($this->highlightTransType === 0) {
            $this->highlightTransType = count($this->trans_typeCollection) - 1;
            return;
        }
        $this->highlightTransType--;
    }

    public function incrementTransType(): void
    {
        if ($this->highlightTransType === count($this->trans_typeCollection) - 1) {
            $this->highlightTransType = 0;
            return;
        }
        $this->highlightTransType++;
    }

    public function setTransType($name, $id): void
    {
        $this->trans_type_name = $name;
        $this->trans_type_id = $id;
        $this->getTransTypeList();
    }

    public function enterTransType(): void
    {
        $obj = $this->trans_typeCollection[$this->highlightTransType] ?? null;

        $this->trans_type_name = '';
        $this->trans_typeCollection = \Illuminate\Database\Eloquent\Collection::empty();
        $this->highlightTransType = 0;

        $this->trans_type_name = $obj['vname'] ?? '';
        $this->trans_type_id = $obj['id'] ?? '';
    }

    public function refreshTransType($v): void
    {
        $this->trans_type_id = $v['id'];
        $this->trans_type_name = $v['name'];
        $this->trans_typeTyped = false;
    }

    public function transTypeSave($name)
    {
        $obj = Common::create([
            'label_id' => 19,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshTransType($v);
    }

    public function getTransTypeList(): void
    {
        $this->trans_typeCollection = $this->trans_type_name ?
            Common::search(trim($this->trans_type_name))->where('label_id', '=', '19')->get() :
            Common::where('label_id', '=', '19')->get();
    }
#endregion

    #region[Get-Obj]
    public function getObj($id)
    {
        if ($id) {
            $AccountBook = AccountBook::find($id);
//            dd($AccountBook);
            $this->common->vid = $AccountBook->id;
            $this->common->vname = $AccountBook->vname;
            $this->trans_type_id = $AccountBook->trans_type_id;
            $this->trans_type_name = $AccountBook->transType->vname;
            $this->opening_balance = $AccountBook->opening_balance;
            $this->opening_balance_date = $AccountBook->opening_balance_date;
            $this->notes = $AccountBook->notes;
            $this->account_no = $AccountBook->account_no;
            $this->ifsc_code = $AccountBook->ifsc_code;
            $this->bank_id = $AccountBook->bank_id;
            $this->bank_name = $AccountBook->bank->vname;
            $this->account_type_id = $AccountBook->account_type_id;
            $this->account_type_name = $AccountBook->accountType->vname;
            $this->branch = $AccountBook->branch;
            $this->common->active_id = $AccountBook->active_id;
            return $AccountBook;
        }
        return null;
    }

    #endregion

    #region[Clear-Fields]
    public function clearFields(): void
    {
        $this->common->vid = '';
        $this->trans_type_id = '';
        $this->trans_type_name = '';
        $this->common->vname = '';
        $this->opening_balance = '';
        $this->opening_balance_date = '';
        $this->notes = '';
        $this->account_no = '';
        $this->ifsc_code = '';
        $this->bank_id = '';
        $this->bank_name = '';
        $this->account_type_id = '';
        $this->account_type_name = '';
        $this->branch = '';
        $this->common->active_id = '1';
    }
    #endregion

    public function render()
    {
        $this->getBankList();
        $this->getAccountTypeList();
        $this->getTransTypeList();
        return view('livewire.transaction.account-book.index')->with([
            'list' => $this->getListForm->getList(AccountBook::class),
        ]);
    }
}
