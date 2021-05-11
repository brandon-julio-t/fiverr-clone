<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\View\ComponentAttributeBag;

class GigInfiniteScrollController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return string[]
     */
    public function __invoke(Request $request): array
    {
        $paginated = Gig::orderByDesc('created_at')->paginate(5);

        $data = [
            'next_page_url' => $paginated->path() . '?page=' . ($paginated->currentPage() + 1),
        ];

        $data['gigs'] = collect($paginated->items())->map(function ($gig) {
            return view('components.gig-card', [
                'gig' => $gig,
                'attributes' => new ComponentAttributeBag(),
            ])->render();
        });

        return $data;
    }
}
