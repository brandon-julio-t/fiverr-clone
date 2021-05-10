<?php

namespace Database\Factories;

use App\Models\Gig;
use App\Models\GigCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gig::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'gig_category_id' => GigCategory::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
            'about' => collect($this->faker->paragraphs())->join('
'),
            'basic_price' => $this->faker->randomDigitNotZero(),
            'standard_price' => $this->faker->randomNumber(2),
            'premium_price' => $this->faker->randomNumber(3),
            'standard_price_description' => $this->faker->paragraph,
            'premium_price_description' => $this->faker->paragraph,
            'basic_price_description' => $this->faker->paragraph,
        ];
    }
}
