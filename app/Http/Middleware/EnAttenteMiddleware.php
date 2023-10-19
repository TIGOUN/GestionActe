<?php

namespace App\Http\Middleware;

use App\Models\Demande;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnAttenteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $enattente = Demande::where('statut_reponse','En attente')->count(); 
        session(['enattente' => $enattente]);
        return $next($request);
    }
}