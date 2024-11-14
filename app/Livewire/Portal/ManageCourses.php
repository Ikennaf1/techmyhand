<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ManageCourses extends Component
{
    public function render()
    {
        $user = Auth::user();
        $topicCount = $user->lessons()->count();
        return view('livewire.portal.manage-courses', [
            'topicCount' => $topicCount,
        ])->layout('components.layouts.portal')
            ->title('Manage Courses');;
    }
}
