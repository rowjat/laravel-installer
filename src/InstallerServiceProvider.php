<?php

namespace Rowjat\Installer;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Rowjat\Installer\Http\Middleware\CanInstall;

class InstallerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = false;
    public static function basePath(string $path): string
    {
        return __DIR__.$path;
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->publishFiles();

        include __DIR__ . '/routes.php';
    }

    /**
     * Bootstrap the application events.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router): void
    {
        $router->middlewareGroup('install', [CanInstall::class]);

    }

    /**
     * Publish config file for the installer.
     *
     * @return void
     */
    protected function publishFiles(): void
    {
        $this->publishes([
            __DIR__.'/config/installer.php' => base_path('config/installer.php'),
        ],'config');

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/installer'),
        ], 'public');


        $this->loadViewsFrom(__DIR__.'/resources/views', 'installer');
        $this->loadTranslationsFrom(__DIR__.'/lang', 'installer');
    }
}
