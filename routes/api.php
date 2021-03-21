<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Governorates
    Route::apiResource('governorates', 'GovernoratesApiController');

    // Departements
    Route::apiResource('departements', 'DepartementsApiController');

    // Visitors
    Route::apiResource('visitors', 'VisitorsApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');
});
