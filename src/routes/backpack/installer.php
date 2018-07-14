

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
    'as' => 'installer.welcome',
    'uses' => 'InstallController@index'
  ]);

  Route::get('requirements', [
    'as' => 'installer.requirements',
    'uses' => 'InstallController@requirements'
  ]);

  Route::get('permissions', [
    'as' => 'installer.permissions',
    'uses' => 'InstallController@permissions'
  ]);

  Route::get('settings', [
    'as' => 'installer.settings',
    'uses' => 'InstallController@settings'
  ]);

  Route::post('settings', [
    'as' => 'installer.install',
    'uses' => 'InstallController@saveSettings'
  ]);

  Route::post('perform', [
    'as' => 'installer.perform',
    'uses' => 'InstallController@perform'
  ]);

});
