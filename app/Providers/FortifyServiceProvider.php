<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Traits\PageViewData;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

use Illuminate\Validation\ValidationException;



use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponstContract;
use App\Http\Responses\RegisterResponse;
//use Laravel\Fortify\Contracts\PasswordUpdateResponse as PasswordUpdateResponseContract;
//use App\Http\Responses\PasswordUpdateResponse;

class FortifyServiceProvider extends ServiceProvider
{
    use PageViewData;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        Fortify::loginView(function () {
            return view('auth.login')->with('pageData',$this->getPageData());
        });

        Fortify::registerView(function () {
            return view('auth.register',['countrySelect'=>$this->getCountrySelect()])->with('pageData',$this->getPageData());
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password')->with('pageData',$this->getPageData());
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request])->with('pageData',$this->getPageData());
        });

         Fortify::verifyEmailView(function () {
             return view('auth.verify-email')->with('pageData',$this->getPageData());
         });

         Fortify::confirmPasswordView(function () {
             return view('auth.confirm-password')->with('pageData',$this->getPageData());
         });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);
        Fortify::authenticateUsing(function ($request) {
                $user = \App\Models\User::where('email', $request->email)->first();

                if ($user &&
                    \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {

                    if (!$user->hasVerifiedEmail()) {
                        throw ValidationException::withMessages([
                            Fortify::username() => __('You need to verify your email before logging in.'),
                        ]);
                    }

                    return $user;
                }
            });


        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });




         $this->app->singleton(RegisterResponstContract::class, RegisterResponse::class);
       // $this->app->singleton(PasswordUpdateResponseContract::class, PasswordUpdateResponse::class);
    }
}
