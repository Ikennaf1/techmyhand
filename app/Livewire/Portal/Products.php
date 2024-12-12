<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        return view('livewire.portal.products')
            ->layout('components.layouts.portal')
            ->title('Products');
    }
}
