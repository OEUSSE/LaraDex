<?php

use Illuminate\Database\Seeder;
use LaraDex\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 40)->create();
    }
}
