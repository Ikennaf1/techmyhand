<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.portal.home')
            ->layout('components.layouts.portal')
            ->title('Portal');
    }
}
