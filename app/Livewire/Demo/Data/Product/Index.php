<?php

namespace App\Livewire\Demo\Data\Product;

use Aaran\Master\Models\Company;
use Aaran\Master\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $count;
    public function runFactoryProduct()
    {
        Product::factory()->count($this->count)->create();
        $successMessage = 'Factory Create Successfully.';
        $this->dispatch('notify', ...['type' => 'success', 'content' => $successMessage]);
    }

    public function runFactoryCompany()
    {
        Company::factory()->count($this->count)->create();
        $successMessage = 'Factory Create Successfully.';
        $this->dispatch('notify', ...['type' => 'success', 'content' => $successMessage]);
    }
    public function render()
    {
        return view('livewire.demo.data.product.index');
    }
}
