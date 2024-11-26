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
use App\Livewire\Portal\NewCourse;
use App\Livewire\Portal\EditCourse;

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

    Route::get('/courses/new', NewCourse::class)->name('portal.courses.new');
    Route::get('/courses/edit/{course}', EditCourse::class)->name('portal.courses.edit');
});