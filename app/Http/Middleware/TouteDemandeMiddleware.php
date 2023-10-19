<?php

namespace App\Http\Middleware;

use App\Models\Demande;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TouteDemandeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $toute_demande = Demande::all()->count(); 

        session(['toute_demande' => $toute_demande]);
        return $next($request);
    }
}