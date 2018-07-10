

<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin').'/install',
    'middleware' => ['web'],
    'namespace'  => 'AbbyJanke\BackpackInstaller\app\Http\Controllers',
], function () {

  Route::get('/', [
    'as' => 'welcome',
    'uses' => 'InstallController@index'
  ]);

  Route::get('requirements', [
    'as' => 'requirements',
    'uses' => 'InstallController@requirements'
  ]);

});
