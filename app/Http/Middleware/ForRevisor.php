<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ForRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->is_revisor){
                //controllo che esiste uj utente e che sia revisore per mostrare le pagine per i revisori
            return $next($request);
        }
        return redirect('/')->with('access.denied' , 'solo i revisori possono accedere a questa pagina');  //messaggio di errore per i non revisori della pagina web
    }
}
