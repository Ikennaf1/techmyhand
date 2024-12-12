<?php

namespace App\Listeners;

use App\Events\CourseDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;

class DeleteProductForDeletedCourse
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CourseDeleted $event): void
    {
        $course = $event->course;
        $product = Product::where('course_id', $course->id)->first();

        if ($product->count() > 0) {
            $product->delete();
        }
    }
}
