<?php
namespace AbbyJanke\BackpackInstaller\app\Http\Controllers;

use Illuminate\Routing\Controller;
use AbbyJanke\BackpackInstaller\Helpers\Requirements;
use AbbyJanke\BackpackInstaller\Helpers\Permissions;

class InstallController extends Controller
{

  private $steps;
  private $requirements;
  private $permissions;

  public function __construct(Requirements $requirements, Permissions $permissions) {
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

    $data['permissions'] = $this->permissions->check(config('backpack.installer.permissions'));

    return view('installer::settings', $data);
  }

}
