<?php

use App\Http\Controllers\Gig\GigInfiniteScrollController;
use App\Http\Controllers\Gig\GigLoveController;
use App\Http\Controllers\Gig\GigUnloveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/gigs', GigInfiniteScrollController::class)->name('infinite-scroll-gigs');

Route::prefix('love')->group(function () {

    Route::post('/{user}/{gig}', GigLoveController::class)->name('love-gig');
    Route::delete('/{user}/{gig}', GigUnloveController::class)->name('unlove-gig');

});
