<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use Salahhusa9\GeetestCaptcha\Http\Middleware\ValidateGeetestCaptcha;

Route::get('/', [RegistrationController::class, 'form'])->name('registration');
Route::post('/', [RegistrationController::class, 'login'])->name('login')->middleware(ValidateGeetestCaptcha::class);
