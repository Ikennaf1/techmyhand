<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use App\Models\Course;
use App\Models\Cohort;

class NewCohort extends Component
{
    public $course;

    #[Validate('required|min:5|max:175')]
    public $title;

    #[Validate('required|min:5|max:175')]
    public $discount = 0;
    public $discount_min = 0;
    public $discount_max = 60;
    public $enroll_start;
    public $enroll_end;
    public $start_date;
    public $end_date;
    public $pioneer = 'no';

    public function mount($course)
    {
        $this->course = Course::find($course);

        $this->validateProduct();
    }

    public function create()
    {
        $this->validateProduct();

        $this->validateInputs();

        $cohort = Cohort::create([
            'title' => $this->title,
            'product_id' => $this->course->product->id,
            'user_id' => Auth::user()->id,
            'discount' => $this->discount,
            'enroll_start' => $this->enroll_start,
            'enroll_end' => $this->enroll_end,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'pioneer' => $this->pioneer ? 'yes' : 'no'
        ]);

        session()->flash('portal_status', 'Cohort can not be created until course is created and approved.');

        return redirect(route('portal.cohorts'));
    }

    public function render()
    {
        return view('livewire.portal.new-cohort')
            ->layout('components.layouts.portal')
            ->title('New cohort');
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
            $this->enroll_start = Carbon::create(Carbon::now());
        } else {
            $this->enroll_start = Carbon::create($this->enroll_start);
        }

        if (empty($this->enroll_end)) {
            $this->enroll_end = Carbon::create(Carbon::now())->addWeeks(2);
        } else {
            $this->enroll_end = Carbon::create($this->enroll_end);
        }

        if ($this->enroll_start->greaterThan($this->enroll_end)) {
            $this->enroll_start = Carbon::create(Carbon::now());
            $this->enroll_end = Carbon::create(Carbon::now())->addWeeks(2);
        }
    }

    private function validateCourseDuration()
    {
        if (empty($this->start_date)) {
            $this->start_date = Carbon::create(Carbon::now())->addWeeks(2);
        } else {
            $this->start_date = Carbon::create($this->start_date);
        }

        if (empty($this->end_date)) {
            $this->end_date = Carbon::create(Carbon::now())->addMonths(2);
        } else {
            $this->end_date = Carbon::create($this->end_date);
        }

        if ($this->start_date->lessThan($this->enroll_end)) {
            $this->start_date = $this->enroll_end;
            $this->end_date = $this->enroll_end->addMonths(2);
        }

        if ($this->start_date->greaterThan($this->end_date)) {
            $this->start_date = Carbon::create(Carbon::now())->addWeeks(2);
            $this->end_date = Carbon::create(Carbon::now())->addMonths(2);
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
