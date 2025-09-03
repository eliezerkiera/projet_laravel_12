<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Fortify;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if($request->wantsJson())
        {
            return new JsonResponse('',201);
        }
        else
        {
            if(Session::get('status')=='user-created')
            {
                return redirect()->route('home')->with('status','user-created');
            }

        }
        return  redirect()->intended(Fortify::redirects('register'));
    }
}
