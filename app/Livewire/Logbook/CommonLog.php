<?php

namespace App\Livewire\Logbook;

use Aaran\Logbook\Models\Logbook;
use App\Livewire\Trait\CommonTraitNew;
use Livewire\Component;

class CommonLog extends Component
{
    use CommonTraitNew;
    use CommonTraitNew;
    #region[Property]
    public $log;
    public $logBookId;
    #endregion

    #region[Mount]
    public function mount($id)
    {
            $this->log = $id;
            $this->logBookId = Logbook::find($this->log)->vname;
    }
    #endregion
    public function render()
    {
        return view('livewire.logbook.common-log')->with([
            'logs' => $this->getListForm->getList(Logbook::class, function ($query) {
                return $query->orderBy('created_at', 'asc')
                    ->where('vname', $this->logBookId);
            }),
        ]);
    }
}
