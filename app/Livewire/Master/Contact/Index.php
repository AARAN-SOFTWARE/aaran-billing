<?php

namespace App\Livewire\Master\Contact;


use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTraitNew;

    public function create(): void
    {
        $this->redirect(route('contacts.upsert', ['0']));
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Contact::find($id);
            $this->common->vid = $obj->id;
            return $obj;
        }
        return null;
    }

    public function trashData(): void
    {
        $obj = $this->getObj($this->common->vid);
        DB::table('contact_details')->where('contact_id', '=', $this->common->vid)->delete();
        $obj->delete();
        $this->showDeleteModal = false;
    }

    public function render()
    {
        return view('livewire.master.contact.index')->with([
            'list' => $this->getListForm->getList(Contact::class, function ($query) {
                return $query->where('company_id', '=',session()->get('company_id'));
            }),
        ]);
    }
}
