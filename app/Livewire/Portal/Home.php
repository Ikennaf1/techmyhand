<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class Home extends Component
{
    public $title = 'Portal';
    
    public function render()
    {
        return view('livewire.portal.home')
            ->layout('components.layouts.portal')
            ->title($this->title);
    }
}
