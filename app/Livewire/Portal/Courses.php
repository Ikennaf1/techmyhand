<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Events\CourseDeleted;

class Courses extends Component
{
    public $myCourses;

    public function mount()
    {
        $this->refreshComponent();
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);

        $this->authorize('delete', $course);
        
        $course->delete();

        $this->refreshComponent();
        
        session()->flash('portal_status', 'Course successfully deleted.');

        CourseDeleted::dispatch($course);
    }

    public function render()
    {
        return view('livewire.portal.courses')
            ->layout('components.layouts.portal')
            ->title('Courses');
    }

    private function refreshComponent()
    {
        $this->myCourses = Auth::user()
            ->courses()
            ->orderBy('id', 'DESC')
            ->get();
    }
}
