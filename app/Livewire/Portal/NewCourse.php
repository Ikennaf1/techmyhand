<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class NewCourse extends Component
{
    #[Validate('required|min:5|max:72')]
    public $title = '';

    #[Validate('required|min:25|max:128')] 
    public $description = '';

    public function new()
    {
        $this->authorize('create', Course::class);

        $this->validate();

        $course = Course::create([
            'title'             => $this->title,
            'user_id'           => Auth::user()->id,
            'description'       => $this->description,
            'uniqid'            => uniqid('', true)
        ]);

        session()->flash('portal_status', 'Course successfully created.');
 
        return $this->redirect(route('portal.courses.edit', $course->id));
    }

    public function render()
    {
        return view('livewire.portal.new-course')
            ->layout('components.layouts.portal')
            ->title('Add new course');
    }
}
