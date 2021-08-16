<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Http\Requests\GigCreateRequest;
use App\Models\Gig;
use App\Models\GigImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Throwable;

class GigCreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param GigCreateRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function __invoke(GigCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {

            $gig = Gig::create(collect($data)->except('images')->all());

            collect($data['images'])->each(function (UploadedFile $image) use ($gig) {
                $path = $image->store('gig-images', 'public');
                GigImage::create([
                    'gig_id' => $gig->id,
                    'path' => $path
                ]);
            });

        });

        return redirect()->route('view-profile', $request->user());
    }
}
