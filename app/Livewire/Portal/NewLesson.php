<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class NewLesson extends Component
{
    public $title = '';
    public $short_description = '';

    public function new()
    {
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
