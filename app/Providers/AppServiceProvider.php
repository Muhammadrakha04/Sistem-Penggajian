<?php

namespace App\Providers;

use App\Http\Controllers\Auth\PanelLogoutController;
use Filament\Auth\Http\Controllers\LogoutController;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LogoutController::class, PanelLogoutController::class);
    }

    public function boot(): void
    {
        //
    }
}