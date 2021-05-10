<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $categories = DB::select(DB::raw('
            select gc.id, gc.name, count(*) as transactions_count
            from gig_categories gc
                join gigs g on gc.id = g.gig_category_id
                join gig_transactions gt on g.id = gt.gig_id
            group by gc.id, gc.name
        '));

        $categories = collect($categories);
        $categories = $categories->sortByDesc('transactions_count')->take(6);

        return view('home', compact('categories'));
    }
}
