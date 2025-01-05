<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class MyCourses extends Component
{
    public $myCourses;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->myCourses = $this->getSubscribedCourses();
    }

    public function render()
    {
        return view('livewire.portal.my-courses')
            ->layout('components.layouts.portal')
            ->title('My Courses');
    }

    private function getSubscribedCourses()
    {
        $courses = [];
        $products = $this->user->subscribedProducts;

        foreach ($products as $product) {
            $courses = [$product->course, ...$courses];
        }

        return collect($courses);
    }
}
