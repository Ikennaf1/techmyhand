<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class ManageCourses extends Component
{
    public function render()
    {
        return view('livewire.portal.manage-courses')
            ->layout('components.layouts.portal')
            ->title('Manage Courses');;
    }
}
