<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/',[HomeController::class, 'store']);

Route::middleware(['auth'])->controller(UserController::class)->group(function () {
    // Formulaire modification profil
    Route::get('user/profile-edit', 'profileEdit')->name('user-profile.edit');

    // Formulaire changement mot de passe
    Route::get('user/password-edit', 'passwordEdit')->name('user-password.edit');

    // Requête de suppression (POST pour confirmation du mot de passe)
    //Route::post('user/delete-request', 'userDeleteRequest')->name('user.delete-request');

    // Suppression effective (DELETE) avec confirmation du mot de passe
    Route::delete('user/delete', 'userDelete')->name('user.delete')->middleware(['password.confirm']);
});



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // marque l'email comme vérifié

return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
