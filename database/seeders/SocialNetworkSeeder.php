<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $socials = [
            [
                'name' => 'Cheekbook',
                'home' => 'www.cheekbook.commolo',
                'logo' => $faker->unique()->imageUrl(128, 128),
            ],
            [
                'name' => 'Y',
                'home' => 'www.y.commolo',
                'logo' => $faker->unique()->imageUrl(128, 128),
            ],
            [
                'name' => 'Badgerest',
                'home' => 'www.badgerest.commolo',
                'logo' => $faker->unique()->imageUrl(128, 128),
            ],
            [
                'name' => 'Wetube',
                'home' => 'www.wetube.commolo',
                'logo' => $faker->unique()->imageUrl(128, 128),
            ],
            [
                'name' => 'Aftergram',
                'home' => 'www.aftergram.commolo',
                'logo' => $faker->unique()->imageUrl(128, 128),
            ],
        ];

        foreach ($socials as $social) {
            $newSocial = new SocialNetwork($social);
            $newSocial->save();
        }
    }
}
