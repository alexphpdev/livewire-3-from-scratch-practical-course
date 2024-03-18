<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(Category::pluck('id'));
        Product::factory(50)
            ->create()
            ->each(function (Product $product) use ($categories) {
                $product->categories()->sync($categories->random(2));
            });
    }
}
