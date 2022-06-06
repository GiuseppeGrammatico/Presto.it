<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
    public function handle(Request $request, Closure $next)
    {
       
        $local = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        App::setLocale($local);

        if($local != session('locale')){
            $locale = session('locale', $local);
            App::setLocale($locale);
        }


        // dd(substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2));
        // $locale = Session::get('locale', Config::get('app.locale'));

        return $next($request)->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0');
    }

}
