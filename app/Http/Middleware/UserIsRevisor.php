<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Controlla se l'utente è loggato e se ha il ruolo di revisore.
        if (Auth::check() && Auth::user()->is_revisor) {
            // Se le condizioni sono vere, permette alla richiesta di continuare.
            return $next($request);
        }

        // Altrimenti, reindirizza alla homepage con un messaggio di errore.
        return redirect(route('homepage'))->with('alert', 'Accesso non autorizzato. Area riservata ai revisori.');
    }
}
