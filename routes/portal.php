<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Portal\Home;
use App\Livewire\Portal\ManageUsers;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', Home::class)->name('portal.home');
    Route::get('/manage-users', ManageUsers::class)->name('portal.manage-users');

});