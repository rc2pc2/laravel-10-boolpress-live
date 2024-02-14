<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categoryIds = Category::all()->pluck('id');

        foreach ($categoryIds as $categoryId) {
            $categoryDetail = new CategoryDetail();
            $categoryDetail->category_id = $categoryId;
            $categoryDetail->image = $faker->imageUrl(128,128);
            $categoryDetail->description = $faker->unique()->realText(400);
            $categoryDetail->save();
        }

    }
}
