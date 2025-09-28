<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Market\MarketCollectionController;
use App\Http\Controllers\Market\MarketProductController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/',[HomeController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);

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




Route::prefix('market')->group(function () {

    // -----------------
    // Products
    // -----------------
    Route::get('/products', [MarketProductController::class, 'index'])->name('market.products.index');
    Route::get('/products/{product}', [MarketProductController::class, 'show'])->name('market.products.show');

    Route::middleware('auth')->group(function () {
        Route::get('/products/create', [MarketProductController::class, 'create'])->name('market.products.create');
        Route::post('/products', [MarketProductController::class, 'store'])->name('market.products.store');

        Route::get('/products/{product}/edit', [MarketProductController::class, 'edit'])->name('market.products.edit');
        Route::put('/products/{product}', [MarketProductController::class, 'update'])->name('market.products.update');
        Route::delete('/products/{product}', [MarketProductController::class, 'destroy'])->name('market.products.destroy');

        // Enregistrer / favoris
        Route::post('/products/{product}/save', [MarketProductController::class, 'save'])->name('market.products.save');
        Route::delete('/products/{product}/unsave', [MarketProductController::class, 'unsave'])->name('market.products.unsave');

        // Signalements
        Route::post('/products/{product}/report', [MarketProductController::class, 'report'])->name('market.products.report');
    });

    // -----------------
    // Collections
    // -----------------
    Route::get('/collections', [MarketCollectionController::class, 'index'])->name('market.collections.index');
    Route::get('/collections/{collection}', [MarketCollectionController::class, 'show'])->name('market.collections.show');

    Route::middleware('auth')->group(function () {
        Route::get('/collections/create', [MarketCollectionController::class, 'create'])->name('market.collections.create');
        Route::post('/collections', [MarketCollectionController::class, 'store'])->name('market.collections.store');

        Route::get('/collections/{collection}/edit', [MarketCollectionController::class, 'edit'])->name('market.collections.edit');
        Route::put('/collections/{collection}', [MarketCollectionController::class, 'update'])->name('market.collections.update');
        Route::delete('/collections/{collection}', [MarketCollectionController::class, 'destroy'])->name('market.collections.destroy');

        // Suivre / unfollow
        Route::post('/collections/{collection}/follow', [MarketCollectionController::class, 'follow'])->name('market.collections.follow');
        Route::delete('/collections/{collection}/unfollow', [MarketCollectionController::class, 'unfollow'])->name('market.collections.unfollow');

        // Signalements
        Route::post('/collections/{collection}/report', [MarketCollectionController::class, 'report'])->name('market.collections.report');
    });

    // -----------------
    // Users (profil)
    // -----------------
    Route::middleware('auth')->group(function () {
        Route::get('/users/{user}', [UserController::class, 'show'])->name('market.users.show');
        Route::get('/users/{user}/saved-products', [UserController::class, 'savedProducts'])->name('market.users.saved-products');
        Route::get('/users/{user}/followed-collections', [UserController::class, 'followedCollections'])->name('market.users.followed-collections');
    });

});
