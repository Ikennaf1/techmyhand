<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use App\Models\Course;

class NewCohort extends Component
{
    public $course;

    #[Validate('required|min:5|max:175')]
    public $title;

    public $discount;
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

    private function validateProduct()
    {
        if ($this->course === null || !$this->course->is_approved) {
            session()->flash('portal_status', 'Cohort can not be created until course is created and approved.');
            return redirect(route('portal.courses.new'));
        }
    }
}
