<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1=[
           'user_id'=>3,
           'discussion_id'=>4,
           'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];
        $c2=[
           'user_id'=>3,
           'discussion_id'=>5,
           'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];
        $c3=[
           'user_id'=>2,
           'discussion_id'=>6,
           'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];
        $c4=[
           'user_id'=>1,
           'discussion_id'=>7,
           'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];
        $c5=[
           'user_id'=>2,
           'discussion_id'=>8,
           'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];


        Comment::create($c1);
        Comment::create($c2);
        Comment::create($c3);
        Comment::create($c4);
        Comment::create($c5);
    }
}
