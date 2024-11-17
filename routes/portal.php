<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Portal\Home;
use App\Livewire\Portal\ManageUsers;
use App\Livewire\Portal\ManageCourses;
use App\Livewire\Portal\NewLesson;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', Home::class)->name('portal.home');
    Route::get('/manage-users', ManageUsers::class)->name('portal.manage-users');
    Route::get('/manage-courses', ManageCourses::class)->name('portal.manage-courses');

    Route::get('/lessons/new', NewLesson::class)->name('portal.lessons.new');
    Route::get('/lessons/edit/{lesson}', NewLesson::class)->name('portal.lessons.edit');

});