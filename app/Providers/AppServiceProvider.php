<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            // 'user' => 'App\Models\User',
            // 'post' => 'App\Models\Post',
            // 'lesson' => 'App\Models\Lesson',
            // 'tutorial' => 'App\Models\Tutorial',
            // 'tutorialLesson' => 'App\Models\TutorialLesson',
            // 'course' => 'App\Models\Course',
            // 'courseTutorial' => 'App\Models\CourseTutorial',
            // 'role' => 'App\Models\Role',
            // 'userRole' => 'App\Models\UserRole',
            // 'wallet' => 'App\Models\Wallet',
            // 'cohort' => 'App\Models\Cohort',
            // 'payment' => 'App\Models\Payment',
            // 'product' => 'App\Models\Product',
        ]);
    }
}
