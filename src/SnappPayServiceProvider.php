<?php

namespace BackendProgramer\SnappPay;

use Illuminate\Support\ServiceProvider;

class SnappPayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $configPath = __DIR__ . '/../config/snapp-pay.php';
        $targetPath = function_exists('config_path')
            ? config_path('snapp-pay.php')
            : $this->app->basePath('config/snapp-pay.php');

        $this->publishes([
            $configPath => $targetPath,
        ], 'snapp-pay-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/snapp-pay.php',
            'snapp-pay'
        );
    }
}
