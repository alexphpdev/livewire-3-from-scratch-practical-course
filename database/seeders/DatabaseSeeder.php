<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        $this->call([
            CommentSeeder::class,
            TodoSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        $country = Country::create(['name' => 'United Kingdom']);
        $country->cities()->create(['name' => 'London']);
        $country->cities()->create(['name' => 'Manchester']);
        $country->cities()->create(['name' => 'Liverpool']);

        $country = Country::create(['name' => 'United States']);
        $country->cities()->create(['name' => 'Washington']);
        $country->cities()->create(['name' => 'New York City']);
        $country->cities()->create(['name' => 'Denver']);
    }
}
