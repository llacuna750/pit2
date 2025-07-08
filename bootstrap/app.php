<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// return Application::configure(basePath: dirname(__DIR__))
//     ->withRouting(
//         web: __DIR__.'/../routes/web.php',
//         commands: __DIR__.'/../routes/console.php',
//         health: '/up',
//     )
//     ->withMiddleware(function (Middleware $middleware): void {
//         'role' => \App\Http\Middleware\RoleMiddleware::class, // Dire rata taman sa
//     })
//     ->withExceptions(function (Exceptions $exceptions): void {
//         //
//     })->create();


// use Illuminate\Foundation\Application;
// use Illuminate\Foundation\Configuration\Exceptions;
// use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register your role middleware alias here
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
