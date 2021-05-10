<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use App\Models\GigCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GigSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $title = $request->query('title');
        $gigCategoryId = $request->query('gig_category_id');
        $minBudget = $request->query('min_budget');
        $maxBudget = $request->query('max_budget');
        $sellerName = $request->query('seller_name');

        $conditions = collect([]);

        if ($title) {
            $conditions->push(['title', 'like', '%' . $title . '%']);
        }

        if ($gigCategoryId && $gigCategoryId != '-- Category --') {
            $conditions->push(['gig_category_id', $gigCategoryId]);
        }

        if ($minBudget) {
            $conditions->push(['basic_price', '>=', $minBudget]);
        }

        if ($maxBudget) {
            $conditions->push(['premium_price', '<=', $maxBudget]);
        }

        $gigs = Gig::where($conditions->all());

        if ($sellerName) {
            $gigs->whereHas('user', function (Builder $query) use ($sellerName) {
                $query->where('name', 'like', '%' . $sellerName . '%');
            });
        }

        $gigs = $gigs->paginate();
        $gigCategories = GigCategory::all();

        return view('search', compact('gigs', 'gigCategories'));
    }
}
