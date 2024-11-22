<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Portal\Home;
use App\Livewire\Portal\ManageUsers;
use App\Livewire\Portal\ManageCourses;
use App\Livewire\Portal\Lessons;
use App\Livewire\Portal\NewLesson;
use App\Livewire\Portal\EditLesson;
use App\Livewire\Portal\NewTutorial;

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

    Route::get('/tutorials/new', NewTutorial::class)->name('portal.tutorials.new');

});