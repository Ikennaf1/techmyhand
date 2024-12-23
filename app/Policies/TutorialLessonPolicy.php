<?php

namespace App\Policies;

use App\Models\TutorialLesson;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TutorialLessonPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TutorialLesson $tutorialLesson): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->roles !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TutorialLesson $tutorialLesson): bool
    {
        return $user->id === $tutorialLesson->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TutorialLesson $tutorialLesson): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TutorialLesson $tutorialLesson): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TutorialLesson $tutorialLesson): bool
    {
        //
    }
}
