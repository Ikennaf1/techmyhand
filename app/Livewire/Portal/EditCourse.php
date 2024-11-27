<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Course;
use App\Models\CourseTutorial;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class EditCourse extends Component
{
    public $course;

    public $tutorials;

    public $courseTutorials;

    #[Validate('required|min:5|max:72')]
    public $title;

    #[Validate('required|min:25|max:128')]
    public $description;

    public $content;
    
    public $keywords;

    public function mount($course)
    {
        $this->course = Course::findOrFail($course);
        $this->tutorials = Auth::user()->tutorials()->latest()->get();
        $this->title = $this->course->title;
        $this->description = $this->course->description;
        $this->content = $this->course->content;
        $this->keywords = $this->course->keywords;
        $this->courseTutorials = CourseTutorial::where('course_id', $course)
            ->get();
    }

    public function update()
    {
        $this->validate();

        $this->authorize('update', $this->course);

        $course = $this->course->update([
            'title' => $this->title,
            'content' => $this->content
        ]);

        session()->flash('portal_status', 'Course updated successfully.');
    }

    public function updated($name, $value) 
    {
        $this->course->update([
            $name => $value,
        ]);

        session()->flash('portal_status', 'Course edited successfully.');
    }

    public function render()
    {
        $this->authorize('update', $this->course);

        return view('livewire.portal.edit-course')
            ->layout('components.layouts.portal')
            ->title('Edit course');
    }
}
