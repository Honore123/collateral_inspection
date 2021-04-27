<?php
use App\Http\Controllers\Admin\EarthController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UsersController;

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Inspections
    Route::get('/inspections/{userId}', [EarthController::class, 'indexApi']);
    Route::post('/inspections',[EarthController::class, 'storeApi']);
    Route::put('/inspections/{earth}', [EarthController::class, 'updateStatusApi']);
    Route::put('/inspections/modify/{earth}', [EarthController::class, 'updateApi']);

    //User account
    Route::post('users/logout', [AuthController::class, 'logout']);
    Route::put('users/change_account/{user}', [UsersController::class,'updateApi']);


});
//preset data of app property dropdowns api
Route::get('/buildingType',[PropertyController::class,'buildingType']);
Route::get('/foundations',[PropertyController::class, 'foundation']);
Route::get('/elevations',[PropertyController::class, 'elevation']);
Route::get('/roofs',[PropertyController::class, 'roof']);
Route::get('/pavements',[PropertyController::class, 'pavement']);
Route::get('/ceilings',[PropertyController::class, 'ceiling']);
Route::get('/closers',[PropertyController::class, 'closer']);

//Location api for province, district and other
Route::get('/province',[EarthController::class,'province']);
Route::get('/district/{province}',[EarthController::class,'district']);
Route::get('/sector/{district}',[EarthController::class,'sector']);
Route::get('/cell/{sector}',[EarthController::class,'cell']);
Route::get('/village/{cell}',[EarthController::class,'village']);

//preset data of app property dropdowns api
Route::get('/tenures',[EarthController::class, 'tenure']);
Route::get('/propertyType',[EarthController::class, 'propertyType']);


// Property
Route::get('/property/{id}', [PropertyController::class, 'indexApi']);
Route::post('/property/{id}', [PropertyController::class, 'storeApi']);



//Public Routes
//Authentication APIs
Route::post('users/login', [AuthController::class, 'login']);


