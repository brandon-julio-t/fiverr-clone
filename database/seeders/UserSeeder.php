<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        collect([
            ['name' => 'Brandon Julio Thenaro', 'email' => 'brandon.thenaro@binus.edu'],
            ['name' => 'Clarissa Chuardi', 'email' => 'clarissa.chuardi@binus.edu'],
            ['name' => 'Skolastika Gabriella Theresandia Prasetyo', 'email' => 'skolastika.prasetyo@binus.edu'],
            ['name' => 'Lionel Ritchie', 'email' => 'lionel.ritchie@binus.edu'],
            ['name' => 'Johanes Peter Vincentius', 'email' => 'johanes.vincentius@binus.edu'],
            ['name' => 'Benedict Vincent', 'email' => 'benedict.vincent@binus.edu'],
            ['name' => 'Thaddeus Cleo', 'email' => 'thaddeus.cleo@binus.edu'],
            ['name' => 'Stanley Dave Teherag', 'email' => 'stanley.teherag@binus.edu'],
        ])->each(function ($credential) use ($faker) {
            $credential = collect($credential)->merge([
                'password' => Hash::make('password'),
                'about' => $faker->paragraph(),
                'description' => collect($faker->paragraphs())->join('
')
            ])->all();

            User::create($credential);
        });
    }
}
