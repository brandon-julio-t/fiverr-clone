<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Http\Requests\GigUpdateRequest;
use App\Models\Gig;
use App\Models\GigImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class GigUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param GigUpdateRequest $request
     * @param Gig $gig
     * @return RedirectResponse
     */
    public function __invoke(GigUpdateRequest $request, Gig $gig): RedirectResponse
    {
        DB::transaction(function () use ($request, $gig) {

            $data = $request->validated();

            $gig->update(collect($data)->except('images')->all());

            if ($request->hasFile('images')) {
                $gig->gigImages->each(function (GigImage $image) {
                    $image->delete();
                });

                collect($data['images'])->each(function (UploadedFile $image) use ($gig) {
                    $path = $image->store('gig-images', 'public');
                    GigImage::create([
                        'gig_id' => $gig->id,
                        'path' => $path
                    ]);
                });
            }

        });

        return redirect()->route('view-gig', $gig)->with('announcement-success', 'Gig updated');
    }
}
