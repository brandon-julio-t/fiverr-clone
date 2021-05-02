<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Gig\GigViewController;
use App\Http\Controllers\Profile\ProfileEditController;
use App\Http\Controllers\Profile\ProfileUpdateController;
use App\Http\Controllers\Profile\ProfileViewController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(Authenticate::class)->group(function () {

    Route::get('/profile/edit/{user}', ProfileEditController::class)->name('edit-profile');
    Route::put('/profile/{user}', ProfileUpdateController::class)->name('update-profile');

});

Route::view('/', 'home')->name('home');
Route::view('/services', 'services')->name('services');
Route::view('/projects', 'projects')->name('projects');

Route::get('/profile/{user}', ProfileViewController::class)->name('view-profile');

Route::get('/gig/{gig}', GigViewController::class)->name('view-gig');

Route::middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::view('/login', 'authentication.login')->name('login');
    Route::post('/login', LoginController::class)->name('do-login');

    Route::view('/register', 'authentication.register')->name('register');
    Route::post('/register', RegisterController::class)->name('do-register');

});

Route::any('/logout', LogoutController::class)->name('logout');
