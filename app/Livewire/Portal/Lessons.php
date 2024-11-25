<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Events\LessonDeleted;

class Lessons extends Component
{
    public $myLessons;

    public function mount()
    {
        $this->refreshLessons();
    }

    public function deleteLesson($id)
    {
        $lesson = Lesson::find($id);

        $this->authorize('delete', $lesson);
        
        $lesson->delete();

        $this->refreshLessons();
        
        session()->flash('portal_status', 'Lesson successfully deleted.');

        LessonDeleted::dispatch($lesson);
    }

    public function render()
    {
        return view('livewire.portal.lessons')
            ->layout('components.layouts.portal')
            ->title('Lessons');
    }

    private function refreshLessons()
    {
        $this->myLessons = Auth::user()
            ->lessons()
            ->orderBy('id', 'DESC')
            ->get();
    }
}
