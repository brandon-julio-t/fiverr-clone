<?php

namespace Database\Factories;

use App\Models\Gig;
use App\Models\GigImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GigImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'gig_id' => Gig::pluck('id')->random(),
            'path' => collect(['dummy1', 'dummy2', 'dummy3'])->random() . '.jpg',
        ];
    }
}
