<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Tutorial;

class Tutorials extends Component
{
    public $myTutorials;

    public function mount()
    {
        $this->refreshTutorials();
    }

    public function deleteTutorial($id)
    {
        $tutorial = Tutorial::find($id);

        $this->authorize('delete', $tutorial);
        
        $tutorial->delete();

        $this->refreshTutorials();
        
        session()->flash('portal_status', 'Tutorial successfully deleted.');
    }

    public function render()
    {
        return view('livewire.portal.tutorials')
            ->layout('components.layouts.portal')
            ->title('Tutorials');
    }

    private function refreshTutorials()
    {
        $this->myTutorials = Auth::user()
            ->tutorials()
            ->orderBy('id', 'DESC')
            ->get();
    }
}
