<?php

use Illuminate\Support\Facades\Route;

foreach (['admin', 'member', 'guest'] as $scope) {
    Route::prefix($scope)->group(base_path("routes/api/{$scope}/index.php"));
}
