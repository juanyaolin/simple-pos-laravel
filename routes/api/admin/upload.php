<?php

use App\Http\Controllers\Api\Admin\UploadController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
    ->post('/upload', [UploadController::class, 'upload'])
    ->name('admin.upload');
