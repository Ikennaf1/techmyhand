<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cohort;

class Cohorts extends Component
{
    public $user;
    public $myCourses;
    public $myCreatedCohorts;
    public $myCohorts;
    public $freshCohorts;

    public function mount()
    {
        $this->user = Auth::user();
        $this->myCreatedCohorts = $this->user->cohorts;
        $this->myCourses = $this->user->courses;
        // dd($this->myCohorts);
        // dd($this->myCourses);
        $this->freshCohorts = Cohort::whereDate('enroll_end', '>', Carbon::now())->get();
    }

    public function render()
    {
        return view('livewire.portal.cohorts')
            ->layout('components.layouts.portal')
            ->title('Cohorts');
    }
}
