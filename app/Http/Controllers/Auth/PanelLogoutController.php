<?php

namespace App\Http\Controllers\Auth;

use Filament\Auth\Http\Responses\Contracts\LogoutResponse;
use Filament\Facades\Filament;

class PanelLogoutController
{
    public function __invoke(): LogoutResponse
    {
        Filament::auth()->logout();

        request()->session()->regenerate();

        return app(LogoutResponse::class);
    }
}