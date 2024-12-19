<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Portal\Home;
use App\Livewire\Portal\ManageUsers;
use App\Livewire\Portal\ManageCourses;

use App\Livewire\Portal\Lessons;
use App\Livewire\Portal\NewLesson;
use App\Livewire\Portal\EditLesson;

use App\Livewire\Portal\Tutorials;
use App\Livewire\Portal\NewTutorial;
use App\Livewire\Portal\EditTutorial;
use App\Http\Controllers\TutorialLessonController;

use App\Livewire\Portal\Courses;
use App\Livewire\Portal\NewCourse;
use App\Livewire\Portal\EditCourse;
use App\Http\Controllers\CourseTutorialController;

use App\Livewire\Portal\Roles;
use App\Livewire\Portal\EditRole;
use App\Livewire\Portal\EditUserRole;

use App\Livewire\Portal\Wallets;

use App\Livewire\Portal\Products;

use App\Livewire\Portal\Cohorts;
use App\Livewire\Portal\NewCohort;
use App\Livewire\Portal\EditCohort;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', Home::class)->name('portal.home');
    Route::get('/manage-users', ManageUsers::class)->name('portal.manage-users');
    Route::get('/manage-courses', ManageCourses::class)->name('portal.manage-courses');

    Route::get('/lessons', Lessons::class)->name('portal.lessons');
    Route::get('/lessons/new', NewLesson::class)->name('portal.lessons.new');
    Route::get('/lessons/edit/{lesson}', EditLesson::class)->name('portal.lessons.edit');

    Route::get('/tutorials', Tutorials::class)->name('portal.tutorials');
    Route::get('/tutorials/new', NewTutorial::class)->name('portal.tutorials.new');
    Route::get('/tutorials/edit/{tutorial}', EditTutorial::class)->name('portal.tutorials.edit');
    Route::post('/tutorials/edit/addTutorialLesson/{tutorial}', [TutorialLessonController::class, 'store'])
        ->name('portal.tutorials.addTutorialLesson');

    Route::get('/courses', Courses::class)->name('portal.courses');
    Route::get('/courses/new', NewCourse::class)->name('portal.courses.new');
    Route::get('/courses/edit/{course}', EditCourse::class)->name('portal.courses.edit');
    Route::post('/courses/edit/addCourseTutorial/{course}', [CourseTutorialController::class, 'store'])
        ->name('portal.courses.addCourseTutorial');

    Route::get('/roles', Roles::class)->name('portal.roles');
    Route::get('/roles/edit/{role}', EditRole::class)->name('portal.roles.edit');
    Route::get('/roles/edit-user/{user}', EditUserRole::class)->name('portal.roles.edit-user-role');

    Route::get('/wallets', Wallets::class)->name('portal.wallets');

    Route::get('/products', Products::class)->name('portal.products');

    Route::get('/cohorts', Cohorts::class)->name('portal.cohorts');
    Route::get('/cohorts/new/{course}', NewCohort::class)->name('portal.cohorts.new');
    Route::get('/cohorts/edit/{cohort}', EditCohort::class)->name('portal.cohorts.edit');
});
