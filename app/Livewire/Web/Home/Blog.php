<?php

namespace App\Livewire\Web\Home;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.web.home.blog')->layout('layouts.web');
    }
}
