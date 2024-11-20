<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;

class Lessons extends Component
{
    public $myLessons;

    public function mount()
    {
        $this->myLessons = Auth::user()
            ->lessons()
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function deleteLesson($id)
    {
        $lesson = Lesson::find($id);
        
        $lesson->delete();

        $this->myLessons = Auth::user()
            ->lessons()
            ->orderBy('id', 'DESC')
            ->get();
        
        session()->flash('portal_status', 'Lesson successfully deleted.');
    }

    public function render()
    {
        return view('livewire.portal.lessons')
            ->layout('components.layouts.portal')
            ->title('Lessons');
    }
}