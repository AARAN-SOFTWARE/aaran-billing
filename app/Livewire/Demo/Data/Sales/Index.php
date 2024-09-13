<?php

namespace App\Livewire\Demo\Data\Sales;

use Aaran\Entries\Models\Sale;
use Livewire\Component;

class Index extends Component
{

    public function loadDummy()
    {

        $this->InvOne();
    }

    private function InvOne()
    {
        Sale::create([

        ]);

    }


    public function render()
    {
        return view('livewire.demo.data.sales.index');
    }
}
