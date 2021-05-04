<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Ini harusnya bukan gini, Hati2
        // Buat view lagi, bahwa dengan kata2 "anda tidak berhak akses ini"
        if (!$request->expectsJson()) {
            return route('login.admin');
        }
    }
}
