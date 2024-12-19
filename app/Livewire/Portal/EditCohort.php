<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Cohort;
use Livewire\Attributes\Validate;

class EditCohort extends Component
{
    public $cohort;

    #[Validate('required|min:5|max:175')]
    public $title;

    #[Validate('required')]
    public $enroll_start;

    #[Validate('required')]
    public $enroll_end;

    #[Validate('required')]
    public $start_date;

    public $end_date;
    public $discount;
    public $discount_min = 0;
    public $discount_max = 60;
    public $pioneer;

    public function mount($cohort)
    {
        $this->cohort = Cohort::find($cohort);
        $this->title = $this->cohort->title;
        $this->enroll_start = $this->cohort->enroll_start->toDateString();
        $this->enroll_end = $this->cohort->enroll_end->toDateString();
        $this->start_date = $this->cohort->start_date->toDateString();
        $this->end_date = $this->cohort->end_date->toDateString();
        $this->discount = $this->cohort->discount;
        $this->pioneer = $this->cohort->pioneer;
    }

    public function update()
    {
        $this->authorize('update', Cohort::class);

        $this->validateProduct();

        $this->validateInputs();

        $cohort = Cohort::update([
            'title' => $this->title,
            'product_id' => $this->course->product->id,
            'user_id' => Auth::user()->id,
            'discount' => $this->discount,
            'enroll_start' => $this->enroll_start,
            'enroll_end' => $this->enroll_end,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'pioneer' => $this->pioneer === 'yes' ? 'yes' : 'no'
        ]);
    }

    public function render()
    {
        return view('livewire.portal.edit-cohort')
            ->layout('components.layouts.portal')
            ->title('Edit cohort');
    }
}
