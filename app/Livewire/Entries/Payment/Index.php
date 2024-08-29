<?php

namespace App\Livewire\Entries\Payment;

use Aaran\Common\Models\Common;
use Aaran\Entries\Models\Payment;
use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{

    use CommonTraitNew;
    public $mode;
    public $vdate;
    public $chq_date;
    public $amount;

    public function Mount()
    {
        $this->vdate = Carbon::now()->format('Y-m-d');
    }

    #region[Get-Save]
    public function getSave(): void
    {
        if ($this->common->vname != '') {
            if ($this->common->vid == '') {
                $Payment = new Payment();
                $extraFields = [
                    'mode' => $this->mode,
                    'contact_id' => $this->contact_id,
                    'receipttype_id' => $this->receipt_type_id,
                    'vdate' => $this->vdate,
                    'chq_date' => $this->chq_date,
                    'bank_id' => $this->bank_id,
                    'amount' => $this->amount,
                    'user_id' => auth()->id(),
                    'acyear' => session()->get('acyear'),
                    'company_id' =>session()->get('company_id'),
                ];
                $this->common->save($Payment, $extraFields);
                $message = "Saved";
            } else {
                $Payment = Payment::find($this->common->vid);
                $extraFields = [
                    'mode' => $this->mode,
                    'contact_id' => $this->contact_id,
                    'receipttype_id' => $this->receipt_type_id,
                    'vdate' => $this->vdate,
                    'chq_date' => $this->chq_date,
                    'bank_id' => $this->bank_id,
                    'amount' => $this->amount,
                    'user_id' => auth()->id(),
                    'acyear' => session()->get('acyear'),
                    'company_id' =>session()->get('company_id'),
                ];
                $this->common->edit($Payment, $extraFields);
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[Contact]

    public $contact_id = '';
    public $contact_name = '';
    public Collection $contactCollection;
    public $highlightContact = 0;
    public $contactTyped = false;

    public function decrementContact(): void
    {
        if ($this->highlightContact === 0) {
            $this->highlightContact = count($this->contactCollection) - 1;
            return;
        }
        $this->highlightContact--;
    }

    public function incrementContact(): void
    {
        if ($this->highlightContact === count($this->contactCollection) - 1) {
            $this->highlightContact = 0;
            return;
        }
        $this->highlightContact++;
    }

    public function setContact($name, $id): void
    {
        $this->contact_name = $name;
        $this->contact_id = $id;
        $this->getContactList();
    }

    public function enterContact(): void
    {
        $obj = $this->contactCollection[$this->highlightContact] ?? null;

        $this->contact_name = '';
        $this->contactCollection = Collection::empty();
        $this->highlightContact = 0;

        $this->contact_name = $obj['vname'] ?? '';
        $this->contact_id = $obj['id'] ?? '';
    }

    #[On('refresh-contact')]
    public function refreshContact($v): void
    {
        $this->contact_id = $v['id'];
        $this->contact_name = $v['name'];
        $this->contactTyped = false;

    }

    public function getContactList(): void
    {

        $this->contactCollection = $this->contact_name ? Contact::search(trim($this->contact_name))
            ->where('company_id', '=', session()->get('company_id'))
            ->get() : Contact::where('company_id', '=', session()->get('company_id'))->get();

    }

    #endregion

    #region[bank]
    public $bank_id = '';
    public $bank_name = '';
    public \Illuminate\Support\Collection $bankCollection;
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
            'label_id' => 8,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshBank($v);
    }

    public function getBankList(): void
    {
        $this->bankCollection = $this->bank_name ?
            Common::search(trim($this->bank_name))->where('label_id', '=', '8')->get() :
            Common::where('label_id', '=', '8')->get();
    }
#endregion

    #region[receipt_type]
    public $receipt_type_id = '';
    public $receipt_type_name = '';
    public \Illuminate\Support\Collection $receipt_typeCollection;
    public $highlightReceiptType = 0;
    public $receipt_typeTyped = false;

    public function decrementReceiptType(): void
    {
        if ($this->highlightReceiptType === 0) {
            $this->highlightReceiptType = count($this->receipt_typeCollection) - 1;
            return;
        }
        $this->highlightReceiptType--;
    }

    public function incrementReceiptType(): void
    {
        if ($this->highlightReceiptType === count($this->receipt_typeCollection) - 1) {
            $this->highlightReceiptType = 0;
            return;
        }
        $this->highlightReceiptType++;
    }

    public function setReceiptType($name, $id): void
    {
        $this->receipt_type_name = $name;
        $this->receipt_type_id = $id;
        $this->getReceiptTypeList();
    }

    public function enterReceiptType(): void
    {
        $obj = $this->receipt_typeCollection[$this->highlightReceiptType] ?? null;

        $this->receipt_type_name = '';
        $this->receipt_typeCollection = Collection::empty();
        $this->highlightReceiptType = 0;

        $this->receipt_type_name = $obj['vname'] ?? '';
        $this->receipt_type_id = $obj['id'] ?? '';
    }

    public function refreshReceiptType($v): void
    {
        $this->receipt_type_id = $v['id'];
        $this->receipt_type_name = $v['name'];
        $this->receipt_typeTyped = false;
    }

    public function receiptTypeSave($name)
    {
        $obj = Common::create([
            'label_id' => 13,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshReceiptType($v);
    }

    public function getReceiptTypeList(): void
    {
        $this->receipt_typeCollection = $this->receipt_type_name ?
            Common::search(trim($this->receipt_type_name))->where('label_id', '=', '13')->get() :
            Common::where('label_id', '=', '13')->get();
    }
#endregion

    #region[Get-Obj]
    public function getObj($id)
    {
        if ($id) {
            $Payment = Payment::find($id);
            $this->common->vid = $Payment->id;
            $this->common->vname = $Payment->vname;
            $this->common->active_id = $Payment->active_id;
            $this->mode = $Payment->mode;
            $this->bank_id = $Payment->bank_id;
            $this->bank_name=$Payment->bank_id?Common::find($Payment->bank_id)->vname:'';
            $this->contact_id = $Payment->contact_id;
            $this->contact_name = $Payment->contact_id?Contact::find($Payment->contact_id)->vname:'';
            $this->receipt_type_id = $Payment->receipttype_id;
            $this->receipt_type_name = $Payment->receipttype_id?Common::find($Payment->receipttype_id)->vname:'';
            $this->chq_date = $Payment->chq_date;
            $this->vdate = $Payment->vdate;
            $this->amount = $Payment->amount;
            return $Payment;
        }
        return null;
    }
    #endregion

    #region[Clear-Fields]
    public function clearFields(): void
    {
        $this->common->vid = '';
        $this->common->vname = '-';
        $this->common->active_id = '1';
        $this->mode = 'Receipt';
        $this->bank_id = '';
        $this->bank_name='';
        $this->contact_id='';
        $this->contact_name='';
        $this->receipt_type_id='';
        $this->receipt_type_name='';
        $this->chq_date='';
        $this->amount = '';
        $this->vdate = Carbon::now()->format('Y-m-d');
    }
    #endregion

    #region[render]
    public function render()
    {
        $this->getBankList();
        $this->getReceiptTypeList();
        $this->getContactList();

        return view('livewire.entries.payment.index')->with([
            'list' => $this->getListForm->getList(Payment::class,function ($query){
                return $query -> where('id','>','');
            }),
        ]);
    }
    #endregion
}
