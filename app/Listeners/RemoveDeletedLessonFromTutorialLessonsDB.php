<?php

namespace App\Listeners;

use App\Events\LessonDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\TutorialLesson;

class RemoveDeletedLessonFromTutorialLessonsDB
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
    public function handle(LessonDeleted $event): void
    {
        $lesson = $event->lesson;
        $lessons = TutorialLesson::where('lesson_uniqid', $lesson->uniqid)
            ->get();

        if ($lessons->count() > 0) {
            foreach ($lessons as $lesson) {
                $lesson->delete();
            }
        }
    }
}
