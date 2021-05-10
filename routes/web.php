<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Gig\GigCheckoutSummaryController;
use App\Http\Controllers\Gig\GigCheckoutTransactionController;
use App\Http\Controllers\Gig\GigCreateController;
use App\Http\Controllers\Gig\GigDeleteController;
use App\Http\Controllers\Gig\GigEditController;
use App\Http\Controllers\Gig\GigReviewController;
use App\Http\Controllers\Gig\GigSearchController;
use App\Http\Controllers\Gig\GigUpdateController;
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

Route::view('/', 'home')->name('home');
Route::get('/search', GigSearchController::class)->name('search');

Route::prefix('profile')->group(function () {

    Route::middleware(Authenticate::class)->group(function () {

        Route::get('/edit/{user}', ProfileEditController::class)->name('edit-profile');
        Route::put('/{user}', ProfileUpdateController::class)->name('update-profile');

    });

    Route::get('/{user}', ProfileViewController::class)->name('view-profile');

});

Route::prefix('gig')->group(function () {

    Route::view('/create', 'gig.create-gig')->name('create-gig');
    Route::post('/create', GigCreateController::class)->name('do-create-gig');
    Route::get('/edit/{gig}', GigEditController::class)->name('edit-gig');

    Route::middleware(Authenticate::class)->group(function () {

        Route::get('/checkout/{gig}/{type}', GigCheckoutSummaryController::class)->name('checkout-summary-gig');
        Route::post('/checkout/{gig}', GigCheckoutTransactionController::class)->name('checkout-transaction-gig');
        Route::post('/review/{gig}', GigReviewController::class)->name('review-gig');

    });

    Route::put('/{gig}', GigUpdateController::class)->name('update-gig');
    Route::delete('/{gig}', GigDeleteController::class)->name('delete-gig');
    Route::get('/{gig}', GigViewController::class)->name('view-gig');

});

Route::middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::view('/login', 'authentication.login')->name('login');
    Route::post('/login', LoginController::class)->name('do-login');

    Route::view('/register', 'authentication.register')->name('register');
    Route::post('/register', RegisterController::class)->name('do-register');

});

Route::any('/logout', LogoutController::class)->name('logout');
