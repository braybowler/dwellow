<?php

use App\Http\Controllers\WaitlistedUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
})->name('landing');

Route::resource('waitlist', WaitlistedUserController::class)->only('store');

require __DIR__.'/settings.php';
