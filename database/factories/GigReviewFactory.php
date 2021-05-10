<?php

namespace Database\Factories;

use App\Models\GigReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GigReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'rating' => $this->faker->numberBetween(1, 5),
            'body' => $this->faker->paragraph,
        ];
    }
}
