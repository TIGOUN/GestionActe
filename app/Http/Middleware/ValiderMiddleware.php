<?php

namespace App\Http\Middleware;

use App\Models\Demande;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValiderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $valider = Demande::where('statut_reponse','Valider')->count(); 
        session(['valider' => $valider]);

        return $next($request);
    }
}