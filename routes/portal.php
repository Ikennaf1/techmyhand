<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Portal\Layout;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', Layout::class)->name('portal');

});