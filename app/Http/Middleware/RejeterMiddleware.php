<?php

namespace App\Http\Middleware;

use App\Models\Demande;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RejeterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rejeter = Demande::where('statut_reponse','Rejeter')->count(); 

        session(['rejeter' => $rejeter]);

        return $next($request);
    }
}