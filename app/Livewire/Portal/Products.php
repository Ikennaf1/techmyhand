<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::latest()->limit(10)->get();
    }

    public function render()
    {
        return view('livewire.portal.products')
            ->layout('components.layouts.portal')
            ->title('Products');
    }
}
