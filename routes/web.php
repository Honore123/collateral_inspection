<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::resource('users', 'UsersController');

    // Earth

    Route::get('earths/reviewAll/{id}', 'EarthController@reviewAll')->name('earths.reviewAll');

    Route::put('earths/reviewAll/{id}', 'EarthController@update')->name('earths.update');

    Route::put('earths/reject/{earth}', 'EarthController@reject')->name('earths.reject');

    Route::put('earths/modify/{earth}', 'EarthController@modify')->name('earths.modify');

    Route::get('earths/editor/{earth}', 'EarthController@edit')->name('earths.edit');

    Route::put('earths/editor/{earth}', 'EarthController@editor')->name('earths.editor');

    Route::get('earths/reports', 'EarthController@reports')->name('earths.reports');

    Route::resource('earths', 'EarthController');

    // Property
    Route::resource('properties', 'PropertyController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});