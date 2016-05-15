<?php

use Illuminate\Database\Seeder;
use App\Comment;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE posts CASCADE");

        factory(App\Post::class, 15)->create();
    }
}
