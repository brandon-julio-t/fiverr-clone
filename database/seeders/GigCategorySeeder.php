<?php

namespace Database\Seeders;

use App\Models\GigCategory;
use Illuminate\Database\Seeder;

class GigCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Graphics & Design',
            'Digital Marketing',
            'Writing & Translation',
            'Video & Animation',
            'Music & Animation',
            'Music & Audio',
            'Programming & Tech',
            'Data',
            'Business',
            'Lifestyle'
        ])->each(function ($category) {
            GigCategory::create(['name' => $category]);
        });
    }
}
