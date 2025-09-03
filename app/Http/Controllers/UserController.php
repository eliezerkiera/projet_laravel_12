<?php

namespace App\Http\Controllers;

use App\Traits\PageViewData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
      use PageViewData;


    public function profileEdit()
    {

        return view('profile.edit-profile',['user'=>Auth::user()])->with('pageParams',$this->getPageData());
    }

    public function passwordEdit()
    {
        return view('profile.edit-password')->with('pageParams',$this->getPageData());
    }

    public function userDeleteRequest(Request $request)
    {
        return redirect()->route('user.delete');
    }

    public function userDelete(Request $request)
    {

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');

    }
}
