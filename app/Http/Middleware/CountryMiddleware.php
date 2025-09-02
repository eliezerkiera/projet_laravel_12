<?php

namespace App\Http\Middleware;

use App\Models\Country;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_country=null;
        if(Auth::check())
        {

            if(!is_null(Auth::user()->country))
            {
                $user_country=Auth::user()->country->code;

            }

        }

        $country_list=Country::pluck('code')->toArray();

        if(!is_null($user_country) && in_array($user_country, $country_list))
        {
             Session::put('country',$user_country);
        }
        elseif(Session::has('country') && in_array(Session::get('country'), $country_list))
        {
             Session::get('country');
        }
        else
        {
             Session::put('country',Country::DEFAULT_COUNTRY);
        }

       return $next($request);
    }
}
