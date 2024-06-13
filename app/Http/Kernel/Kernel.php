<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // ...
    ];

    protected $middlewareGroups = [
        'web' => [
            // ...
        ],

        'api' => [
            // ...
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
        // ...
    ];
}
