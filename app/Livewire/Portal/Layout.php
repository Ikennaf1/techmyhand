<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class Layout extends Component
{
    public $title = 'Portal';
    
    public function render()
    {
        return view('livewire.portal.layout')
            ->layout('components.layouts.portal')
            ->title($this->title);
    }
}
