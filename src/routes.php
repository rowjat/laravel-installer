<?php

use Illuminate\Support\Facades\Route;
use Rowjat\Installer\Http\Controllers\DatabaseController;
use Rowjat\Installer\Http\Controllers\EnvironmentController;
use Rowjat\Installer\Http\Controllers\FinalController;
use Rowjat\Installer\Http\Controllers\PermissionsController;
use Rowjat\Installer\Http\Controllers\RequirementsController;
use Rowjat\Installer\Http\Controllers\WelcomeController;

/**
 * Installer routes group.
 *
 * All routes are prefixed with 'install', use the 'Installer::' route name prefix,
 * and are protected by the 'web' and 'install' middleware.
 *
 * Routes:
 * - GET  /install/                  -> WelcomeController@welcome
 * - GET  /install/environment       -> EnvironmentController@environment
 * - POST /install/environment/store -> EnvironmentController@store
 * - GET  /install/requirements      -> RequirementsController@requirements
 * - GET  /install/permissions       -> PermissionsController@permissions
 * - GET  /install/database          -> DatabaseController@database
 * - GET  /install/final             -> FinalController@finish
 */
Route::group(['prefix' => 'install', 'as' => 'Installer::', 'middleware' => ['web', 'install']], function () {
    Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
    Route::get('environment', [EnvironmentController::class, 'environment'])->name('environment');
    Route::post('environment/store', [EnvironmentController::class, 'store'])->name('environment.store');
    Route::get('requirements', [RequirementsController::class, 'requirements'])->name('requirements');
    Route::get('permissions', [PermissionsController::class, 'permissions'])->name('permissions');
    Route::get('database', [DatabaseController::class, 'database'])->name('database');
    Route::get('final', [FinalController::class, 'finish'])->name('final');
});
