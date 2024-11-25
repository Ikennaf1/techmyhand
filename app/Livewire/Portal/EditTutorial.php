<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Tutorial;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class EditTutorial extends Component
{
    public $tutorial;

    public $lessons;

    #[Validate('required|min:5|max:72')]
    public $title;

    #[Validate('required|min:25|max:128')]
    public $description;
    public $content;
    public $keywords;

    public function mount($tutorial)
    {
        $this->tutorial = Tutorial::findOrFail($tutorial);
        $this->lessons = Auth::user()->lessons()->latest()->get();
        $this->title = $this->tutorial->title;
        $this->description = $this->tutorial->description;
        $this->content = $this->tutorial->content;
        $this->keywords = $this->tutorial->keywords;
    }

    public function update()
    {
        $this->validate();

        $this->authorize('update', $this->tutorial);

        $tutorial = $this->tutorial->update([
            'title' => $this->title,
            'content' => $this->content
        ]);

        session()->flash('portal_status', 'Tutorial created successfully.');
    }

    public function addTutorialLesson()
    {
        dd(request()->input());
    }

    public function updated($name, $value) 
    {
        $this->tutorial->update([
            $name => $value,
        ]);

        session()->flash('portal_status', 'Tutorial edited successfully.');
    }

    public function render()
    {
        $this->authorize('update', $this->tutorial);

        return view('livewire.portal.edit-tutorial')
            ->layout('components.layouts.portal')
            ->title('Add new tutorial');
    }
}
