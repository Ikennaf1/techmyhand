<?php

namespace App\Policies;

use App\Models\CourseTutorial;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CourseTutorialPolicy
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
    public function view(User $user, CourseTutorial $courseTutorial): bool
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
    public function update(User $user, CourseTutorial $courseTutorial): bool
    {
        return $user->id === $tutorialLesson->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CourseTutorial $courseTutorial): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CourseTutorial $courseTutorial): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CourseTutorial $courseTutorial): bool
    {
        //
    }
}
