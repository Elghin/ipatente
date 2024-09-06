<?php

namespace Vendor\IPatente;

use Illuminate\Support\ServiceProvider;
use Vendor\MyCrmPackage\Models\IPatente;
use Vendor\MyCrmPackage\Policies\GestioneFormPolicy;
use Filament\Resources\Resource;

class IPatentePackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('i-patente', function() {
            return new IPatente();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'iPatente');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->registerPolicies();

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Resource::register([
            \Vendor\IPatente\Resources\IPatenteResource::class,
        ]);
    }

    protected function registerPolicies()
    {
        Gate::policy(IPatente::class, GestioneFormPolicy::class);
    }
}
