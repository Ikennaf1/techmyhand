<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ManageCourses extends Component
{
    public $lessonCount;
    public $lastUploadedLesson;
    public $tutorialCount;
    public $lastUpdatedTutorial;

    public function mount()
    {
        $user = Auth::user();
        $this->lessonCount = $user->lessons()->count();
        $this->lastUploadedLesson = $user->lessons()->latest()->first();
        $this->tutorialCount = $user->tutorials()->count();
        $this->lastUpdatedTutorial = $user->tutorials()->latest()->first();
    }

    public function render()
    {
        if ($this->lessonCount === 0) {
            return view('livewire.portal.manage-courses-no-lesson')
                ->layout('components.layouts.portal')
                ->title('Manage Courses');
        }

        return view('livewire.portal.manage-courses')
            ->layout('components.layouts.portal')
            ->title('Manage Courses');
    }
}
