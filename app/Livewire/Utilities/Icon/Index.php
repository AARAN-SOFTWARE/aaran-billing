<?php

namespace App\Livewire\Utilities\Icon;

use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{


    public function symbols()
    {
        return collect([
            ['icon' => 'plus-slim'],
            ['icon' => 'trash'],
            ['icon' => 'save'],
            ['icon' => 'pencil'],
        ]);
    }

    public function getList()
    {
        return $this->symbols();
    }

    public function render()
    {
        return view('livewire.utilities.icon.index')->with([
            'list' => $this->getList()
        ]);
    }
}
