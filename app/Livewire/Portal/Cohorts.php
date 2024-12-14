<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class Cohorts extends Component
{
    public function render()
    {
        return view('livewire.portal.cohorts')
            ->layout('components.layouts.portal')
            ->title('Cohorts');
    }
}
