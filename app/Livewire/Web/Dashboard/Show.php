<?php

namespace App\Livewire\Web\Dashboard;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Show extends Component
{
    public $blog;
    public $collectBlog;
    public $blogIndex;

    public function mount($id)
    {
        $this->blogIndex=$id;
        $response = Http::get('https://cloud.aaranassociates.com/api/v1/blog');
        $this->collectBlog = $response->json();
        $this->blog = $this->collectBlog[$id];
    }

    
    public function render()
    {
        return view('livewire.web.dashboard.show');
    }
}
