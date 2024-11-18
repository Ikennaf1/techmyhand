<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate; 

class NewLesson extends Component
{
    #[Validate('required|min:5|max:72')] 
    public $title = '';

    #[Validate('required|min:25|max:128')] 
    public $short_description = '';

    public function new()
    {
        $this->validate(); 

        $lesson = Lesson::create([
            'title'             => $this->title,
            'user_id'           => Auth::user()->id,
            'short_description' => $this->short_description
        ]);

        session()->flash('portal_status', 'Lesson successfully created.');
 
        return $this->redirect(route('portal.lessons.edit', $lesson->id));
    }

    public function render()
    {
        return view('livewire.portal.new-lesson')
            ->layout('components.layouts.portal')
            ->title('Add new lesson');
    }
}
