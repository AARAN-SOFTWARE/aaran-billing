<?php

namespace App\Livewire\Reports\Transaction;

use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTraitNew;
use Livewire\Component;

class ReceivableReport extends Component
{

    use CommonTraitNew;

    public function getList()
    {
        return Contact::where('contact_type_id', '123')->get();
//        return Contact::select(
//            'contacts.*',
//            'contact_type.vname as contact_type',
//            'msme_type.vname as msme_type',
//        )
//            ->where('contacts.company_id',session()->get('company_id'))
//            ->where('contacts.active_id',$this->getListForm->activeRecord)
//            ->join('commons as contact_type', 'contact_type.id', '=', 'contacts.contact_type_id')
//            ->join('commons as msme_type', 'msme_type.id', '=', 'contacts.msme_type_id')
//            ->orderBy('contacts.id',$this->getListForm->sortAsc ? 'asc' : 'desc')
//            ->paginate($this->getListForm->perPage);
    }

    public function render()
    {
        return view('livewire.reports.transaction.receivable-report')->with([
            'list' => $this->getList(),
        ]);
    }
}
