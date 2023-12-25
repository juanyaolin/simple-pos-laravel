<?php

use App\Http\Controllers\Api\Admin\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticationController::class, 'login'])
    ->name('admin.login');

Route::middleware('auth:sanctum')
    ->post('/logout', [AuthenticationController::class, 'logout'])
    ->name('admin.logout');
