<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Cohort;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class EditCohort extends Component
{
    public $course;
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
        $this->course = $this->cohort->product->course;
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
        $this->authorize('update', $this->cohort);

        $this->validateProduct();

        $this->validateInputs();

        $cohort = $this->cohort->update([
            'title' => $this->title,
            // 'product_id' => $this->cohort->product_id,
            // 'user_id' => Auth::user()->id,
            'discount' => $this->discount,
            'enroll_start' => $this->enroll_start,
            'enroll_end' => $this->enroll_end,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'pioneer' => !empty($this->pioneer) ? 'yes' : 'no'
        ]);
    }

    public function render()
    {
        return view('livewire.portal.edit-cohort')
            ->layout('components.layouts.portal')
            ->title('Edit cohort');
    }

    private function validateDiscount()
    {
        if (empty($this->discount)) return 0;

        if ($this->discount < $this->discount_min 
            || $this->discount > $this->discount_max) {
            return 0;
        }

        return (int) $this->discount;
    }

    private function validateEnrollments()
    {
        if (empty($this->enroll_start)) {
            $this->enroll_start = Carbon::now();
        } else {
            $this->enroll_start = Carbon::create($this->enroll_start);
        }

        if (empty($this->enroll_end)) {
            $this->enroll_end = Carbon::now()->addWeeks(2);
        } else {
            $this->enroll_end = Carbon::create($this->enroll_end);
        }

        if ($this->enroll_start->greaterThan($this->enroll_end)) {
            $this->enroll_start = Carbon::now();
            $this->enroll_end = Carbon::now()->addWeeks(2);
        }
    }

    private function validateCourseDuration()
    {
        if (empty($this->start_date)) {
            $this->start_date = Carbon::now()->addWeeks(2);
        } else {
            $this->start_date = Carbon::create($this->start_date);
        }

        if (empty($this->end_date)) {
            $this->end_date = Carbon::now()->addWeeks(10);
        } else {
            $this->end_date = Carbon::create($this->end_date);
        }

        if ($this->start_date->lessThan($this->enroll_end)) {
            $this->start_date = $this->enroll_end;
            $this->end_date = $this->enroll_end->addWeeks(10);
        }

        if ($this->start_date->greaterThan($this->end_date)) {
            $this->start_date = Carbon::now()->addWeeks(2);
            $this->end_date = Carbon::now()->addWeeks(10);
        }
    }

    private function validateInputs()
    {
        $this->validateDiscount();
        $this->validateEnrollments();
        $this->validateCourseDuration();
    }

    private function validateProduct()
    {
        if ($this->course === null || !$this->course->is_approved) {
            session()->flash('portal_status', 'Cohort can not be created until course is created and approved.');
            return redirect(route('portal.courses.new'));
        }
    }
}
