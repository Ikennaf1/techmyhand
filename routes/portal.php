<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Portal\Home;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', Home::class);

});