<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\SocialNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $posts = Post::all();
        $socialNetworks = SocialNetwork::all()->pluck('id'); // [1,2,3,4,5,6,7,...]

        foreach ($posts as $post) {
            $post->socialNetworks()->sync($faker->randomElements($socialNetworks, rand(1,4)));
        }
    }
}
