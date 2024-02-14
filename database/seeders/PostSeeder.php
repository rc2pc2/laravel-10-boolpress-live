<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $categoryIds = Category::all()->pluck('id');
        $userIds = User::all()->pluck('id');

        for ($i=0; $i <  250; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->unique()->realTextBetween(9, 25);
            $newPost->user_id = $faker->randomElement($userIds);
            $newPost->category_id =  $faker->randomElement($categoryIds);
            $newPost->post_image = $faker->unique()->imageUrl(300, 500);
            $newPost->content = $faker->unique()->paragraphs(5, true);
            $newPost->date = $faker->date();
            $newPost->save();
        }
    }
}
