<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            "name"=>"Alice",
            "email"=>"alice@gmail.com",
        ]);

        \App\Models\User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
        ]);
        \App\Models\Article::factory(20)->create();
        \App\Models\Comment::factory(40)->create();

        $list = ["News", "Tech", "Moblie", "Computer", "General"];
        foreach($list as $name){
            \App\Models\Category::create(["name" => $name]);
        }
    }
}
