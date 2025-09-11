<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\PasswordUpdateResponse as PasswordUpdateResponseContract;
use Laravel\Fortify\Fortify;

class PasswordUpdateResponse implements PasswordUpdateResponseContract
{
    public function toResponse($request)
    {
        return $request->wantsJson()
        ? new JsonResponse('', 200)
        : redirect()->route('user-profile.edit')->with('status', Fortify::PASSWORD_UPDATED);
    }
}
