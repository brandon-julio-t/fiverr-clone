<?php

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\ComponentAttributeBag;

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

Route::get('/gigs', function () {
    $paginated = Gig::orderBy('created_at', 'desc')->paginate(15);

    $data = [
        'next_page_url' => $paginated->path() . '?page=' . ($paginated->currentPage() + 1),
    ];

    $data['gigs'] = collect($paginated->items())->map(function ($gig) {
        return view('components.gig-card', [
            'gig' => $gig,
            'attributes' => new ComponentAttributeBag,
        ])->render();
    });

    return $data;
})->name('infinite-scroll-gigs');
