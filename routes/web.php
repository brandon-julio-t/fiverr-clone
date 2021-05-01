<?php

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

    Route::get('/profile/edit/{user}', 'profile\ProfileEditController')->name('edit-profile');
    Route::put('/profile/{user}', 'profile\ProfileUpdateController')->name('update-profile');

});

Route::view('/', 'home')->name('home');
Route::view('/services', 'services')->name('services');
Route::view('/projects', 'projects')->name('projects');

Route::get('/profile/{user}', 'profile\ProfileViewController')->name('view-profile');

Route::middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::view('/login', 'authentication.login')->name('login');
    Route::post('/login', 'authentication\LoginController')->name('do-login');

    Route::view('/register', 'authentication.register')->name('register');
    Route::post('/register', 'authentication\RegisterController')->name('do-register');

});

Route::any('/logout', 'authentication\LogoutController')->name('logout');
