<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $names = [
            'funny',
            'nature',
            'summer',
            'winter',
            'serious',
            'like4like',
            'foodporn',
            'napoli',
            'pizza',
            'sole',
            'mare',
            'pariggi'
        ];

        foreach ($names as $name){
            $newTag = new Tag();
            $newTag->name = $name;
            $newTag->color= $faker->safeHexColor();
            $newTag->save();
            $newTag->slug= Str::slug( $newTag->id . ' ' . $newTag->name);
            $newTag->update();
        }

    }
}
