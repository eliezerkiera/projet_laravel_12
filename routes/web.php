<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::post('/',[HomeController::class, 'store']);


Route::controller(UserController::class)->group(function(){
    Route::get('user/profile-edit','profileEdit')->name('user-profile.edit')->middleware(['auth']);
    Route::get('user/password-edit','passwordEdit')->name('user-password.edit')->middleware(['auth']);
    Route::post('user/delete-request','userDeleteRequest')->name('user.delete-request');
    Route::get('user/delete','userDelete')->name('user.delete')->middleware(['password.confirm']);
});

