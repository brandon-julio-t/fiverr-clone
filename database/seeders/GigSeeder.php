<?php

namespace Database\Seeders;

use App\Models\Gig;
use App\Models\GigImage;
use App\Models\GigReview;
use App\Models\GigTransaction;
use Illuminate\Database\Seeder;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gig::factory()
            ->count(100)
            ->has(GigImage::factory()->count(5))
            ->has(GigReview::factory()->count(10))
            ->has(GigTransaction::factory()->count(10))
            ->create();
    }
}
