<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>"Education",
            'url' => "education.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Entertainment",
            'url' => "entertainment.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Finance",
            'url' => "finance.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Health & Fitness",
            'url' => "health_and_fitness.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Lifestyle",
            'url' => "lifestyle.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Music",
            'url' => "music.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"News",
            'url' => "news.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Photo & Video",
            'url' => "photo_and_video.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Social Media",
            'url' => "web.svg"
        ]);
        DB::table('categories')->insert([
            'name'=>"Sports",
            'url' => "sports.svg"
        ]);

    }
}
