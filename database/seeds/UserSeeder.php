<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            ['name' => 'Brandon Julio Thenaro', 'email' => 'brandon.thenaro@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Clarissa Chuardi', 'email' => 'clarissa.chuardi@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Skolastika Gabriella Theresandia Prasetyo', 'email' => 'skolastika.prasetyo@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Lionel Ritchie', 'email' => 'lionel.ritchie@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Johanes Peter Vincentius', 'email' => 'johanes.vincentius@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Benedict Vincent', 'email' => 'benedict.vincent@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Thaddeus Cleo', 'email' => 'thaddeus.cleo@binus.edu', 'password' => Hash::make('password')],
            ['name' => 'Stanley Dave Teherag', 'email' => 'stanley.teherag@binus.edu', 'password' => Hash::make('password')],
        ];

        foreach ($credentials as $credential) {
            User::create($credential);
        }
    }
}
