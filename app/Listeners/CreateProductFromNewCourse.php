<?php

namespace App\Listeners;

use App\Events\CourseCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Product;
use Illuminate\Support\Str;

class CreateProductFromNewCourse
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
    public function handle(CourseCreated $event): void
    {
        $course = $event->course;

        Product::create([
            'id'        => Str::uuid(),
            'course_id' => $course->id
        ]);
    }
}
