<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
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
     //   echo $request->segment(0);
     //  dd($request->segments());

      //  dd(app()->getLocale());

        if (!empty($request->segments()) && in_array($request->segments()[0],['kz','ru','en'])){
            app()->setLocale($request->segments()[0]);
            session()->put('locale', $request->segments()[0]);
        }
        elseif (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }else{
            App::setLocale('kz');
            session()->put('locale', 'kz');
        }


        return $next($request);
    }
}
