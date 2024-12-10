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
            // 'course' => 'App\Models\Course',
            // 'role' => 'App\Models\Role',
            // 'wallet' => 'App\Models\Wallet',
        ]);
    }
}
