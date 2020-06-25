<?php


namespace CampaigningBureau\CambuildrValidation;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CambuildrValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/cambuildr-validation.php' => config_path('cambuildr-validation.php'),
            ], 'config');

        }

        $this->registerRoutes();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cambuildr-validation.php', 'cambuildr-validation');
    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function ()
        {
            $this->loadRoutesFrom(__DIR__ . '../../routes/api.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            'prefix'     => config('cambuildr-validation.routes.prefix'),
            'middleware' => config('cambuildr-validation.routes.middleware'),
        ];
    }
}