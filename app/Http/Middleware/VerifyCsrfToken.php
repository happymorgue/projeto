<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/regular/dono/2/registarObjetoPerdido',
        '/regular/dono/2/atualizarObjetoPerdido/4',
        '/regular/dono/2/removerObjetoPerdido/6',
        '/nUtilizador',
        '/nUtilizador/1'
        
        //
    ];
}
