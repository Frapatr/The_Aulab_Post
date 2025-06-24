<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Symfony\Component\HttpFoundation\Response;

    class UserIsAdmin
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            // Controlla se l'utente è autenticato e se la sua colonna 'is_admin' è a true.
            if (Auth::check() && Auth::user()->is_admin) {
                // Se entrambe le condizioni sono vere, permette alla richiesta di proseguire.
                return $next($request);
            }

            // Se l'utente non è un admin, lo reindirizza alla homepage con un messaggio di alert.
            return redirect(route('homepage'))->with('alert', 'Accesso non autorizzato.');
        }
    }
