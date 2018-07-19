

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

  Route::get('perform', [
    'as' => 'installer.perform',
    'uses' => 'InstallController@performInstall'
  ]);

  Route::get('user', [
    'as' => 'installer.create_user',
    'uses' => 'InstallController@createUser'
  ]);

  Route::post('user', [
    'as' => 'installer.create_user',
    'uses' => 'InstallController@saveUser'
  ]);

});

Route::group([
    'prefix'     => 'steps',
], function () {
  $controller = config('backpack.installer.command_controller').'@';

  // create the route for each step from the config
  foreach(config('backpack.installer.steps') as $name => $step) {
    Route::post($name, [
      'as' => 'installer.steps.'.$name,
      'uses' => $controller.$name
    ]);
  }

});
