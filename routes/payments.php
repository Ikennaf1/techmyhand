<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])
        ->name('pay');

    Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

});
