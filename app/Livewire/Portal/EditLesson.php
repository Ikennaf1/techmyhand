<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Lesson;
use Livewire\Attributes\Validate; 

class EditLesson extends Component
{
    public $lesson;

    #[Validate('required|min:5|max:72')]
    public $title;

    #[Validate('required|min:25|max:128')]
    public $short_description;

    #[Validate('required')]
    public $content;

    #[Validate('required')]
    public $youtube_video_id;

    public $addendum_video_id;

    public $summary;

    public function mount($lesson)
    {
        $this->lesson = Lesson::findOrFail($lesson);
        $this->title = $this->lesson->title;
        $this->short_description = $this->lesson->short_description;
        $this->content = $this->lesson->content;
        $this->youtube_video_id = $this->lesson->youtube_video_id;
        $this->summary = $this->lesson->summary;
        $this->addendum_video_id = $this->lesson->addendum_video_id;
    }

    public function update()
    {
        $this->validate();

        $this->authorize('update', $this->lesson);

        $lesson = $this->lesson->update([
            'title' => $this->title,
            'content' => $this->content,
            'youtube_video_id' => $this->youtube_video_id
        ]);

        session()->flash('portal_status', 'Lesson created successfully.');
    }

    public function updated($name, $value) 
    {
        $this->lesson->update([
            $name => $value,
        ]);

        session()->flash('portal_status', 'Lesson edited successfully.');
    }

    public function render()
    {
        $this->authorize('update', $this->lesson);

        return view('livewire.portal.edit-lesson', [
            'lesson' => $this->lesson
        ])->layout('components.layouts.portal')
            ->title('Edit Lesson');
    }
}
