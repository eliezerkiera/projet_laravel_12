<?php

namespace App\Http\Controllers;

use App\Traits\PageViewData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
      use PageViewData;


    public function profileEdit()
    {

        return view('profile.edit-profile',['user'=>Auth::user()])->with('pageData',$this->getPageData());
    }

    public function passwordEdit()
    {
        return view('profile.edit-password')->with('pageData',$this->getPageData());
    }

    public function userDeleteRequest(Request $request)
    {
        return view ('profile.delete-request')->with('pageData',$this->getPageData());
    }

    public function userDelete(Request $request)
    {

        $user = $request->user();

        $validated = $request->validate([
            'password' => ['required'],
        ]);

        if (!Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['password' => __('The password is incorrect.')]);
        }

        Auth::logout();

        $user->delete();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'account-deleted');


    }



    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => ['required'],
            'password' => ['required','confirmed','min:8'],
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => __('The current password is incorrect.')]);
        }

        $user->password = Hash::make($validated['password']);
        $user->save();

        return back()->with('status', 'password-updated');
    }


    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name'  => ['required','string','max:255'],
            'email'      => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'country_id' => ['required','exists:countries,id'],
        ]);

        $emailChanged = $validated['email'] !== $user->email;

        $user->update($validated);

        if ($emailChanged) {
            $user->email_verified_at = null;
            $user->save();
            $user->sendEmailVerificationNotification();
        }

        return back()->with('status', $emailChanged ? 'verification-link-sent' : 'profile-updated');
    }
}
