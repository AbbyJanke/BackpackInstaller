<?php
namespace AbbyJanke\BackpackInstaller\app\Http\Controllers;

use Illuminate\Routing\Controller;

class InstallController extends Controller
{

  private $steps;

  public function __construct() {
    $this->steps = [
      'fa-home' => 0, // welcome
      'fa-clipboard-list' => 0, // requirements
      'fa-key' => 0, // permissions
      'fa-cog' => 0, // settings
      'fa-user' => 0, // first user
      'fa-check' => 0, // complete
    ];
  }

  public function index() {
    $data['title'] = 'Backpack Installer';
    $data['steps'] = $this->steps;

    return view('installer::welcome', $data);
  }

  public function requirements() {

    $this->steps['fa-home'] = 1;
    
    $data['title'] = 'Checking Requirements';
    $data['steps'] = $this->steps;

    return view('installer::welcome', $data);
  }

}
