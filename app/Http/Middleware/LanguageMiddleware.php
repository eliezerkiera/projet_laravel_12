<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $browser_lang=substr(request()->server(('HTTP_ACCEPT_LANGUAGE')), 0, 2);

        $user_lang=null;
        if(Auth::check())
        {
            if(!is_null(Auth::user()->language))
            {
                $user_lang=Auth::user()->language->code;
            }


        }

        $lang_list=Language::pluck('code')->toArray();



        if(!is_null($user_lang) && in_array($user_lang, $lang_list))
        {
            App::setLocale($user_lang);
        }

        elseif(Session::has('language') && in_array(Session::get('language'),$lang_list))
        {

                App::setLocale(Session::get('language'));



        }
        elseif(in_array($browser_lang,$lang_list))
        {
            App::setLocale($browser_lang);
        }

        else
        {
            Session::put('language',Language::DEFAULT_LANGUAGE);
            App::setLocale(Language::DEFAULT_LANGUAGE);
        }

        return $next($request);
    }
}
