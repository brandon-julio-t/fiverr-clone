<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use App\Models\GigTransaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GigCheckoutTransactionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Gig $gig
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Gig $gig): RedirectResponse
    {
        $type = $request->post('type');
        $price = 0;

        switch ($type) {
            case 'basic':
                $price = $gig->basic_price;
                break;
            case 'standard':
                $price = $gig->standard_price;
                break;
            case 'premium':
                $price = $gig->premium_price;
                break;
        }

        GigTransaction::create([
            'gig_id' => $gig->id,
            'user_id' => $request->user()->id,
            'price' => $price,
            'type' => $type
        ]);

        return redirect()->route('view-gig', $gig)->with('announcement-success', 'Checkout success');
    }
}
