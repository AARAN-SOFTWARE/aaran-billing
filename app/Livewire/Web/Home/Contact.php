<?php

namespace App\Livewire\Web\Home;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.web.home.contact')->layout('layouts.web');
    }
}
