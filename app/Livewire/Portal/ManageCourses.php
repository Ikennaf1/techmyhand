<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ManageCourses extends Component
{
    public function render()
    {
        $user = Auth::user();
        $lessonCount = $user->lessons()->count();
        $lastUploadedLesson = $user->lessons()->latest()->first();

        if ($lessonCount === 0) {
            return view('livewire.portal.manage-courses-no-lesson', [
                'lessonCount' => $lessonCount
            ])->layout('components.layouts.portal')
                ->title('Manage Courses');
        }

        return view('livewire.portal.manage-courses', [
            'lessonCount' => $lessonCount,
            'lastUploadedLesson' => $lastUploadedLesson
        ])->layout('components.layouts.portal')
            ->title('Manage Courses');
    }
}
