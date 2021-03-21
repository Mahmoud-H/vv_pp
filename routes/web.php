<?php
     Route::get('visitors/visitorsapi/{ident}', 'apicontroller@visitorsapi');

//Route::redirect('/', '/login');
Route::redirect('/', '/visitorsrecord/public/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 Auth::routes(['register' => false]);
 
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
//Route::group([  'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
 Route::get('visitors/visitors-search', 'VisitorsController@search');
         Route::get('visitors/ss', 'apicontroller@sss');
 Route::get('visitors/visitors-exist', 'VisitorsController@exist');
     Route::get('visitors/visrsapi/{ident}', 'apicontroller@visrsapi');
    
     Route::post('visitors/visitorsapi', 'apicontroller@visitorsapi');
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Governorates
    Route::delete('governorates/destroy', 'GovernoratesController@massDestroy')->name('governorates.massDestroy');
    Route::resource('governorates', 'GovernoratesController');

    // Departements
    Route::delete('departements/destroy', 'DepartementsController@massDestroy')->name('departements.massDestroy');
    Route::resource('departements', 'DepartementsController');

    // Visitors
    Route::delete('visitors/destroy', 'VisitorsController@massDestroy')->name('visitors.massDestroy');
    Route::resource('visitors', 'VisitorsController');
     Route::post('visitors/visitors-search', 'VisitorsController@search');
     //Route::get('visitors/visitors-exist', 'VisitorsController@exist');
    Route::resource('visitorsleav', 'VisitorsleavController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');
    
    
        // Deposit Types
    Route::delete('deposit-types/destroy', 'DepositTypeController@massDestroy')->name('deposit-types.massDestroy');
    Route::resource('deposit-types', 'DepositTypeController');

    // Offices
    Route::delete('offices/destroy', 'OfficesController@massDestroy')->name('offices.massDestroy');
    Route::resource('offices', 'OfficesController');

    

    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
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
