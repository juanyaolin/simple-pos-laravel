<?php

use Illuminate\Support\Facades\Route;

foreach (['admin', 'member', 'guest', 'global'] as $prefix) {
    $path = implode(DIRECTORY_SEPARATOR, [__DIR__, 'api', $prefix, '*.php']);

    foreach (glob($path) as $file) {
        Route::prefix($prefix)->group($file);
    }
}
