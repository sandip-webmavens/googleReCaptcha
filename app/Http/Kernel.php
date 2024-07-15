<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $middleware = [
        // Other middleware entries...

        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,

        // Add your middleware here:
        \Salahhusa9\GeetestCaptcha\Http\Middleware\ValidateGeetestCaptcha::class,
    ];

    // ...
}
