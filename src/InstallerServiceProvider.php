<?php

namespace AbbyJanke\BackpackInstaller;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use RachidLaasri\LaravelInstaller\Middleware\canInstall;
use RachidLaasri\LaravelInstaller\Middleware\canUpdate;

class InstallerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Where the route file lives, both inside the package and in the app (if overwritten).
     *
     * @var string
     */
    public $routeFilePath = '/routes/backpack/installer.php';

    /**
     * Bootstrap the application events.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
      // LOAD THE VIEWS
      // - first the published views (in case they have any changes)
      $this->loadViewsFrom(resource_path('views/vendor/backpack/installer'), 'installer');
      // - then the stock views that come with the package, in case a published view might be missing
      $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'installer');

      $this->loadTranslationsFrom(realpath(__DIR__.'/resources/lang'), 'installer');

      // use the vendor configuration file as fallback
      $this->mergeConfigFrom(
        __DIR__.'/config/backpack/installer.php', 'backpack.installer'
      );

      $this->publishFiles();
      $this->setupRoutes($this->app->router);
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        // by default, use the routes file provided in vendor
        $routeFilePathInUse = __DIR__.$this->routeFilePath;

        // but if there's a file with the same name in routes/backpack, use that one
        if (file_exists(base_path().$this->routeFilePath)) {
            $routeFilePathInUse = base_path().$this->routeFilePath;
        }

        $this->loadRoutesFrom($routeFilePathInUse);
    }

    /**
     * Publish config file for the installer.
     *
     * @return void
     */
    protected function publishFiles()
    {

        $configFile = [__DIR__.'/config' => config_path()];
        $viewFiles = [__DIR__.'/resources/views' => resource_path('views/vendor/backpack/base')];
        $publicAssets = [__DIR__.'/public' => public_path('vendor/backpack')];
        $langFiles = [__DIR__.'/resources/lang' => resource_path('lang/vendor/backpack')];

        // establish the minimum amount of files that need to be published, for Backpack to work; there are the files that will be published by the install command
        $minimum = array_merge(
          $publicAssets,
          $configFile,
          $publicAssets,
          $langFiles
        );

        // register all possible publish commands and assign tags to each
        $this->publishes($configFile, 'config');
        $this->publishes($langFiles, 'lang');
        $this->publishes($viewFiles, 'views');
        $this->publishes($publicAssets, 'public');
        $this->publishes($minimum, 'minimum');
    }
}
