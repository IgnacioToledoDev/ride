<?php

use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/subscription/payment', [PayPalController::class, 'subscription'])->name('subscription.payment');
});
