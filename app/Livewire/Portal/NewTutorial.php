<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate; 

class NewTutorial extends Component
{
    #[Validate('required|min:5|max:72')]
    public $title = '';

    #[Validate('required|min:25|max:128')]
    public $description = '';

    public function new()
    {
        $this->authorize('create', new Tutorial);
        
        $this->validate(); 

        $tutorial = Tutorial::create([
            'title'             => $this->title,
            'user_id'           => Auth::user()->id,
            'description'       => $this->description,
            'uniqid'            => uniqid('', true)
        ]);

        session()->flash('portal_status', 'Tutorial successfully created.');
 
        return $this->redirect(route('portal.tutorials.edit', $tutorial->id));
    }

    public function render()
    {
        return view('livewire.portal.new-tutorial')
            ->layout('components.layouts.portal')
            ->title('Add new tutorial');
    }
}
