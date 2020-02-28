<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users');
        DB::table('posts');
        DB::table('roles');
        DB::table('photos');
        DB::table('categories');
        DB::table('comments');
        DB::table('comment_replies');



        factory(App\User::class,10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });

        factory(App\Role::class,3)->create();

        factory(App\Category::class,10)->create();

        factory(App\Photo::class,1)->create();

        factory(App\Comment::class,10)->create()->each(function($c){
            $c->replies()->save(factory(App\CommentReply::class)->make());
        });

        // factory(App\Post::class,10)->create();
        //$this->call(UserTableSeeder::class);
    }
}
