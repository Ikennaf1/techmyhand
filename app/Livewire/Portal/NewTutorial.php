<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class NewTutorial extends Component
{
    public function render()
    {
        return view('livewire.portal.new-tutorial')
            ->layout('components.layouts.portal')
            ->title('Add new tutorial');
    }
}
