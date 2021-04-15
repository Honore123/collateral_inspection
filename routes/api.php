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

//preset data of app property dropdowns api
Route::get('/foundations',[PropertyController::class, 'foundation']);
Route::get('/elevations',[PropertyController::class, 'elevation']);
Route::get('/roofs',[PropertyController::class, 'roof']);

//Location api for province, district and other
Route::get('/province',[EarthController::class,'province']);
Route::get('/district/{province}',[EarthController::class,'district']);
Route::get('/sector/{district}',[EarthController::class,'sector']);
Route::get('/cell/{sector}',[EarthController::class,'cell']);
Route::get('/village/{cell}',[EarthController::class,'village']);

// api for creating report pdf file and downloading it.
Route::get('/createPdf/{inspection}',[EarthController::class,'createPdf']);

//preset data of app property dropdowns api
Route::get('/tenures',[EarthController::class, 'tenure']);

// Inspections
Route::get('/inspections', [EarthController::class, 'indexApi']);
Route::post('/inspections',[EarthController::class, 'storeApi']);
Route::put('/inspections/{earth}', [EarthController::class, 'updateStatusApi']);


// Property
Route::get('/property/{id}', [PropertyController::class, 'indexApi']);
Route::post('/property/{id}', [PropertyController::class, 'storeApi']);
