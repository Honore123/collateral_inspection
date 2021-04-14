<?php
use App\Http\Controllers\Admin\EarthController;
use App\Http\Controllers\Admin\PropertyController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');


});


// Inspections
Route::get('/inspections', [EarthController::class, 'indexApi']);
Route::post('/inspections',[EarthController::class, 'storeApi']);
Route::put('/inspections/{earth}', [EarthController::class, 'updateStatusApi']);
// Property
Route::get('/property/{id}', [PropertyController::class, 'indexApi']);
Route::post('/property/{id}', [PropertyController::class, 'storeApi']);
