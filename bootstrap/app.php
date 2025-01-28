<?php

use App\Http\Middleware\CustomGuestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authentication' => \App\Http\Middleware\CustomAuthMiddleware::class,
            'guest_authentication' => \App\Http\Middleware\CustomGuestMiddleware::class,
            'revalidate_back' => \App\Http\Middleware\RevalidateBackHistory::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
