<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(5)->create();

        $user = User::factory()->create(['name' => 'John Doe',
        'email' => 'john@gmail.com',
        'password'=> '123456']);

        Product::factory(6)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /**Product::create([
            'title' => 'HeadPhone',
            'price' => '330',
            'tags' => 'efficient,sound',
            'company' => 'Meow',
            'email' => 'emil@gmail.com',
            'website' => 'https://www.acme.com',
            'description' => 'HeadPhone can be powerfull and the sound is clean and clear',
        ]);

        Product::create([
            'title' => 'Phone',
            'price' => '3300',
            'tags' => 'efficient,fast',
            'company' => 'redmi',
            'email' => 'email@gmail.com',
            'website' => 'https://www.acnme.com',
            'description' => 'Phone can be powerfull and the sound is clean and clear',
        ]);
        */
    }
}
