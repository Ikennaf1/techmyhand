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
        $lastUploadedLesson = $user->lessons()->latest()->first();

        return view('livewire.portal.manage-courses', [
            'topicCount' => $topicCount,
            'lastUploadedLessonTitle' => $lastUploadedLesson->title,
            'lastUploadedLessonDescription' => $lastUploadedLesson->description,
            'lastUploadedLessonFeaturedImage' => $lastUploadedLesson->featured_image
        ])->layout('components.layouts.portal')
            ->title('Manage Courses');;
    }
}
