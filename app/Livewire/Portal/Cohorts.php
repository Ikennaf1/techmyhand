<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cohort;
use App\Models\CohortUser;

class Cohorts extends Component
{
    public $user;
    public $myCourses;
    public $myCreatedCohorts;
    public $joinedCohorts;
    public $freshCohorts;

    public function mount()
    {
        $this->user = Auth::user();
        $this->myCreatedCohorts = $this->user->cohorts;
        $this->joinedCohorts = $this->user->joinedCohorts;
        $this->myCourses = $this->user->courses;
        $this->freshCohorts = $this->getFreshCohorts();
    }

    public function delete($id)
    {
        $cohort = Cohort::find($id);

        $this->authorize('delete', $cohort);
        
        $cohort->delete();

        $this->refreshComponent();
        
        session()->flash('portal_status', 'Cohort successfully deleted.');

        // CohortDeleted::dispatch($cohort);
    }

    public function render()
    {
        return view('livewire.portal.cohorts')
            ->layout('components.layouts.portal')
            ->title('Cohorts');
    }

    /**
     * Returns cohorts that a user can join
     * Removes cohorts created by the user,
     * and also cohorts the user already joined
     */
    private function getFreshCohorts()
    {
        $joinedCohortIDs = [];

        foreach ($this->joinedCohorts as $joined) {
            $joinedCohortIDs[] = $joined->id;
        }

        $tempCohorts = Cohort::whereDate('enroll_end', '>', Carbon::now())->get()
            ->where('user_id', '!=', $this->user->id);

        $cohorts = $tempCohorts->reject(function ($cohort) use ($joinedCohortIDs) {
            return in_array($cohort->id, $joinedCohortIDs);
        });

        return $cohorts;
    }
}
