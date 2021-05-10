<?php

namespace Database\Factories;

use App\Models\Gig;
use App\Models\GigTransaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GigTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $gig = Gig::all()->random();
        $type = collect(['basic', 'standard', 'premium'])->random();

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

        return [
            'user_id' => User::pluck('id')->random(),
            'gig_id' => $gig->id,
            'price' => $price,
            'type' => $type
        ];
    }
}
