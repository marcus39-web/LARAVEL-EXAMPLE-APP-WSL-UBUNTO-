<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ReportService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ReportService::class, function ($app) {
            return new ReportService();
        });

        // Registrierung des MailService
        $this->app->bind(\App\Services\MailServiceInterface::class, \App\Services\MailService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
