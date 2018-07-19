<?php
namespace AbbyJanke\BackpackInstaller\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CommandController extends Controller
{

   /**
    * Install backpack and laracasts generators
    *
    * @return response
    **/
    public function generators()
    {
        $laracasts = false;
        $response = $this->executeProcess('composer require backpack/generators --dev');

        // if backpack generators were installed proceed with laracasts generators
        if ($response) {
            $laracasts = $this->executeProcess('composer require laracasts/generators:dev-master --dev');
        }

        // if laracasts generators were installed return true
        if ($laracasts) {
            return $this->returnTrue();
        }

        // guess the install failed, lets tell the user that.
        return $this->returnFalse();
    }

    /**
     * Publish necessary assets for backpack
     *
     * @return response
     **/
    public function assets()
    {
        $response = $this->executeProcess('php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag=minimum');

        if ($response) {
            return $this->returnTrue();
        }

        return $this->returnFalse();
    }

    /**
     * Publish assets for Prologue\Alerts
     *
     * @return response
     **/
    public function alerts()
    {
        $response = $this->executeProcess('php artisan vendor:publish --provider="Prologue\Alerts\AlertsServiceProvider"');

        if ($response) {
            return $this->returnTrue();
        }

        return $this->returnFalse();
    }

    /**
     * Run the necessary migrations
     *
     * @return response
     **/
    public function migrations()
    {
        $response = $this->executeProcess('php artisan migrate');

        if ($response) {
            return $this->returnTrue();
        }

        return $this->returnFalse();
    }

    /**
     * Run the necessary migrations
     *
     * @return response
     **/
    public function crud_install()
    {
        $response = $this->executeProcess('composer require backpack/crud');

        if ($response) {
            return $this->returnTrue();
        }

        return $this->returnFalse();
    }

    /**
     * Run the necessary migrations
     *
     * @return response
     **/
    public function crud_assets()
    {
        $lang = false;
        $config = false;
        $response = $this->executeProcess('php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="public"');

        if ($response) {
          $lang = $this->executeProcess('php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="lang"');
        }

        if ($lang) {
          $config = $this->executeProcess('php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="config"');
        }

        if($lang) {
          return $this->returnTrue();
        }

        return $this->returnFalse();
    }

    /**
     * Run a SSH command.
     *
     * @param string $command      The SSH command that needs to be run
     *
     * @return bool
     */
    public function executeProcess($command)
    {
        $process = new Process($command, null, null, null, 300, null);
        $process->setWorkingDirectory(base_path());
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                return false;
            }
        });

        if ($process->isSuccessful()) {
            return true;
        }

        return false;
    }

    /**
     * Nicely return TRUE as json
     **/
    private function returnTrue()
    {
        return response()->json(true);
    }

    /**
     * Nicely return FALSE as json
     **/
    private function returnFalse()
    {
        return response()->json(false);
    }
}
