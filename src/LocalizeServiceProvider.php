<?php

namespace DeveoDK\Core\Localize;

use Illuminate\Support\ServiceProvider;

class LocalizeServiceProvider extends ServiceProvider
{
    /**
     * Service provider boot method
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/localize.php' => config_path('core/localize.php'),
        ]);
    }

    /**
     * Service provider register method
     */
    public function register()
    {
        require_once(__DIR__ . '/Helpers/TimezoneHelper.php');
    }
}
