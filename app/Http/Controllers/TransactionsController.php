<?php

namespace App\Http\Controllers;

use App\Models\GigTransaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $transactions = GigTransaction::where('user_id', $request->user()->id)
            ->orderByDesc('created_at')
            ->paginate();

        return view('transactions', compact('transactions'));
    }
}
