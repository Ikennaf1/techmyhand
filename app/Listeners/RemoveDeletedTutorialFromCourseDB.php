<?php

namespace App\Listeners;

use App\Events\TutorialDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\CourseTutorial;

class RemoveDeletedTutorialFromCourseDB
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
    public function handle(TutorialDeleted $event): void
    {
        $tutorial = $event->tutorial;
        $tutorials = CourseTutorial::where('tutorial_uniqid', $tutorial->uniqid)
            ->get();

        if ($tutorials->count() > 0) {
            foreach ($tutorials as $tutorial) {
                $tutorial->delete();
            }
        }
    }
}
