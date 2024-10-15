<?php

namespace App\Livewire\Web\Dashboard;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Show extends Component
{
    public $blog;

    public function mount($id)
    {
        $response = Http::get('https://cloud.aaranassociates.com/api/v1/blog');
        $this->blog = $response->json();
        $this->blog = $this->blog[$id];
    }
    public function render()
    {
        return view('livewire.web.dashboard.show');
    }
}
