<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Disable foreign key constraints for user and enable it again. 
        // --- Con loi chua sua duoc

        // Schema::disabledForeignKeyConstraints();
        // \App\Models\Role::truncate();
        // \App\Models\User::truncate();
        // \App\Models\Category::truncate();
        // \App\Models\Post::truncate();
        // \App\Models\Tag::truncate();
        // \App\Models\Comment::truncate();
         // \App\Models\Image::truncate();

        // Schema::enabledForeignKeyConstraints();

        // Create roles and user
        \App\Models\Role::factory(1)->create();
        $users = \App\Models\User::factory(10)->create();
        foreach($users as $user){
            $user -> image()->save( \App\Models\Image::factory()->make() );
        }

        \App\Models\Category::factory(10)->create();

        $posts = \App\Models\Post::factory(10)->create();

        \App\Models\Comment::factory(100)->create();

        \App\Models\Tag::factory(10)->create();

        foreach($posts as $post){
            $tag_ids = [];

            $tag_ids = \App\Models\Tag::all()->random()->id;
            $tag_ids = \App\Models\Tag::all()->random()->id;
            $tag_ids = \App\Models\Tag::all()->random()->id;

            $post->tags()->sync($tag_ids);
            $post -> image()->save( \App\Models\Image::factory()->make() );
        }

    }
}
