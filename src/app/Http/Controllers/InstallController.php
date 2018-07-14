<?php
namespace AbbyJanke\BackpackInstaller\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use AbbyJanke\BackpackInstaller\Helpers\Requirements;
use AbbyJanke\BackpackInstaller\Helpers\Permissions;
use AbbyJanke\BackpackInstaller\Helpers\Settings;

class InstallController extends Controller
{

  private $steps;
  private $requirements;
  private $permissions;
  private $settings;

  public function __construct(Requirements $requirements, Permissions $permissions, Settings $settings) {
    $this->steps = [
      'fa-home' => 0, // welcome
      'fa-clipboard-list' => 0, // requirements
      'fa-key' => 0, // permissions
      'fa-cog' => 0, // settings
      'fa-user' => 0, // first user
      'fa-check' => 0, // complete
    ];

    $this->requirements = $requirements;
    $this->permissions = $permissions;
    $this->settings = $settings;
  }

  public function index() {
    $data['title'] = trans('installer::installer.welcome');
    $data['steps'] = $this->steps;
    $data['active'] = 'fa-home';

    return view('installer::welcome', $data);
  }

  public function requirements() {
    $data['title'] = trans('installer::installer.check_requirements');
    $data['steps'] = $this->steps;
    $data['active'] = 'fa-clipboard-list';

    $data['phpVersion'] = $this->requirements->checkPHPversion(config('backpack.installer.phpVersion'));
    $data['requirements'] = $this->requirements->check(config('backpack.installer.requirements'));


    return view('installer::requirements', $data);
  }

  public function permissions() {
    $data['title'] = trans('installer::installer.permissions');
    $data['steps'] = $this->steps;
    $data['active'] = 'fa-key';

    $data['permissions'] = $this->permissions->check(config('backpack.installer.permissions'));

    return view('installer::permissions', $data);
  }

  public function settings() {
    $data['title'] = trans('installer::installer.settings');
    $data['steps'] = $this->steps;
    $data['active'] = 'fa-cog';

    return view('installer::settings', $data);
  }

  public function saveSettings(Request $request) {
    $rules = config('backpack.installer.rules');
    $messages = [
      'backpack_license.required_unless' => trans('installer::installer.backpack_license_required'),
      'pusher_app_id.required_if' => trans('installer::installer.pusher_required'),
      'pusher_app_key.required_if' => trans('installer::installer.pusher_required'),
      'pusher_app_secret.required_if' => trans('installer::installer.pusher_required'),
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    // check if validation passed, if not redirect back with errors.
    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator->errors());
    }

    // check to make sure we are able to connect to the database.
    if (!$this->settings->checkDBConnection($request)) {
      return redirect()->back()->withInput()->withErrors([
        'database_connection' => trans('installer::installer.db_connection_failed'),
      ]);
    }
  }

}
