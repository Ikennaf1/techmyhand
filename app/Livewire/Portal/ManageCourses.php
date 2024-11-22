<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ManageCourses extends Component
{
    public $lessonsCount;
    public $lastUploadedLesson;
    public $tutorialsCount;
    public $lastUpdatedTutorial;

    public function mount()
    {
        $user = Auth::user();
        $this->lessonsCount = $user->lessons()->count();
        $this->lastUploadedLesson = $user->lessons()->latest()->first();
        $this->tutorialsCount = $user->tutorials()->count();
        $this->lastUpdatedTutorial = $user->tutorials()->latest()->first();
    }

    public function render()
    {
        if ($this->lessonsCount === 0) {
            return view('livewire.portal.manage-courses-no-lesson')
                ->layout('components.layouts.portal')
                ->title('Manage Courses');
        }

        return view('livewire.portal.manage-courses')
            ->layout('components.layouts.portal')
            ->title('Manage Courses');
    }
}
