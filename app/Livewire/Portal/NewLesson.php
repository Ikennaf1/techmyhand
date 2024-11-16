<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class NewLesson extends Component
{
    public function render()
    {
        return view('livewire.portal.new-lesson')
            ->layout('components.layouts.portal')
            ->title('Add new lesson');
    }
}
